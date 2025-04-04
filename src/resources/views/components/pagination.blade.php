
@if ($paginator->hasPages())
    <nav class="flex justify-center mt-4 ">
        {{-- Botão "Anterior" --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 mx-1 text-gray-500 bg-gray-200 rounded-md cursor-not-allowed">Anterior</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 mx-1 text-indigo-600 bg-white border rounded-md hover:bg-indigo-100">
                Anterior
            </a>
        @endif

        {{-- Links das Páginas --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-4 py-2 mx-1 text-gray-500">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 mx-1 text-white bg-indigo-600 rounded-md">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 mx-1 text-indigo-600 bg-white border rounded-md hover:bg-indigo-100">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Botão "Próximo" --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 mx-1 text-indigo-600 bg-white border rounded-md hover:bg-indigo-100">
                Próximo
            </a>
        @else
            <span class="px-4 py-2 mx-1 text-gray-500 bg-gray-200 rounded-md cursor-not-allowed">Próximo</span>
        @endif
    </nav>
@endif
