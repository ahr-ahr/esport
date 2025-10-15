<!-- Modal Login -->
<div id="loginModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[500] flex items-center justify-center">
    <div class="bg-[#1e1e1e] rounded-lg shadow-lg w-full max-w-sm p-6 relative">

        <!-- Tombol Close -->
        <button id="closeLoginModal" class="absolute top-3 right-3 text-gray-400 hover:text-[#FF9800]">✕</button>

        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <h2 class="text-2xl font-bold text-[#FF9800] mb-4 text-center">Media69</h2>
        </div>

        <!-- Form Login -->
        <form id="loginForm" autocomplete="off" class="space-y-4">
            <div>
                <label class="block text-gray-300 mb-1">Username atau Email</label>
                <input type="text" id="loginInput" name="login" required
                    class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-[#FF9800]">
            </div>
            <div>
                <label class="block text-gray-300 mb-1">Password</label>
                <input type="password" id="passwordInput" name="password" required
                    class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-[#FF9800]">
            </div>

            <button type="submit"
                class="w-full bg-[#FF9800] hover:bg-[#FB8C00] text-white font-bold py-2 px-4 rounded transition">
                Masuk
            </button>
        </form>

        <div class="flex items-center my-4">
            <hr class="flex-grow border-gray-600">
            <span class="px-2 text-gray-400 text-sm">atau</span>
            <hr class="flex-grow border-gray-600">
        </div>

        <div class="flex justify-center gap-4 mt-4">
            <a href="#" class="w-12 h-12 rounded-full bg-white flex items-center justify-center shadow hover:shadow-md hover:bg-gray-300 transition">
                <img src="{{ asset('images/google.png') }}" alt="Google" class="w-6 h-6">
            </a>
            <a href="#" class="w-12 h-12 rounded-full bg-[#5865F2] flex items-center justify-center hover:bg-[#4752c4] transition text-white text-xl">
                <i class="fab fa-discord"></i>
            </a>
        </div>

        <p class="text-gray-400 text-sm text-center mt-4">
            Belum punya akun?
            <a href="#" id="toRegister" class="text-[#FF9800] hover:underline">Daftar</a>
        </p>
    </div>
</div>

<script>
const BASE_URL = "http://localhost:8000/api/v1/auth"; // ubah sesuai API kamu

// === Modal Control ===
document.getElementById('userIcon')?.addEventListener('click', e => {
    e.preventDefault();
    document.getElementById('loginModal').classList.remove('hidden');
});

document.getElementById('closeLoginModal').addEventListener('click', () => {
    document.getElementById('loginModal').classList.add('hidden');
});

window.addEventListener('click', e => {
    if (e.target === document.getElementById('loginModal')) {
        document.getElementById('loginModal').classList.add('hidden');
    }
});

document.getElementById('toRegister').addEventListener('click', e => {
    e.preventDefault();
    document.getElementById('loginModal').classList.add('hidden');
    document.getElementById('registerModal').classList.remove('hidden');
});

// === Login Function ===
document.getElementById("loginForm").addEventListener("submit", async (e) => {
    e.preventDefault();

    const login = document.getElementById("loginInput").value.trim();
    const password = document.getElementById("passwordInput").value.trim();

    if (!login || !password) {
        Swal.fire("Perhatian", "Isi semua kolom terlebih dahulu.", "warning");
        return;
    }

    try {
        const response = await fetch(`${BASE_URL}/login`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({ login, password })
        });

        const data = await response.json();
        console.log("Login Response:", data);

        if (response.ok) {
            Swal.fire("Berhasil!", "Login berhasil.", "success");

            // simpan token ke localStorage kalau dikirim
            if (data.token) {
                localStorage.setItem("auth_token", data.token);
            }

            // tutup modal
            document.getElementById("loginModal").classList.add("hidden");

            // contoh redirect
            setTimeout(() => window.location.reload(), 1000);
        } else {
            Swal.fire("Gagal!", data.message || "Login gagal. Periksa username dan password.", "error");
        }
    } catch (error) {
        console.error(error);
        Swal.fire("Error!", "Terjadi kesalahan koneksi ke server.", "error");
    }
});
</script>
