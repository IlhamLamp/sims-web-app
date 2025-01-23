<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    public function __construct(private readonly AuthServiceInterface $authService) {}

    public function register(RegisterRequest $request): JsonResponse
    {
        return response()->json(
            $this->authService->register($request->validated())
        );
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $response = $this->authService->login($request->validated());
        if (!$response['success']) {
            return response()->json($response, 401);
        }
        return response()->json($response, 200);
    }

    public function logout(): JsonResponse
    {
        return response()->json(
            $this->authService->logout()
        );
    }
}
