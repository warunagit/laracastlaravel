<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Loader\Configurator\Routes;

Route::view('/','home');
Route::view('/contact','contact');

Route::resource('jobs', JobController::class);

Route::get('/register', [RegisterUserController::class,'create']);
