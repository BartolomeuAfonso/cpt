<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UsuarioModel;

class LoginController extends Controller
{



    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
           
            return redirect()->intended('layouts.inicio');
        }
    }
}
