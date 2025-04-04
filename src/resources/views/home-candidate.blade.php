
@extends('layouts.app')

@section('content')
    <h1 class="mb-6 text-lg">Bem-vindo ao Portal de Vagas</h1>
    <div>
        @if (session('error'))
        @include('components.error-alert')
        @endif

        @if (session('success'))
            @include('components.success-alert')
        @endif  
    </div>
    
   <div class="flex flex-row flex-wrap w-full items-center justify-center gap-4 ">
        @foreach($jobs as $job)
            <x-job-card :job="$job" />
        @endforeach 
   </div>
   <div class="flex flex-col mt-6 justify-center items-center">
       {{ $jobs->links('components.simple-paginator') }}
   </div>
@endsection

   


