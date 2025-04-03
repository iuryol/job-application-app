<?php

namespace App\Http\Controllers;

use App\Enums\JobType;
use App\Enums\JobStatus;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
   
    public function index(Request $request): View
    {
        $query = Job::query();
       // $perPage = $request->integer('per_page', default: 10);
        if ($request->filled('search')) {
            $query->where('title', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('company', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('location', 'LIKE', '%' . $request->search . '%');
        }

        $perPage = $request->get('perPage', 10);
    
        $jobs = $query->paginate($perPage)->withQueryString(); // <-- Mantém o parâmetro search na paginação
    
        return view('job-list', compact('jobs'));
    }

   
    public function homeCandidate(): View
    {
        $jobs = Job::latest()->paginate(10);
        return view('home-candidate', compact('jobs'));
    }

    
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required',
            'type' => ['required', Rule::enum(JobType::class)],
        ]);
        $data['recruiter_id'] = Auth::id();

        Job::create($data);
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

   
    public function update(Request $request, Job $job): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required',
            'type' => ['required', Rule::enum(JobType::class)],
        ]);

        $job->update($data);

        return redirect()->route('admin.jobs.index')->with('success', 'Vaga atualizada com sucesso!');
    }

    
    public function destroy(Job $job): RedirectResponse
    {
        $job->delete();
        return back()->with('success', 'Vaga excluída com sucesso!');
    }

    public function stop(Job $job)
    {
        $job->status = JobStatus::STOPPED->value;
        $job->save();
        return back()->with('success', 'Vaga pausada com sucesso!');
    }

    public function open(Job $job)
    {
        $job->status = JobStatus::OPENED->value;
        $job->save();
        return back()->with('success', 'Vaga aberta com sucesso!');
    }
}