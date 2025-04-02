<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function apply(Request $request)
    {
        $user = Auth::user();
        $jobId = $request->job_id;
        
        if (Application::where('user_id', $user->id)->where('job_id', $jobId)->exists()) {
            return back()->with('error', 'Você já se candidatou para esta vaga.');
        }

        Application::create([ 'user_id' => $user->id, 'job_id' => $jobId]);

        return back()->with('success', 'Inscrição realizada com sucesso!');
    }

    public function withdraw(Request $request) 
    {
        $user = Auth::user();
        $jobId = $request->job_id;

        $application = Application::where('user_id', $user->id)->where('job_id', $jobId)->first();

        if (!$application) {
            return back()->with('error', 'Você não está inscrito nesta vaga.');
        }

        $application->delete();

        return back()->with('success', 'Candidatura removida com sucesso!');
       
    }
}
