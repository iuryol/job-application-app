<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function index()
    {
      
        if(request()->is('login-recruiter')){
            return view('auth.login-recruiter');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
    
        $credentials = $request->validated();
        $remember = $request->has('remember');
        $guard = Auth::getDefaultDriver();
        
        if(Auth::attempt($credentials,$remember)){
            if($guard === 'admin'){
                return redirect()->to(route('admin.jobs.index'))->with('success', 'Login realizado com sucesso!');
            }
          
            return redirect()->to(route('home.candidate'))->with('success', 'Login realizado com sucesso!');
         
        }

        return back()->withErrors(['email' => 'Credenciais inválidas.'])->withInput();

    }

    public function logout()
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        return redirect('/')->with('success', 'Logout realizado com sucesso!');
    }

}
