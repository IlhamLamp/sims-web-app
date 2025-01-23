<?php

namespace App\Services\Contracts;

interface AuthServiceInterface
{
    public function register(array $userData): array;
    public function login(array $credentials): array;
    public function logout(): array;
}
