<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use Validator;

class SignupController extends Controller
{
    function index() {
        return view('signup');
    }

    function signup(Request $request) {

        $input = $request->all();

        $validation = Validator::make($input, [
            'username' => 'required|unique:users,username',
            'password' => 'required'      
        ]);

        if ($validation->fails()) {
            return redirect('/signup')
                ->withInput()
                ->withErrors($validation);
        }

        $user = new User();
        $user->username = request('username');
        // encrypt
        $user->password = Hash::make(request('password'));
        
        $user->save();

        Auth::login($user);
        return redirect('/customers');
    }
}
