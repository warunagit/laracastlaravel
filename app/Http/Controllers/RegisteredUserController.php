<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        //validate
        $validatesattributes = request([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['required','email'],
            'password'=>['required','min:6', 'confirmed'],
            'created_at' => \Carbon\Carbon::now()->timestamp,
            'updated_at' => \Carbon\Carbon::now()->timestamp,
        ]);
        // ->validate([

        // ]);

        //create the user
        $user = User::create($validatesattributes);

        //login
        Auth::login($user);

        //redirect
        return redirect('/jobs');
    }
}
