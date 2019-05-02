<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class SignupController extends Controller
{
    function index() {
        return view('signup');
    }

    function signup() {
        $user = new User();
        $user->username = request('username');
        // bcrypt
        $user->password = Hash::make(request('password'));
        $user->save();

        Auth::login($user);
        return redirect('/customers');
    }
}
