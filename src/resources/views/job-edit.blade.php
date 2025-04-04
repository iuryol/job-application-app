@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Editar Vaga</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium">Título</label>
            <input type="text" name="title" value="{{ $job->title }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Empresa</label>
            <input type="text" name="company" value="{{ $job->company }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
              
            <label class="block text-sm font-medium">Tipo de contratação</label>
            <select class="w-full border rounded-lg p-2"   name="type" id="job-type">\
                
                @foreach($job_types as $type)
                    <option {{  $job->type === $type['value'] ? 'selected' : '' }}  value="{{ $type['value'] }}">{{ $type['label'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Localização</label>
            <input type="text" name="location" value="{{ $job->location }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Descrição</label>
            <textarea name="description" class="w-full border p-2 rounded" rows="4" required>{{ $job->description }}</textarea>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Salvar Alterações</button>
    </form>
</div>
@endsection
