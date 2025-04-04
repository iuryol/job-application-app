<?php

use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Support\Str;

function removeLastUserCreated()
{
    User::latest('id')->first()->delete();
}

test('deve retornar a pagina de listagem de candidados cadastrados no sistema',function(){
    $user = Recruiter::factory()->make();
    $candidates = User::factory()->count(20)->make();
    $this->actingAs($user, 'admin');

    $response = $this->get(route('admin.users.index',compact('candidates')));

    $response->assertStatus(200);
    $response->assertViewHas('candidates');

});



test('deve retornar pagina de registro de candidato',function(){
    $response = $this->get(route('users.create'));

    $response->assertStatus(200);
});

test('deve criar novo usuario e redirecionar par listagem',function(){
    $user = User::factory()->make()->getAttributes();
    $data = array_merge($user, ['password_confirmation' => $user['password']]);
   
    $response = $this->post(route('users.store'),$data);

    $this->assertDatabaseHas('users', $user);  
    $response->assertRedirect(route('login.candidate'));
})->after(function(){
   removeLastUserCreated();
});


test('deve retornar pagina de editar conta de candidato',function(){
    $user = User::factory()->create();
    $this->actingAs($user, 'user');

    $response = $this->get(route('users.edit',$user));

    $response->assertStatus(200);
    $response->assertViewHas('user', $user);
})->after(function(){
   removeLastUserCreated();
});


test('deve atualizar conta de canditado e redirecionar',function(){
    $user = User::factory()->create();
    $dto = [
        'name' => Str::random(10),
        'email' => $user->email,
        'linkedin' => $user->linkedin,
    ];
    $this->actingAs($user, 'user');
    
    $response = $this->put(route('users.update',$user),$dto);

    $this->assertDatabaseHas('users',$dto);
    $response->assertRedirect(route('home.candidate'));
})->after(function(){
    removeLastUserCreated();
 });


 test('deve apagar a conta de um usuario',function(){
    $user = User::factory()->create();
    $this->actingAs($user, 'admin');

    $response = $this->delete(route('users.destroy',$user));
    
    $response->assertRedirect(route('admin.users.index'));
    $this->assertDatabaseMissing('users', ['id' => $user->id]);
    
 });