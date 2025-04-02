
@extends('layouts.app')

@section('content')
    <h1>Bem-vindo ao Portal de Vagas</h1>
    <p>Encontre a vaga ideal para você.</p>
    @if (session('error'))
        @include('components.error-alert')
    @endif

    @if (session('success'))
        @include('components.success-alert')
    @endif  

    

   <div class="flex flex-row flex-wrap gap-4 ">
        @foreach($jobs as $job)
            <x-job-card :job="$job" />
        @endforeach 
   </div>
@endsection

   


