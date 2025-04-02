<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function index()
    {
        $candidates = User::latest()->paginate(20);
        return view('user-list',compact('candidates'));
    }
    public function create()
    {
        return view('user-register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => ['required','string','confirmed',Password::defaults()],
        ]);
        User::create($data);

        return redirect()->route('login.candidate')->with('success', 'Usuário criado');
    }

    public function edit(User $user)
    {
        return view('user-edit',compact('user'));
    }

    public function update(Request $request,User $user)
    {
      
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required','string','max:255',Rule::unique('users')->ignore($user)],
            'linkedin' => 'string|max:255|nullable',
        ]);
        
        $user->update($data);

        return redirect()->route('home.candidate')->with('success', 'Usuário alterado');
    }


    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('users.index')->with('success', 'Candidato deletado');
    }
}
