<div>
    <div class="container mx-auto py-8 px-14">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Available Topics</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($votings as $item)
                <div class="bg-white shadow-md rounded-lg py-4 px-7">
                    <h3 class="text-lg font-semibold text-gray-700">{{ $item->title }}</h3>
                    <div>
                        {{ $item->total_votes }} Vote
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('detail-voting', ['slug'=>$item->id]) }}">
                            <button class="bg-blue-500  hover:bg-blue-400 text-center text-white hover:text-black font-semibold rounded-xl py-2 w-full">
                                Vote
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
