<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface {

    public function __construct(
        protected User $model
    ){}
    public function getAll(): LengthAwarePaginator
    {
         return  $this->model->latest()->paginate(20);
    }

    public function create(array $dto): ?User
    {
        return $this->model->create($dto);
    } 

    public function update(array $dto,$model): bool
    {
        return $model->update($dto);
    }

    public function delete($model): bool
    {
        return $model->delete();
    }


}