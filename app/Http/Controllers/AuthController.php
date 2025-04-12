<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LogoutRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $registerRequest): ?JsonResponse
    {
        try {
            $user = User::create([
                'name' => $registerRequest->name,
                'email' => $registerRequest->email,
                'password' => Hash::make($registerRequest->password)
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'user' => $user,
            ], 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 403);
        }
    }

    public function login(LoginRequest $loginRequest): ?JsonResponse
    {
        $credentials = [
            'email' => $loginRequest->email,
            'password' => $loginRequest->password
        ];

        try {
            if (!auth()->attempt($credentials)) {
                return response()->json([
                    'message' => 'Invalid credentials.',
                ], 401);
            }

            $user = User::where('email', $loginRequest->email)->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'user' => $user,
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Login failed.',
                'error' => $exception->getMessage(), // 디버깅용. 운영 환경에선 생략 가능
            ], 500);
        }
    }

    public function logout(LogoutRequest $logoutRequest): ?JsonResponse
    {
        // $logoutRequest->user()->tokens()->delete(); // 모든 토큰 삭제 (로그아웃 + 다른 기기 로그아웃도 됨)
        $logoutRequest->user()->currentAccessToken()->delete();


        return response()->json([
            'message' => 'User has been logged out successfully!'
        ], 200);
    }
}
