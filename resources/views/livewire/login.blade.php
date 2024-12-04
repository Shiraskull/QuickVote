<div class="bg-cover bg-center bg-fixed"
    {{-- style="background-image: url('{{ asset('storage/' . $app['background_app']) }}')" --}}
    >
    <div class="h-screen flex justify-center items-center">
        <div class="bg-white mx-4 p-8 rounded-3xl shadow-md w-full md:w-1/2 lg:w-1/3">
            <div class="text-center mb-8">
                    {{-- <img src="{{ asset('storage/' . $app['logo_path']) }}" class="mx-auto mb-4 h-16 w-16"
                        alt="Logo Sekolah"> --}}

                <h1 class="text-xl font-bold">Welcome!</h1>
                {{-- <h2 class="text-base font-bold">Manajemen Website </h2> --}}
            </div>
            <button wire:loading wire:target="remove">
                ssss
            </button>
            <form wire:submit.prevent="login">
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-2" for="email">
                        Email
                    </label>
                    @error('email')
                        <span class="text-red-600 text-sm block mb-2">{{ $message }}</span>
                    @enderror
                    <input
                        class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" type="email" wire:model="email" placeholder="Masukan email anda" />
                </div>

                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-2" for="password">
                        Password
                    </label>

                    <div class="relative">
                        <input wire:model="password" type="{{ $type }}" id="password"
                            class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukan Password">
                        <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3"
                            wire:click="togglePassword">
                            @if ($type === 'text')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            @endif
                        </button>
                    </div>
                    @error('password')
                        <span class="text-red-600 text-sm block mb-2">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-6">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg w-full focus:outline-none focus:shadow-outline flex justify-center items-center"
                        type="submit" wire:loading.attr="disabled" wire:target="login">
                        <span wire:loading.class.remove="hidden" class="hidden" wire:target="login">
                            <svg class="animate-spin h-5 w-5 mr-3 text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </span>
                        <span wire:loading.class="hidden" wire:target="login">Login</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
