<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

//home
Route::get('/', function () {
    $jobs = Job::all();
    dd($jobs[1]->title);
});

//contact
Route::get('/contact', function () {
    return view('contact');
});

//jobs
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->simplePaginate(3);

    return view('jobs.index',[
        "jobs"=>$jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs',function (){
    dd('hello');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show',['job'=>$job]);
});
