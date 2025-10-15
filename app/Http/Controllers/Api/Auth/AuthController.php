<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\AuthService;
use App\Http\Resources\Auth\UserResource;
use App\Http\Requests\Auth\RegisterUserRequest;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterUserRequest $request)
    {
        $data = $this->authService->register($request->validated());

        return response()->json([
            'message' => 'Registrasi berhasil! Silakan verifikasi OTP.',
            'user' => new UserResource($data['user']),
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
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
            ], 201);
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

            return response()->json(['message' => 'Akun berhasil diverifikasi!'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

}


?>