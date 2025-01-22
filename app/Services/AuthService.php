<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;

class AuthService
{
    private $secretKey;
    public function __construct()
    {
        $this->secretKey = config('app.jwt_secret');
    }
    
    public function login(array $credentials)
    {
        Log::info('Attempting to login with email: ' . $credentials['email']);
        
        $user = User::where('email', $credentials['email'])->first();
        $response = ['success' => false, 'message' => 'User not found'];

        if ($user) {
            $comparePassword = password_verify($credentials['password'], $user->password);
            if ($comparePassword) {
                $token = JWTAuth::fromUser($user);
                if ($token) {
                    Session::put('jwt', $token);
                    Log::info('Successfully login with email: ' . $credentials['email']);
                    $response = [
                        'success' => true,
                        'message' => 'Login successful',
                        'token' => $token,
                        'user' => $user,
                    ];
                } else {
                    $response['message'] = 'Invalid credentials';
                }
            } else {
                $response['message'] = 'Invalid credentials';
            }
        }

        return $response;
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(Session::get('jwt'));
            Session::forget('jwt');
            return response()->json(['success' => true, 'message' => 'Successfully logged out']);
        } catch (JWTException $exception) {
            return response()->json(['success' => false, 'message' => 'Token tidak valid']);
        }
    }

    public function register(array $data)
    {
        Log::info('Registering user with email: ' . $data['email']);

        if (User::where('email', $data['email'])->exists()) {
            Log::warning('Email already exists: ' . $data['email']);
            return ['success' => false, 'message' => 'Email already exists'];
        }

        $nameFromEmail = explode('@', $data['email'])[0];
        $data['nama'] = ucwords(str_replace('.', ' ', $nameFromEmail));

        $data['password'] = bcrypt($data['password']);

        Log::info('Data to be stored: ', $data);

        try {
            $user = User::create([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'password' => $data['password'],
                'position' => $data['position'],
                'image_url' => $data['image_url'] ?? null,
            ]);
            
            Log::info('User created: ', $user->toArray());

            $token = JWTAuth::fromUser($user);

            return [
                'success' => true,
                'message' => 'User registered successfully',
                'token' => $token,
                'user' => $user,
            ];

        } catch (\Exception $e) {
            Log::error('Failed to register user: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to register user'];
        }
    }
}
