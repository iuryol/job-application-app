
@extends('layouts.app')

@section('content')
    <h1>Vagas</h1>
    
    @if (session('error'))
        @include('components.error-alert')
    @endif

    @if (session('success'))
        @include('components.success-alert')
    @endif  
    <form method="POST" action="">
        @csrf
        <a href="{{ route("admin.jobs.create") }}" type="submit" class="text-red-500 hover:underline">Nova vaga</a>
    </form>
   <div class="flex flex-col rounded-lg overflow-hidden flex-wrap gap-4 ">
        
            <x-table-jobs-list :jobs="$jobs" />
  
   </div>
@endsection

   


