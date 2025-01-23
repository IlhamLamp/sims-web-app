<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class ProfileViewController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function edit()
    {
        return view('dashboard.profile.edit');
    }
}
