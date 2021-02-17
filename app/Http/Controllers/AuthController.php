<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function register(){
        return view('system/auth/register');
    }

    public function do_register(RegisterUser $request){
        try{
            $validUser = $request->validated();
            $password =  $validUser['password'];
            $validUser['password'] = Hash::make($password);
            $newUser = User::create($validUser)->toArray();
            $newUser['password']  = $password;

           Auth::attempt($newUser);
            return redirect('painel');

        } catch (\Exception $e){
            dd($e->getMessage());
        }
    }

    public function login(){
        return view('system/auth/login');
    }

    public function do_login(){
        return view('system/auth/login');
    }
}
