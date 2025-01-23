<?php

use App\Services\Contracts\UserServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        private readonly UserServiceInterface $userService
    ) {}


    public function profile(): JsonResponse
    {
        return response()->json(
            $this->userService->getCurrentUserProfile()
        );
    }

    public function update(UserRequest $request): JsonResponse
    {
        return response()->json(
            $this->userService->updateUser($request->validated())
        );
    }

}
