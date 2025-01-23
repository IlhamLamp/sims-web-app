<?php

namespace App\Services\Contracts;

interface UserServiceInterface
{
    public function getCurrentUserProfile(): array;
    public function updateUser(array $userData): array;
}
