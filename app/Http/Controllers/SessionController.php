<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class SessionController extends Controller
{

    public function create(){
        return view('auth.login');
    }

    public function store(){}
}
