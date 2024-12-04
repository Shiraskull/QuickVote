<div>
    <div class="min-h-screen bg-gray-100 flex flex-col items-center py-8">
        <!-- Card Profile -->
        <div class="bg-white shadow-md rounded-lg w-full max-w-md p-6">
            <!-- Profile Picture -->
            <div class="flex justify-center">
                @if ($user->image)
                    <img
                        src="{{ asset('storage/'.$user->image) }}"
                        alt="Profile Picture"
                        class="w-24 h-24 rounded-full border-4 border-blue-500"
                    />
                @else
                    <img
                        src="{{ asset('storage/pria.png') }}"
                        alt="Profile Picture"
                        class="w-24 h-24 rounded-full border-4 border-blue-500"
                    />
                @endif
            </div>

            <!-- User Info -->
            <div class="text-center mt-4">
                <h2 class="text-xl font-bold text-gray-800">{{ $user->name }}</h2>
                <p class="text-gray-600">{{ $user->email }}</p>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-200 my-4"></div>

            <!-- Additional Details -->
            <div id="formProfile" class="{{ $showForm ? '' : 'hidden' }}">
                <!-- Username Field -->
                <label for="nama">Username</label>
                <input type="text" id="nama" wire:model="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5">

                <!-- Email Field -->
                <label for="email">Email</label>
                <input type="email" id="email" wire:model="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5">

                <!-- Password Field -->
                <label for="password">Password</label>
                <input type="password" id="password" wire:model="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5">

                <!-- Foto Profile Field -->
                <label for="foto">Foto Profile</label>
                <input type="file" id="foto" wire:model="photo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2.5">

                <!-- Display image preview if exists -->
                @if ($photo)
                    <div class="mt-2 relative p-5 shadow-lg">
                        <!-- Preview Image -->
                        <img src="{{ $photo->temporaryUrl() }}" alt="Preview Foto" class="w-full h-auto object-cover rounded-md">

                        <!-- "X" to remove the photo -->
                        <button type="button" wire:click="removePhoto" class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-2">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @elseif ($user->photo)
                    <div class="mt-2 relative">
                        <!-- Current Profile Image -->
                        <img src="{{ Storage::disk('public')->url($user->photo) }}" alt="Current Foto" class="w-32 h-32 object-cover rounded-md">

                        <!-- "X" to remove the existing photo -->
                        <button type="button" wire:click="removePhoto" class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-2">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endif
            </div>

            <div class="mt-6 space-y-2">
                @if ($showForm)
                <button wire:click="save"
                    class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                    Simpan Profile
                </button>
                <button wire:click="closeProfile"
                    class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">
                    Close
                </button>
                @else
                    <button wire:click="editProfile"
                        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                        Edit Profile
                    </button>
                    <button wire:click="logout"
                        class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">
                        logout
                    </button>
                @endif
            </div>

        </div>
    </div>

</div>
