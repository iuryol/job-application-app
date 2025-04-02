@extends('layouts.app')

@section('title', 'Página Não Encontrada')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 p-6">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-gray-800">Oops!</h1>
        <p class="text-xl text-gray-600 mt-2">Parece que essa página não existe.</p>
        
        <div class="mt-6">
            <img src="{{ asset('images/404.svg') }}" alt="Página não encontrada" class="w-72 mx-auto">
        </div>

        <p class="mt-6 text-gray-500">
            Talvez você tenha digitado um endereço errado ou a página foi removida.
        </p>

        <div class="mt-6">
            <a href="{{ route('home') }}" class="px-6 py-3 bg-blue-600 text-white text-lg rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Voltar para a Home
            </a>
        </div>
    </div>
</div>
@endsection
