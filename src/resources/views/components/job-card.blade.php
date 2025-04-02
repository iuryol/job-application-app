<div>
    <div class="flex flex-col gap-2">
        <div class="flex flex-col border rounded-md p-2 shadow-sm bg-slate-200 w-lg ">
            
            <div class="flex flex-col">
                <h2 class="text-lg font-bold">{{ $job->title }}</h2>
                <h2 class="text-md">{{ $job->company }}</h2>
            </div>
            <div class="flex flex-row gap-2">
                <div class="flex">
                    <span class="text-sm">{{ $job->location }}</span>
                </div>
                <div class="flex">
                    <span class="text-sm">{{ $job->type }}</span>
                </div>
            </div>
           <hr class="my-4 border-t-1 border-slate-300">
           @auth
           <form action="{{ $job->isUserApplied() ? route('admin.withdraw') : route('admin.apply') }}" method="post">
            @csrf
                <input type="hidden" name="job_id" value="{{ $job->id }}">
                <div class="flex flex-row justify-between">
                    @if($job->isUserApplied())
                        <button class="bg-slate-600 hover:bg-slate-500 p-1 text-center  rounded-md text-white">Acompanhar</button>
                        <button type="submit" class="hover:bg-red-100 p-1 rounded-md text-red-500">Desistir</button>        
                    @elseif($job->status != "Pausado" && $job->status != "Fechado")
                        <button type="submit" class="bg-slate-600 hover:bg-slate-500 p-1 text-center  rounded-md text-white">Candidatar</button>
                    @else
                        <span class="p-1 bg-amber-100  text-amber-600 rounded-md">Vaga temporariamente pausada </span>
                    @endif
                       
                </div>
           </form>
            @endauth
        </div>
    </div>
</div>


 