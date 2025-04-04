<?php
namespace App\Repositories;

use App\Interfaces\JobRepositoryInterface;
use App\Models\Job;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class JobRepository implements JobRepositoryInterface {

    public function __construct(
        protected Job $model 
    ){}

    public function getAllFiltered($search = null,$perPage = 10): LengthAwarePaginator
    {
        $query = $this->model->query();
        if(isset($search)){
            $query->where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('company', 'LIKE', '%' . $search . '%')
            ->orWhere('location', 'LIKE', '%' . $search . '%');
        }
        return $query->paginate($perPage)->withQueryString();
    }

    public function getAll($perPage = 20):Paginator
    {
       return $this->model->latest()->simplePaginate($perPage);
    }

    public function create(array $dto): Job
    {
        return $this->model->create($dto);
    }

    public function update(array $dto, Job $model): bool
    {
        return $model->update($dto);
    }

    public function delete(Job $model): bool
    {
        return $model->delete();
    }

    public function changeStatus(Job $model, string $new_status): bool
    {
        $model->status = $new_status;
        return $model->save();
    }
}