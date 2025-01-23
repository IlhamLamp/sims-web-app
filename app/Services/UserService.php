<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserService implements UserServiceInterface
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {}

    public function getCurrentUserProfile(): array
{
    $user = JWTAuth::user();

    if (!$user) {
        return [
            'success' => false,
            'message' => 'User not authenticated'
        ];
    }
    return [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'position' => $user->position,
        'image_url' => $user->image_url
    ];
}

    public function updateUser(array $userData): array
    {
        $user = $this->userRepository->update(JWTAuth::id(), $userData);

        return [
            'success' => true,
            'message' => 'Profile updated successfully',
            'user' => (array) $user
        ];
    }
}
