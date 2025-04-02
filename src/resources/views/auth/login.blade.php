@extends('layouts.app')

@section('content')
    <div class=" w-md mx-auto bg-white p-6 rounded-lg shadow-lg ">
        <h2 class="text-2xl font-semibold text-center mb-4">Login</h2>
        
        <!-- Exibir erros de autenticação -->
        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc pl-5 text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulário de Login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required value="{{ old('email') }}">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                <input type="password" name="password" id="password" class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 text-sm text-gray-700">Lembrar de mim</label>
                </div>
            </div>

            <button type="submit" class="w-full mt-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Entrar
            </button>
        </form>
        <div class="flex flex-col justify-center items-center mt-4 font-bold hover:text-blue-500 hover:underline">
            <a href="{{ route('users.create') }}" class="">Não tem uma conta? Criar conta</a>
        </div>
    </div>
@endsection
