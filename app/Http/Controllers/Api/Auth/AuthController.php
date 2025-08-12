<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\AuthService;
use App\Http\Resources\Auth\UserResource;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:100|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6',
            'role' => 'nullable|in:player,owner,captain,coach,analyst,manager,admin,substitute,content_creator',
            'fcm_token' => 'nullable|string',
            'account_status' => 'pending',
        ]);

        try {
            $data = $this->authService->register($request->all());

            return response()->json([
                'message' => 'Registrasi berhasil! Silakan verifikasi OTP.',
                'user' => new UserResource($data['user']),
            ], 201);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string', // bisa email/phone/username
            'password' => 'required|string',
        ]);

        try {
            $data = $this->authService->login([
                'login' => $request->login,
                'password' => $request->password
            ]);

            return response()->json([
                'message' => 'Login berhasil!',
                'user' => new UserResource($data['user']),
                'token' => $data['token'],
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp_code' => 'required|digits:6',
        ]);

        try {
            $this->authService->verifyOtp($request->email, $request->otp_code);

            return response()->json(['message' => 'Akun berhasil diverifikasi!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

}


?>