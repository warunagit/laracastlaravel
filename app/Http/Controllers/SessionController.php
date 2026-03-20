<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create(){
        return view('auth.login');
    }

    public function store(){
        //validate the user
        $validated = request()->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        //attempt to login
        if(! Auth::attempt($validated)){
            throw ValidationException::withMessages([
                'email'=>"Sorry, these credentials are not matched."
            ]);
        }
        //regenerate the session token
        request()->session()->regenerate();
        //redirect
        return redirect('/jobs');
    }

    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
