<div class="py-5">
    <div class="max-w-3xl mx-auto h-full">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold text-gray-700">{{ $voting->title }}</h3>
            <div>
                {{ $voting->total_votes }} Vote
            </div>
            <div class="mt-4 space-y-3">
                @foreach ($voting->options as $value)
                    <button class="flex votings-center border-2 border-blue-500 text-black px-4 py-2 rounded hover:bg-blue-200 w-full text-left">
                        <!-- Gambar untuk opsi -->
                        @if ($value->image)
                            <img src="{{ $value->option_image }}" alt="{{ $value->option_name }}" class="w-10 h-10 rounded-full mr-3">
                        @endif
                        <!-- Nama opsi -->
                        {{ $value->option_name }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
