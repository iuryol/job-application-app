
@extends('layouts.app')

@section('content')
    <h1>Candidatos</h1>
    
    @if (session('error'))
        @include('components.error-alert')
    @endif

    @if (session('success'))
        @include('components.success-alert')
    @endif  
    <div class="flex flex-col">
        <a href="{{ route("users.create") }}" type="submit" class="text-white p-1 w-fit rounded-md bg-indigo-600 hover:bg-indigo-500 ">Nova candidato</a>
    </div>

   <div class="flex flex-col rounded-lg overflow-hidden  gap-4 ">
        <x-table-users-list :candidates="$candidates" />
   </div>
@endsection

   


