<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Resources\JobResource;
use App\Interfaces\JobRepositoryInterface;
use App\Models\Job;
use Illuminate\Http\Request;

class ApiJobController extends Controller
{
   public function __construct(
    protected JobRepositoryInterface $repository
    ){}
    public function index()
    {
        $jobs = $this->repository->getAll(10);
        return JobResource::collection($jobs);
    }

    public function store(StoreJobRequest $request)
    {
        $data = $request->validated();
        $job = $this->repository->create($data);
        return JobResource::collection($job);
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $data = $request->validated();
        $result = $this->repository->update($data,$job);
        if($result){
            return response()->json(['message' => 'alteracao feita com sucesso'],200);
        }

        return response()->json(['message' => 'falha ao tentar alterar dados'],404);
    }
    public function destroy(Job $job)
    {
        $result = $this->repository->delete($job);
        if($result){
            return response()->json(['message' => 'item removido com sucesso'],200);
        }

        return response()->json(['message' => 'falha ao remover item'],404);
    }
}
