<div id="loginModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl min-w-80 text-center mx-auto">
        <h2 class="text-xl font-semibold">{{ session('modal.title') }}</h2>
        <p class="mt-2 text-gray-700">{{ session('modal.message') }}</p>
        <button onclick="closeModal()" class="mt-4 w-full bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">Tutup</button>
    </div>
</div>
