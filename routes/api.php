<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Team\TeamController;
use App\Http\Controllers\Api\Team\TeamJoinRequestController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Middleware\JwtMiddleware;

Route::prefix('v1')->group(function () {
    Route::prefix('/auth')->group(function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/verify', [AuthController::class, 'verifyOtp']);
    });

    Route::middleware(JwtMiddleware::class)->post('/save-fcm-token', function (Request $request) {
        $request->validate(['token' => 'required|string']);

        $user = $request->user();
        $user->update(['fcm_token' => $request->token]);

        return response()->json(['success' => true]);
    });

    Route::middleware(JwtMiddleware::class)->prefix('teams')->group(function () {
        Route::get('/', [TeamController::class, 'index']);
        Route::post('/', [TeamController::class, 'store']);
        Route::post('/{id}/invite', [TeamController::class, 'invitePlayers']);
        Route::get('/invites', [TeamController::class, 'getInvite']);
        Route::patch('/invites/{id}', [TeamController::class, 'respondinvite']);
        Route::post('/{team}/join-request', [TeamJoinRequestController::class, 'store']);
    });
});
