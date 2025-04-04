
@extends('layouts.app')

@section('content')
    @include('components.heading',['title' => 'Vagas cadastradas'])
   
    @if (session('error'))
        @include('components.error-alert')
    @endif

    @if (session('success'))
        @include('components.success-alert')
    @endif  
    
   <div class="flex flex-col rounded-lg overflow-hidden flex-wrap gap-4 ">
        <x-table-jobs-list :jobs="$jobs" />
   </div>
@endsection

   


