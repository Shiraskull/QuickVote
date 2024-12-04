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
            {{-- <div class="text-gray-700 space-y-2">
                <div class="flex items-center justify-between">
                    <span class="font-medium">Phone:</span>
                    <span class="text-gray-600">+123 456 7890</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="font-medium">Address:</span>
                    <span class="text-gray-600">123 Main Street, City</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="font-medium">Joined:</span>
                    <span class="text-gray-600">January 1, 2023</span>
                </div>
            </div> --}}

            <!-- Edit Profile Button -->
            <div class="mt-6">
                <button
                    class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                    Edit Profile
                </button>
            </div>
        </div>
    </div>

</div>
