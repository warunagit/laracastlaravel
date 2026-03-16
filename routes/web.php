<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    $jobs = Job::all();
    dd($jobs[1]->title);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->get();

    return view('jobs',[
        "jobs"=>$jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    //dd($job);
    return view('job',['job'=>$job]);
});
