@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Sucesso!</strong>
        <p>{{ session('success') }}</p>
        <button onclick="this.parentElement.style.display='none';" class="absolute top-0 bottom-0 right-0 px-4 py-3">
            &times;
        </button>
    </div>
@endif