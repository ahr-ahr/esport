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
        if (!$token = Auth::attempt($credentials)) {
            throw new \Exception('Email atau password salah.');
        }

        $user = Auth::user();

        if ($user->account_status !== 'verified') {
            throw new \Exception('Akun belum diverifikasi.');
        }

        return compact('user', 'token');
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