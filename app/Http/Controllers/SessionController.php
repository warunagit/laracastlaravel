<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(){
        //validate
        request()->validate([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['required','email'],
            'password'=>['required',Password::min(6), 'confirmed'],
        ]);
        //create the user
        //login
        //redirect
    }
}
