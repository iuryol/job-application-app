<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function __construct(
        protected UserRepositoryInterface $repository
    ){}

    public function index()
    {
        $candidates = $this->repository->getAll();
        return view('user-list',compact('candidates'));
    }
    public function create()
    {
        return view('user-register');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $this->repository->create($data);
        return redirect()->route('login.candidate')->with('success', 'Usuário criado');
    }

    public function edit(User $user)
    {
        return view('user-edit',compact('user'));
    }

    public function update(UpdateUserRequest $request,User $user)
    {
        $data = $request->validated();
        $this->repository->update($data,$user);
        return redirect()->route('home.candidate')->with('success', 'Usuário alterado');
    }


    public function destroy(User $user)
    {
        $this->repository->delete($user);
        return redirect()->route('admin.users.index')->with('success', 'Candidato deletado');
    }
}
