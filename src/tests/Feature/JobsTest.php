<?php

use App\Enums\JobStatus;
use App\Enums\JobType;
use App\Http\Controllers\JobController;
use App\Models\Job;
use App\Models\Recruiter;
use Illuminate\Support\Str;


beforeEach(function () {
    $user = Recruiter::factory()->create();
    $this->actingAs($user, 'admin');
});

afterEach(function(){
    $user = Recruiter::latest('id')->first();
    $user->delete();
});

function removeLastJobCreated()
{
    Job::latest('id')->first()->delete();
}


test('deve retorna pagina com a lista de jobs paginados', function () {
    // Arange
    $jobs = Job::factory()->count(15)->make();
    // Act  
    $response = $this->get(route('admin.jobs.index', compact('jobs')));
    // Assert
    $response->assertStatus(200);
    $response->assertViewIs('job-list');
    $response->assertViewHas('jobs');
});

test('deve criar um job e redirecionar', function () { 
   
    $data = [
        'title' => 'Dev Backend',
        'company' => 'Tech Co.',
        'location' => 'Remote',
        'description' => 'Job description',
        'type' => JobType::CLT->value,
    ];

    $response = $this->post(route('admin.jobs.store'), $data);

    $response->assertRedirect(route('admin.jobs.index'));
    $this->assertDatabaseHas('jobs', $data);
});

test('deve abri pagina de editar vaga', function () {
    $job = Job::factory()->create();
  
    $response = $this->get(route('admin.jobs.edit', $job));
   
    $response->assertStatus(200);
    $response->assertViewHas('job', $job);
})->after(function(){
        removeLastJobCreated();
    });

test('deve atualizar vaga e redirecionar', function () {
    $job = Job::factory()->create();
    $data = [
        'title' =>  Str::random(10),
        'company' => $job->company,
        'location' => $job->location,
        'description' => $job->description,
        'type' => JobType::CLT->value,
    ];
    
    $response = $this->put(route('admin.jobs.update', $job), $data);

    $response->assertRedirect(route('admin.jobs.index'));
    $this->assertDatabaseHas('jobs', $data);
})->after(function(){
    removeLastJobCreated();
});

test('deve apagar uma vaga e redirecionar', function () {
    $job = Job::factory()->create();

    $response = $this->delete(route('admin.jobs.destroy', $job));

    $response->assertRedirect();
    $this->assertDatabaseMissing('jobs', ['id' => $job->id]);
});


test('deve mudar o status de uma vaga para stopped', function () {
    $job = Job::factory()->create(['status' => JobStatus::OPENED->value]);
    
    $response = $this->post(route('admin.jobs.stop', $job));
    
    $response->assertRedirect();
    $this->assertDatabaseHas('jobs', [
        'id' => $job->id,
        'status' => JobStatus::STOPPED->value,
    ]);
})->after(function(){
    removeLastJobCreated();
});

test('deve mudar o status de uma vaga para opened', function () {
    $job = Job::factory()->create(['status' => JobStatus::STOPPED->value]);
    
    $response = $this->post(route('admin.jobs.open', $job));
    
    $response->assertRedirect();
    $this->assertDatabaseHas('jobs', [
        'id' => $job->id,
        'status' => JobStatus::OPENED->value,
    ]);
})->after(function(){
    removeLastJobCreated();
});





