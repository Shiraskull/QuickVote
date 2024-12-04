<div class="py-5">
    <div class="max-w-3xl mx-auto h-full">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold text-gray-700">{{ $voting->title }}</h3>
            <div>
                {{ $voting->total_votes }} Vote
            </div>
            <div class="mt-4 space-y-3">
                @foreach ($voting->options as $value)
                    <button class="flex items-center votings-center border-2 border-blue-500 text-black rounded h-20 hover:bg-blue-200 w-full text-left">
                        <!-- Gambar untuk opsi -->
                        @if ($value->image)
                            <img src="{{ asset('storage/'. $value->image) }}" alt="{{ $value->option_name }}" class="max-w-20 h-full object-cover  mr-3">
                        @endif
                        <!-- Nama opsi -->
                        {{ $value->option_name }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
