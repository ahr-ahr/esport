<!-- Modal Register -->
<div id="registerModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[500] flex items-center justify-center">
    <!-- Modal Card -->
    <div class="bg-[#1e1e1e] rounded-lg shadow-lg w-full max-w-sm p-6 relative">
        <form id="registerForm" autocomplete="off">
            <!-- Tombol Close -->
            <button id="closeRegisterModal" class="absolute top-3 right-3 text-gray-400 hover:text-[#FF9800]">
                ✕
            </button>

            <!-- Logo -->
            <div class="flex justify-center mb-4">
                <h2 class="text-2xl font-bold text-[#FF9800] mb-4 text-center">Media69</h2>
            </div>

            <!-- Step 1 -->
            <div class="register-step" data-step="1">
                <div>
                    <label class="block text-gray-300 mb-1">Fullname</label>
                    <input type="text" name="fullname" autocomplete="name"
                        class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-[#FF9800]">
                </div>
                <div class="mt-4">
                    <label class="block text-gray-300 mb-1">Username</label>
                    <input type="text" name="username" autocomplete="username"
                        class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-[#FF9800]">
                </div>
                <button type="button" onclick="nextRegisterStep(2)"
                    class="mt-6 w-full bg-[#FF9800] hover:bg-[#FB8C00] text-white font-bold py-2 px-4 rounded transition">Selanjutnya</button>
            </div>

            <!-- Step 2 -->
            <div class="register-step hidden" data-step="2">
                <div>
                    <label class="block text-gray-300 mb-1">Email</label>
                    <input type="email" name="email" autocomplete="email"
                        class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-[#FF9800]">
                </div>
                <div class="mt-4">
                    <label class="block text-gray-300 mb-1">Phone</label>
                    <input type="text" name="phone" autocomplete="tel"
                        class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-[#FF9800]">
                </div>
                <div class="flex gap-2 mt-6">
                    <button type="button" onclick="prevRegisterStep(1)"
                        class="w-1/2 bg-gray-600 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded transition">Kembali</button>
                    <button type="button" onclick="nextRegisterStep(3)"
                        class="w-1/2 bg-[#FF9800] hover:bg-[#FB8C00] text-white font-bold py-2 px-4 rounded transition">Selanjutnya</button>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="register-step hidden" data-step="3">
                <div>
                    <label class="block text-gray-300 mb-1">Password</label>
                    <input type="password" name="password" autocomplete="new-password"
                        class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-[#FF9800]">
                </div>
                <div class="flex gap-2 mt-6">
                    <button type="button" onclick="prevRegisterStep(2)"
                        class="w-1/2 bg-gray-600 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded transition">Kembali</button>
                    <button type="button" onclick="nextRegisterStep(4)"
                        class="w-1/2 bg-[#FF9800] hover:bg-[#FB8C00] text-white font-bold py-2 px-4 rounded transition">Selanjutnya</button>
                </div>
            </div>

            <!-- Step 4 (OTP) -->
            <div class="register-step hidden" data-step="4">
                <label class="block text-gray-300 mb-3">Verifikasi OTP</label>
                <div class="flex justify-between mb-4">
                    <input type="text" maxlength="1"
                        class="otp-input w-12 h-12 text-center bg-gray-800 text-white border border-gray-600 rounded focus:border-[#FF9800]">
                    <input type="text" maxlength="1"
                        class="otp-input w-12 h-12 text-center bg-gray-800 text-white border border-gray-600 rounded focus:border-[#FF9800]">
                    <input type="text" maxlength="1"
                        class="otp-input w-12 h-12 text-center bg-gray-800 text-white border border-gray-600 rounded focus:border-[#FF9800]">
                    <input type="text" maxlength="1"
                        class="otp-input w-12 h-12 text-center bg-gray-800 text-white border border-gray-600 rounded focus:border-[#FF9800]">
                    <input type="text" maxlength="1"
                        class="otp-input w-12 h-12 text-center bg-gray-800 text-white border border-gray-600 rounded focus:border-[#FF9800]">
                    <input type="text" maxlength="1"
                        class="otp-input w-12 h-12 text-center bg-gray-800 text-white border border-gray-600 rounded focus:border-[#FF9800]">
                </div>
                <div class="flex gap-2">
                    <button type="button" onclick="prevRegisterStep(3)"
                        class="w-1/2 bg-gray-600 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded transition">Kembali</button>
                    <button type="submit"
                        class="w-1/2 bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded transition">Daftar</button>

                </div>
            </div>

            <!-- Link ke Login -->
            <p class="text-gray-400 text-sm text-center mt-4">
                Sudah punya akun?
                <a href="#" id="toLogin" class="text-[#FF9800] hover:underline">Masuk</a>
            </p>

        </form>
    </div>
</div>

<script>
    // Fokus otomatis di OTP
    document.querySelectorAll('.otp-input').forEach((input, index, arr) => {
        input.addEventListener('input', () => {
            if (input.value.length === 1 && index < arr.length - 1) {
                arr[index + 1].focus();
            }
        });
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && input.value === '' && index > 0) {
                arr[index - 1].focus();
            }
        });
    });

    function nextRegisterStep(step) {
        document.querySelectorAll('.register-step').forEach(el => el.classList.add('hidden'));
        document.querySelector(`.register-step[data-step="${step}"]`).classList.remove('hidden');
    }

    function prevRegisterStep(step) {
        document.querySelectorAll('.register-step').forEach(el => el.classList.add('hidden'));
        document.querySelector(`.register-step[data-step="${step}"]`).classList.remove('hidden');
    }

    document.getElementById('closeRegisterModal').addEventListener('click', function () {
        document.getElementById('registerModal').classList.add('hidden');
    });

    window.addEventListener('click', function (e) {
        if (e.target === document.getElementById('registerModal')) {
            document.getElementById('registerModal').classList.add('hidden');
        }
    });

    document.getElementById('toLogin').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('registerModal').classList.add('hidden');
        document.getElementById('loginModal').classList.remove('hidden');
    });
    function validateStep(step) {
  if (step === 1) {
    const fullname = document.querySelector('input[name="fullname"]').value.trim();
    const username = document.querySelector('input[name="username"]').value.trim();
    if (!fullname || !username) {
      alert('Mohon isi fullname dan username.');
      return false;
    }
  }
  if (step === 2) {
    const email = document.querySelector('input[name="email"]').value.trim();
    const phone = document.querySelector('input[name="phone"]').value.trim();
    if (!email || !phone) {
      alert('Mohon isi email dan phone.');
      return false;
    }
  }
  if (step === 3) {
    const password = document.querySelector('input[name="password"]').value;
    if (!password) {
      alert('Mohon isi password.');
      return false;
    }
  }
  return true;
}

function nextRegisterStep(step) {
  // cek validasi dulu
  const currentStep = step - 1; // misal mau lanjut ke step 2 berarti validasi step 1
  if (!validateStep(currentStep)) return; // jika gagal validasi, stop di sini

  document.querySelectorAll('.register-step').forEach(el => el.classList.add('hidden'));
  document.querySelector(`.register-step[data-step="${step}"]`).classList.remove('hidden');
}

</script>

<!-- api -->
<script>
document.getElementById('registerForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    function getRegisterData() {
        const fullname = document.querySelector('input[name="fullname"]').value.trim();
        const username = document.querySelector('input[name="username"]').value.trim();
        const email = document.querySelector('input[name="email"]').value.trim();
        const phone = document.querySelector('input[name="phone"]').value.trim();
        const password = document.querySelector('input[name="password"]').value;

        let otpInputs = document.querySelectorAll('.otp-input');
        let otp = '';
        otpInputs.forEach(input => otp += input.value);

        return { fullname, username, email, phone, password, otp };
    }

    // Kalau kamu mau submit langsung di sini, lakukan validasi dan fetch API langsung
    const data = getRegisterData();

    if (!data.fullname || !data.username || !data.email || !data.phone || !data.password) {
        alert('Mohon isi semua data dengan lengkap.');
        return;
    }

    try {
        const response = await fetch('/api/v1/auth/register', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                fullname: data.fullname,
                username: data.username,
                email: data.email,
                phone: data.phone,
                password: data.password
                // otp: data.otp, jika perlu
            })
        });

        const result = await response.json();

        if (response.ok) {
            alert('Registrasi berhasil! Silakan cek email untuk verifikasi.');
            document.getElementById('registerModal').classList.add('hidden');
        } else {
            alert(result.message || 'Registrasi gagal, coba lagi.');
        }
    } catch (error) {
        console.error('Error saat registrasi:', error);
        alert('Terjadi kesalahan jaringan, silakan coba lagi.');
    }
}); // <-- PENUTUP EVENT LISTENER YANG DIBUTUHKAN
</script>