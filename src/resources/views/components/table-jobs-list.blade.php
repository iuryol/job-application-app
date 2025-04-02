
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
    {{ $jobs->links() }}
</div>
