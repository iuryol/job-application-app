@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 p-6">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Editar Usuário</h2>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Nome Completo</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                    <div class="mb-4 p-4  text-red-700 rounded-lg">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">E-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('email')
                    <div class="mb-4 p-4  text-red-700 rounded-lg">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="resume" class="block text-gray-700 font-medium">Link para o Currículo</label>
                <input type="url" id="resume" name="linkedin" value="{{ old('resume', $user->linkedin) }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white p-3 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Salvar Alterações
            </button>
        </form>
    </div>
</div>
@endsection
