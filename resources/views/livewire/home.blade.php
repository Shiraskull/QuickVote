<div>
    {{-- <h2 class="text-2xl font-bold mb-4">Create a New Voting</h2>

    <!-- Pesan keberhasilan -->
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="saveVoting">
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Voting Title</label>
            <input type="text" id="title" wire:model="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" wire:model="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="datetime-local" id="start_date" wire:model="start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="datetime-local" id="end_date" wire:model="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Opsi Voting -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Options</label>
            @foreach($options as $index => $option)
                <div class="flex items-center mb-2">
                    <input type="text" wire:model="options.{{ $index }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <button type="button" wire:click="removeOption({{ $index }})" class="ml-2 text-red-500">Remove</button>
                </div>
            @endforeach

            @error('options.*') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <button type="button" wire:click="addOption" class="mt-2 text-indigo-500">Add Option</button>
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create Voting</button>
    </form> --}}

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Available Topics</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($votings as $item)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-700">{{ $item->title }}</h3>
                    <p class="text-gray-500 mt-2">Share your thoughts on this trending anime.</p>

                    <div class="mt-4 space-y-3">
                        @foreach ($item->options as $value)
                            <button class="flex items-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full text-left">
                                <!-- Gambar untuk opsi -->
                                <img
                                    src="{{ $value->option_image }}"
                                    alt="{{ $value->option_name }}"
                                    class="w-10 h-10 rounded-full mr-3"
                                >
                                <!-- Nama opsi -->
                                {{ $value->option_name }}
                            </button>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
