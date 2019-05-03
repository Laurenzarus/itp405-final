<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class LoginController extends Controller
{
    function index() {
        return view('login');
    }

    function login() {
        $loginWasSuccessful = Auth::attempt([//will attempt to login and return true or false
            'username' => request('username'),
            'password' => request('password')
        ]);
        // dd(Hash::make(request('password')));
        if ($loginWasSuccessful) {
            return redirect('/customers');
        }
        else {
            return redirect('/login')
                ->withInput()
                ->withErrors(['message' => 'That username with that password does not exist. Please Try again']);
        }
    }

    function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
