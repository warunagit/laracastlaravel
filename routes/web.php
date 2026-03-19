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
//show all
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(5);

    return view('jobs.index',[
        "jobs"=>$jobs
    ]);
});

//create page
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//store request
Route::post('/jobs', function (){
    //define validation ciriterias
    request()->validate([
        'title'=>['required','min:3'],
        'salary'=>['required','min:3']
    ]);

    //bind and store validated data
    Job::create([
        'title'=>request('title'),
        'salary'=>request('salary'),
        'employer_id'=>1
    ]);

    return redirect('/jobs');
});

//edit page
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit',['job'=>$job]);
});

//update request
Route::patch('/jobs/{job}', function (Job $job) {
    request()->validate([
        'title'=>['required','min:3'],
        'salary'=>['required','min:3']
    ]);

    $job->update([
        'title'=>request('title'),
        'salary'=>request('salary')
    ]);

    return redirect("/jobs/".$job->id);
});

//destroy request
Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();
    return redirect('/jobs');
});

//show
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show',['job'=>$job]);
});