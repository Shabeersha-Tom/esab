<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function loginView()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $request->validated();

        

    }
}
