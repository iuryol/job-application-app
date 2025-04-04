<?php
namespace App\Interfaces;

use App\Enums\JobStatus;
use App\Models\Job;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

interface JobRepositoryInterface {
    public function getAll(int $perPage):Paginator;
    public function getAllFiltered(string $search,int $perPage):LengthAwarePaginator;
    public function create(array $dto): Job;
    public function update(array $dto,Job $job): bool;
    public function delete(Job $job): bool;
    public function changeStatus(Job $job,string $status): bool;
}