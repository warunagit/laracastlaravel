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
    $jobs = Job::with('employer')->latest()->simplePaginate(5);

    return view('jobs.index',[
        "jobs"=>$jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function (){
    Job::create([
        'title'=>request('title'),
        'salary'=>request('salary'),
        'employer_id'=>1
    ]);
    return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show',['job'=>$job]);
});
