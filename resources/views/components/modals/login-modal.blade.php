<!-- Modal Background -->
<div id="loginModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[500] flex items-center justify-center">
    <!-- Modal Card -->
    <div class="bg-[#1e1e1e] rounded-lg shadow-lg w-full max-w-sm p-6 relative">

        <!-- Tombol Close -->
        <button id="closeLoginModal" class="absolute top-3 right-3 text-gray-400 hover:text-[#FF9800]">
            ✕
        </button>

        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <!-- <img src="/images/logo.png" alt="Logo" class="h-12"> -->
            <h2 class="text-2xl font-bold text-[#FF9800] mb-4 text-center">Media69</h2>
        </div>


        <!-- Form Login -->
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-300 mb-1">Email</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-[#FF9800]">
            </div>
            <div>
                <label class="block text-gray-300 mb-1">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-[#FF9800]">
            </div>

            <!-- Tombol Login -->
            <button type="submit"
                class="w-full bg-[#FF9800] hover:bg-[#FB8C00] text-white font-bold py-2 px-4 rounded transition">
                Masuk
            </button>
        </form>

        <!-- Divider -->
        <div class="flex items-center my-4">
            <hr class="flex-grow border-gray-600">
            <span class="px-2 text-gray-400 text-sm">atau</span>
            <hr class="flex-grow border-gray-600">
        </div>

        <!-- Login Sosial -->
        <div class="flex justify-center gap-4 mt-4">
            <!-- Google -->
            <a href="#"
                class="w-12 h-12 rounded-full bg-white flex items-center justify-center shadow hover:shadow-md hover:bg-gray-300 transition">
                <img src="{{ asset('images/google.png') }}" alt="Google" class="w-6 h-6">
            </a>

            <!-- Discord -->
            <a href="#"
                class="w-12 h-12 rounded-full bg-[#5865F2] flex items-center justify-center hover:bg-[#4752c4] transition text-white text-xl">
                <i class="fab fa-discord"></i>
            </a>
        </div>

        <!-- Link Register -->
        <p class="text-gray-400 text-sm text-center mt-4">
            Belum punya akun?
            <a href="#" id="toRegister" class="text-[#FF9800] hover:underline">Daftar</a>
        </p>
    </div>
</div>

<script>
    document.getElementById('userIcon').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('loginModal').classList.remove('hidden');
    });

    document.getElementById('closeLoginModal').addEventListener('click', function () {
        document.getElementById('loginModal').classList.add('hidden');
    });

    window.addEventListener('click', function (e) {
        if (e.target === document.getElementById('loginModal')) {
            document.getElementById('loginModal').classList.add('hidden');
        }
    });

    document.getElementById('toRegister').addEventListener('click', function (e) {
    e.preventDefault();

    // Tutup modal login
    document.getElementById('loginModal').classList.add('hidden');

    // Buka modal register
    document.getElementById('registerModal').classList.remove('hidden');
});

</script>