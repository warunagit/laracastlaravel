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
Route::get('/jobs/{id}/edit', function ($id) {
    //find the job with id
    $job = Job::find($id);
    //send the job object to the edit page
    return view('jobs.edit',['job'=>$job]);
});

//update request
Route::patch('/jobs/{id}', function ($id) {
    //validate
    request()->validate([
        'title'=>['required','min:3'],
        'salary'=>['required','min:3']
    ]);

    //authorize

    //make update and presist
    $job = Job::findOrFail($id);
    $job->update([
        'title'=>request('title'),
        'salary'=>request('salary')
    ]);
    //redirect
    return redirect("/jobs/".$job->id);
});

//destroy request
Route::delete('/jobs/{id}', function ($id) {
    //authorize

    //delete the job
    Job::findOrFail($id)->delete();
    //redirect
    return redirect('/jobs');
});

//show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show',['job'=>$job]);
});
