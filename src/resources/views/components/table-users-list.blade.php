<table class="w-full border-collapse border  border-gray-300 shadow-md">
    <thead class="bg-blue-600  text-white">
        <tr>
            <th class="px-4 py-2 text-left">Nome</th>
            <th class="px-4 py-2 text-left">Email</th>
            <th class="px-4 py-2 text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($candidates as $candidate)
            <tr class="border-b border-gray-200">
                <td class="px-4 py-2">{{ $candidate->name }}</td>
                <td class="px-4 py-2">{{ $candidate->email }}</td> 
                <td class="px-4 py-2 flex space-x-2">
                    <a href="" class="text-blue-500 hover:underline">Ver</a>
                    <form method="POST" action="{{ route('users.destroy', $candidate->id) }}" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Excluir</button>
                    </form>
                    <form method="GET" action="">
                        @csrf
                        <button type="submit" class="text-green-500 hover:underline">Editar</button>
                    </form>
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
    {{ $candidates->links() }}
</div>
