@props(['pagination'])


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

