<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'position',
        'image_url',
    ];

    public function getJWTIdentifier()
    {
        // Ini adalah metode yang diperlukan oleh JWTSubject untuk mendapatkan ID pengguna
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        // Kembalikan klaim kustom jika diperlukan (misalnya peran pengguna)
        return [];
    }
}
