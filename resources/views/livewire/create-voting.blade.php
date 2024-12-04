<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Create a New Voting</h2>

    <!-- Pesan Keberhasilan -->
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="saveVoting">
        <!-- Title Input -->
        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700">Voting Title</label>
            <input type="text" id="title" wire:model="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Description Input -->
        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" wire:model="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Start Date Input -->
        <div class="mb-6">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="datetime-local" id="start_date" wire:model="start_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5">
            @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- End Date Input -->
        <div class="mb-6">
            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="datetime-local" id="end_date" wire:model="end_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5">
            @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Opsi Voting -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Options</label>
            @foreach($options as $index => $option)
                <div class="flex items-center mb-3">
                    <input type="text" wire:model="options.{{ $index }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5">
                    <button type="button" wire:click="removeOption({{ $index }})" class="ml-2 text-white bg-red-500 rounded-xl px-2 py-1 flex gap-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                          </svg>

                        <span> Remove</span>
                    </button>
                </div>
            @endforeach

            @error('options.*') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <button type="button" wire:click="addOption" class="mt-2 text-white bg-blue-500 rounded-xl px-2 py-1 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span>Add Option</span>
            </button>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center mt-8">
            <button type="submit" class="bg-blue-500 text-white py-3 px-6 rounded-lg text-lg font-semibold hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 transition ease-in-out duration-200">
                Create Voting
            </button>
        </div>
    </form>
</div>
