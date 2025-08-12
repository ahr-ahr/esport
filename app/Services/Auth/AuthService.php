<?php

namespace App\Services\Auth;

use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Notifications\SendOtpNotification;

class AuthService
{
    public function register(array $data): array
    {
        $data['otp_code'] = random_int(100000, 999999);
        $data['otp_expires_at'] = now()->addMinutes(10);
        $data['account_status'] = 'pending';
        $data['password'] = Hash::make($data['password']);
        $data['fcm_token'] = $data['fcm_token'] ?? null;

        $user = User::create($data);
        $token = JWTAuth::fromUser($user);

        $user->notify(new SendOtpNotification($data['otp_code']));

        return compact('user', 'token');
    }

    public function login(array $credentials): array
    {
        $login = $credentials['login'] ?? null;
        $password = $credentials['password'] ?? null;

        if (!$login || !$password) {
            throw new \InvalidArgumentException('Login dan password wajib diisi.');
        }

        // Tentukan kolom yang dipakai untuk attempt: email / phone / username
        $field = $this->resolveLoginField($login);

        // Satu kali attempt dengan field yang tepat (JWT akan mengembalikan token)
        if (!$token = Auth::attempt([$field => $login, 'password' => $password])) {
            throw new \Exception('Email/nomor HP/username atau password salah.');
        }

        $user = Auth::user();

        if ($user->account_status !== 'verified') {
            Auth::logout(); // kalau mau paksa logout token yang baru
            throw new \Exception('Akun belum diverifikasi.');
        }

        return compact('user', 'token');
    }

    private function resolveLoginField(string $login): string
    {
        // Cek email
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        }

        // Cek phone (sederhana): hanya digit, boleh diawali +, panjang 7–15
        // Sesuaikan regex/normalisasi dengan format penyimpanan di DB (mis. +62 vs 08)
        if (preg_match('/^\+?\d{7,15}$/', $login)) {
            return 'phone';
        }

        // Sisanya dianggap username
        return 'username';
    }

    public function verifyOtp(string $email, string $otpCode): void
    {
        $user = User::where('email', $email)
            ->where('otp_code', $otpCode)
            ->first();

        if (!$user) {
            throw new \Exception('Kode OTP salah');
        }

        if (now()->greaterThan($user->otp_expires_at)) {
            throw new \Exception('Kode OTP sudah kadaluarsa');
        }

        $user->update([
            'otp_code' => null,
            'otp_expires_at' => null,
            'account_status' => 'verified',
        ]);
    }

}


?>