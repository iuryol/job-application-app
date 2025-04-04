<?php

namespace App\Http\Controllers;

use App\Enums\JobType;
use App\Enums\JobStatus;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Interfaces\JobRepositoryInterface;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    public function __construct(
        protected JobRepositoryInterface $repository
        ){}
   
    public function index(Request $request): View
    {
        $search =  $request->search;
        $perPage = $request->get('perPage',20);
        $jobs = $this->repository->getAllFiltered($search,$perPage);
        return view('job-list', compact('jobs'));
    }

   
    public function homeCandidate(): View
    {
        $jobs = $this->repository->getAll(10);
        return view('home-candidate', compact('jobs'));
    }

    
    public function store(StoreJobRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['recruiter_id'] = Auth::id();
        $this->repository->create($data);
        return redirect()->route('admin.jobs.index')->with('success', 'Vaga criada com sucesso!');
    }

    
    public function create(): View
    {
        return view('job-create', ['job_types' => JobType::options()]);
    }

    
    public function edit(Job $job): View
    {
        return view('job-edit', compact('job'), ['job_types' => JobType::options()]);
    }

   
    public function update(UpdateJobRequest $request, Job $job): RedirectResponse
    {
        $data = $request->validated();
        $this->repository->update($data,$job);
        return redirect()->route('admin.jobs.index')->with('success', 'Vaga atualizada com sucesso!');
    }

    
    public function destroy(Job $job): RedirectResponse
    {
        $this->repository->delete($job);
        return back()->with('success', 'Vaga excluída com sucesso!');
    }

    public function stop(Job $job)
    {
        $this->repository->changeStatus($job,JobStatus::STOPPED->value);
        return back()->with('success', 'Vaga pausada com sucesso!');
    }

    public function open(Job $job)
    {
        $this->repository->changeStatus($job,JobStatus::OPENED->value);
        return back()->with('success', 'Vaga aberta com sucesso!');
    }
}