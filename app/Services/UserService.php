<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {}

    public function getCurrentUserProfile(): array
{
    $user = Auth::user();

    if (!$user) {
        return [
            'success' => false,
            'message' => 'User not authenticated'
        ];
    }
    return (array) $user;
}

    public function updateUser(array $userData): array
    {
        $user = $this->userRepository->update(Auth::id(), $userData);

        return [
            'success' => true,
            'message' => 'Profile updated successfully',
            'user' => (array) $user
        ];
    }
}
