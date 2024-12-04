<div class="p-10 space-y-2">
    {{-- <a href="{{ route('voting-create') }}"> --}}
        <button wire:click='createVoting' class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-xl px-4 py-2 flex items-center space-x-2 shadow-md transform transition-all duration-300 ease-in-out hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span>New Voting</span>
        </button>
    {{-- </a> --}}

    <div class="grid grid-cols-4 gap-4">
        @foreach ($votings as $item)
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="p-4 md:p-7">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                        {{ $item->title }}
                    </h3>
                    <p class="mt-2 text-gray-500 dark:text-neutral-400">
                        {{ $item->description }}
                    </p>
                    <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 decoration-2 hover:text-blue-700 hover:underline focus:underline focus:outline-none focus:text-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-600 dark:focus:text-blue-600" href="{{ route('detail-voting', ['slug'=>$item->id]) }}">
                        Detail
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</div>
