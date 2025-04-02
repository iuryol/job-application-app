@if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Erro!</strong>
        <p>{{ session('error') }}</p>
        <button onclick="this.parentElement.style.display='none';" class="absolute top-0 bottom-0 right-0 px-4 py-3">
            &times;
        </button>
    </div>
@endif