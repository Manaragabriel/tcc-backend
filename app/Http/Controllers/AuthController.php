<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('system/auth/register');
    }

    public function do_register(){
        return view('system/auth/register');
    }

    public function login(){
        return view('system/auth/login');
    }

    public function do_login(){
        return view('system/auth/login');
    }
}
