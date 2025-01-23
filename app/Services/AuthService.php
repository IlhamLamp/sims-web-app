<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService implements AuthServiceInterface
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {}
    
    public function register(array $userData): array
    {
        $userData['password'] = bcrypt($userData['password']);
        $user = $this->userRepository->create($userData);

        return $this->generateAuthResponse($user);
    }
    
    public function login(array $credentials): array
    {
        $user = $this->userRepository->findByEmail($credentials['email']);
        $compare_password = password_verify($credentials['password'], $user->password);

        if (!$user || !$compare_password) {
            return [
                'success' => false,
                'message' => 'Invalid credentials'
            ];
        }

        return $this->generateAuthResponse($user);
    }

    public function logout(): array
    {
        JWTAuth::invalidate(Session::get('jwt'));
        Session::forget('jwt');
        return [
            'success' => true,
            'message' => 'Successfully logged out'
        ];
    }

    private function generateAuthResponse(User $user): array
    {
        $token = JWTAuth::fromUser($user);

        return [
            'success' => true,
            'token' => $token,
            'user' => $user->toArray()
        ];
    }
}
