
@extends('layouts.app')

@section('content')
    <div class="flex w-full flex-col mt-30 gap-6">
        <div class="flex flex-col">
            <img src="{{ asset('images/job-logo.svg') }}" alt="Página não encontrada" class="w-72 mx-auto">
        </div>
        <div class="flex text-3xl w-full justify-center items-center flex-col">
            <span>Bem-vindo ao My Job Market o seu Portal de Vagas</span>
            <span>Encontre a vaga ideal para você aqui.</span>
        </div>
    </div>
@endsection

   


