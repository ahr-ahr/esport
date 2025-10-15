<!-- Modal Register -->
<div id="registerModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[500] flex items-center justify-center">
    <div class="bg-[#1e1e1e] rounded-lg shadow-lg w-full max-w-sm p-6 relative">
        <form id="registerForm" autocomplete="off">
            <!-- Tombol Close -->
            <button id="closeRegisterModal" type="button"
                class="absolute top-3 right-3 text-gray-400 hover:text-[#FF9800]">✕</button>

            <!-- Logo -->
            <div class="flex justify-center mb-4">
                <h2 class="text-2xl font-bold text-[#FF9800] mb-4 text-center">Media69</h2>
            </div>

            <!-- Step 1 -->
            <div class="register-step" data-step="1">
                <div>
                    <label class="block text-gray-300 mb-1">Fullname</label>
                    <input type="text" name="fullname"
                        class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-[#FF9800]">
                </div>
                <div class="mt-4">
                    <label class="block text-gray-300 mb-1">Username</label>
                    <input type="text" name="username"
                        class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-[#FF9800]">
                </div>
                <button type="button" onclick="nextRegisterStep(2)"
                    class="mt-6 w-full bg-[#FF9800] hover:bg-[#FB8C00] text-white font-bold py-2 px-4 rounded transition">Selanjutnya</button>
            </div>

            <!-- Step 2 -->
            <div class="register-step hidden" data-step="2">
                <div>
                    <label class="block text-gray-300 mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-[#FF9800]">
                </div>
                <div class="mt-4">
                    <label class="block text-gray-300 mb-1">Phone</label>
                    <input type="tel" name="phone"
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
                    <input type="password" name="password"
                        class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-[#FF9800]">
                </div>
                <div class="flex gap-2 mt-6">
                    <button type="button" onclick="prevRegisterStep(2)"
                        class="w-1/2 bg-gray-600 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded transition">Kembali</button>
                    <button type="button" id="submitRegister"
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
                    <button type="button" id="verifyOtpBtn"
                        class="w-1/2 bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded transition">Verifikasi</button>
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
const BASE_URL = "https://db0ebc92066d.ngrok-free.app/api/v1/auth";
let currentStep = 1;

// Data register
let registerData = {
    fullname: "",
    username: "",
    email: "",
    phone: "",
    password: "",
    role: "owner",
    fcm_token: "consequatur"
};

// --- Tampilkan step ---
function showRegisterStep(step) {
    document.querySelectorAll(".register-step").forEach(el => el.classList.add("hidden"));
    const stepEl = document.querySelector(`.register-step[data-step="${step}"]`);
    if (stepEl) {
        stepEl.classList.remove("hidden");
        currentStep = step;
    }
}

// --- Lanjut step ---
function nextRegisterStep(step) {
    if (currentStep === 1) {
        const stepEl = document.querySelector('.register-step[data-step="1"]');
        const fullname = stepEl.querySelector("input[name='fullname']");
        const username = stepEl.querySelector("input[name='username']");
        if (!fullname.value.trim() || !username.value.trim()) {
            Swal.fire("Perhatian", "Fullname dan Username wajib diisi!", "warning");
            return;
        }
        registerData.fullname = fullname.value.trim();
        registerData.username = username.value.trim();
    } else if (currentStep === 2) {
        const stepEl = document.querySelector('.register-step[data-step="2"]');
        const email = stepEl.querySelector("input[name='email']");
        const phone = stepEl.querySelector("input[name='phone']");
        if (!email.value.trim() || !phone.value.trim()) {
            Swal.fire("Perhatian", "Email dan Phone wajib diisi!", "warning");
            return;
        }
        registerData.email = email.value.trim();
        registerData.phone = phone.value.trim();
    } else if (currentStep === 3) {
        const stepEl = document.querySelector('.register-step[data-step="3"]');
        const password = stepEl.querySelector("input[name='password']");
        if (!password.value.trim()) {
            Swal.fire("Perhatian", "Password wajib diisi!", "warning");
            return;
        }
        registerData.password = password.value.trim();

        // Kirim ke API, submitRegister akan handle step 4
        submitRegister();
        return; // jangan lanjutkan showRegisterStep
    }

    showRegisterStep(step);
}

// --- Kembali step ---
function prevRegisterStep(step) {
    showRegisterStep(step);
}

// --- Submit register ke API ---
async function submitRegister() {
    const btn = document.getElementById("submitRegister");
    btn.disabled = true;
    btn.textContent = "Mengirim...";

    console.log("Request body JSON:", JSON.stringify(registerData));

    try {
        const res = await fetch(`${BASE_URL}/register`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(registerData)
        });

        const data = await res.json();
        console.log("Response:", data);

        if (res.ok) {
            showRegisterStep(4); // tampilkan step OTP
            Swal.fire("Berhasil!", "Kode OTP telah dikirim ke email kamu.", "success");
        } else {
            Swal.fire("Gagal!", data.message || data.error || "Terjadi kesalahan.", "error");
        }
    } catch (err) {
        console.error(err);
        Swal.fire("Error", "Tidak dapat menghubungi server.", "error");
    } finally {
        btn.disabled = false;
        btn.textContent = "Selanjutnya";
    }
}

// --- Verifikasi OTP ---
document.getElementById("verifyOtpBtn").addEventListener("click", async () => {
    const email = registerData.email.trim();
    const otpInputs = document.querySelectorAll(".otp-input");
    const otpCode = Array.from(otpInputs).map(i => i.value).join("");

    if (otpCode.length < 6) {
        Swal.fire("Perhatian", "Masukkan semua 6 digit kode OTP.", "warning");
        return;
    }

    const btn = document.getElementById("verifyOtpBtn");
    btn.disabled = true;
    btn.textContent = "Memverifikasi...";

    try {
        const res = await fetch(`${BASE_URL}/verify`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({ email, otp: otpCode })
        });

        const data = await res.json();
        console.log("Response verifikasi:", data);

        if (res.ok) {
            if (data.token) localStorage.setItem("token", data.token);

            Swal.fire("Verifikasi Berhasil", "Akun kamu telah aktif!", "success").then(() => {
                document.getElementById("registerModal").classList.add("hidden");
                location.reload();
            });
        } else {
            Swal.fire("Gagal!", data.message || "Kode OTP salah.", "error");
        }
    } catch (err) {
        console.error(err);
        Swal.fire("Error", "Tidak dapat menghubungi server.", "error");
    } finally {
        btn.disabled = false;
        btn.textContent = "Verifikasi";
    }
});

// --- Auto fokus OTP ---
document.querySelectorAll(".otp-input").forEach((input, idx, arr) => {
    input.addEventListener("input", () => {
        if (input.value.length === 1 && idx < arr.length - 1) arr[idx + 1].focus();
    });
});

// --- Tutup modal ---
document.getElementById("closeRegisterModal").addEventListener("click", () => {
    document.getElementById("registerModal").classList.add("hidden");
});

// --- Tampilkan step awal ---
showRegisterStep(currentStep);
</script>
