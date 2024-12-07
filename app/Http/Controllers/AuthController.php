<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only(['email', 'password']);
        $response = $this->authService->login($credentials);

        if (!$response['success']) {
            return back()->withErrors(['error' => $response['message']]);
        }

        session(['jwt' => $response['token']]);

        return redirect()->intended('/dashboard')->with('message', 'Login successful!');
    }

    public function logout()
    {
        $this->authService->logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function register (Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'position' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);

        $data = $request->only(['nama', 'email', 'password', 'position', 'image_url']);

        $response = $this->authService->register($data);

        if (!$response['success']) {
            return response()->json(['error' => $response['message']], 400);
        }

        return response()->json([
            'message' => 'User registered successfully',
            'token' => $response['token'],
            'user' => $response['user'],
        ], 201);
    }
}
