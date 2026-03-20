<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        //validate
        $validatesattributes = request()->validate([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['required','email'],
            'password'=>['required','min:6','required']
        ]);

        //create the user
        $user = User::create($validatesattributes);

        //login
        Auth::login($user);

        //redirect
        return redirect('/jobs');
    }
}
