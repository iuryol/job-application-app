

<div class="flex items-center space-x-2  p-2">
    <form method="GET" action="{{ request()->url() }}" class="flex items-center space-x-2">
        <input 
            type="text" 
            name="search"
            id="search"
            value="{{ request('search') }}" 
            placeholder="Buscar..." 
            class="w-1/3 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
        >
   
        <button type="submit" class="px-2 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
            Pesquisar
        </button>
    </form>
</div>

<div class="flex items-center space-x-2  p-2">
    <form method="GET" action="{{ request()->url() }}" class="flex items-center space-x-2">
        <label for="perPage" class="text-gray-700">Itens por página:</label>
        <select name="perPage" id="perPage" onchange="this.form.submit()" class="p-2 border border-gray-300 rounded-lg">
            <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
            <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
        </select>
    </form>
</div>

<table class="w-full border-collapse border  border-gray-300 shadow-md">
    <thead class="bg-blue-600  text-white">
        <tr>
            <th class="px-4 py-2 text-left">Título</th>
            <th class="px-4 py-2 text-left">Empresa</th>
            <th class="px-4 py-2 text-left">Localização</th>
            <th class="px-4 py-2 text-left">Status</th>
            <th class="px-4 py-2 text-left">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($jobs as $job)
            <tr class="border-b border-gray-200">
                <td class="px-4 py-2">{{ $job->title }}</td>
                <td class="px-4 py-2">{{ $job->company }}</td>
                <td class="px-4 py-2">{{ $job->location }}</td>
                <td class="px-4 py-2">{{ $job->status  }}</td>
                <td class="px-4 py-2 flex space-x-2">
                    <a href="{{ route('admin.jobs.show', $job->id) }}" class="text-blue-500 hover:underline">Ver</a>
                    <form method="POST" action="{{ route('admin.jobs.destroy', $job->id) }}" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Excluir</button>
                    </form>
                    <form method="GET" action="{{ route('admin.jobs.edit', $job->id) }}">
                        @csrf
                        <button type="submit" class="text-green-500 hover:underline">Editar</button>
                    </form>


                    @if( $job->status === 'Aberto')
                    <form method="POST" action="{{ route('admin.jobs.stop',$job->id) }}">
                        @csrf
                        <button type="submit" class="text-indigo-500 hover:underline">Pausar</button>
                    </form>
                    @else
                        <form method="POST" action="{{ route('admin.jobs.open',$job->id) }}">
                            @csrf
                            <button type="submit" class="text-yellow-500 hover:underline">Abrir</button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="px-4 py-2 text-center text-gray-500">Nenhuma vaga disponível</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $jobs->links('components.pagination') }}
</div>
