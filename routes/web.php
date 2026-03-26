<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('test',function (){
    //queue
    /*dispatch(function(){
        logger('hello from queue');
    })->delay(5);*/
    $job = Job::first();
    TranslateJob::dispatch($job);

    return 'Done';
});

Route::view('/','home');
Route::view('/contact','contact');

Route::resource('jobs', JobController::class);

Route::get('/register', [RegisteredUserController::class,'create']);
Route::post('/register', [RegisteredUserController::class,'store']);

Route::get('/login', [SessionController::class,'create']);
Route::post('/login', [SessionController::class,'store']);
Route::post('/logout', [SessionController::class,'destroy']);
