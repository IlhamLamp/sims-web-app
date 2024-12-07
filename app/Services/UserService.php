<?php

namespace App\Services;

use Tymon\JWTAuth\Facades\JWTAuth;
use \Tymon\JWTAuth\Exceptions\JWTException;

class UserService
{
    public function getUserFromToken()
    {
        $token = session('jwt');
        if (!$token) {
            return response()->json(['success' => false, 'message' => 'Token not found'], 401);
        }

        try {
            $user = JWTAuth::setToken($token)->authenticate();
            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not found'], 404);
            }
            return response()->json(['success' => true, 'user' => $user]);
        } catch (JWTException $exception) {
            return response()->json(['success' => false, 'message' => 'Invalid token'], 401);
        }
    }
}
