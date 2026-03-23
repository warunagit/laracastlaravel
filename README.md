composer global require laravel/installer
laravel new appname

1
php artisan serve
host the project in localhost

in routes, wildcard selecters must go to bottom to prevent similar fixed url conflicts.

2
to send data from route to page, use array
routes/web.php

3
component file name should be similar to custom html tag
layout.blade.php -> x-layout
$slot use to view the page in the template

4
nav use same custom component file
nav-link.blade.php -> x-nav-link

pages send as params objects: $attributes

5
sqlite

Request to add changes updated in related files
php artisan migrate:refresh

Request to make new table
1-request to make new table file
//php artisan make:migration
2-this will make a new file
//create_tablename_table
3-find the new file inside database\migrations
4-update the content as required
5-Execute the update
//php artisan migrate

6
Eloquent ORM
import eloquent to class: use Illuminate\Database\Eloquent\Model;
extends reuqired class with Model: class name extends Model{}
class name and table name has converssion;
Table comments - class Comment, posts - Post

create new object class
php artisan make:model

crate migration table file
//php artisan make:model Post -m

do changes and add to database
//php artisan migrate

7
factories
! generated data will fill in to database table

use to generate fake/example data
model class must implement 'HasFactory' tarit from Illuminate pakagegi.

factory class file can find in Database\factories\UserFactory.php
required columns must be the same with class and database table.

//App\Models\User::factory()->create();
//App\Models\User::factory(8)->create();

generate factory class
//php artisan make:factory JobFactory

generate data with unverified(null) emails
App\Models\User::factory(5)->unverified()->create();
as same as, can make any field to any fixed value by setting column value in the factory class.
admin => false

and custome methods can call as same as unverified method to generate values for any table column.

adding foreign id to a table
in migration file
$table->foreignIdFor(\App\Models\Employer::class);

Make a model with factory
php artisan make:model -m Employer -f
php artisan make:model Tag -mf //migration with factory along

8
//eloquent relationships
class job access to employer by relationship
job can has only one employer
public function employer(){
    return $this->belongsTo(Employer::class);
}

class employer access to job by relationship
employer can has many jobs
public function jobs(){
    return $this->hasMany(Job::class);
}

php artisan tinker
$employer->jobs;
$employer->jobs[0];

9
Pagination

make pagination pages style-able
php artisan vendor:publish

limit pagination per page, in routes\web.php
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->paginate(3);

remove paginate page numbers, shows previous next buttons
->simplePaginate(3);

cursor based pagination
->cursorPaginate(3);

10
Database seeding
populate data into tables while generate classes through migration files create

related files have generated in the folder of,
database\seeders

manual seed
php artisan db:seed

seed while migration
php artisan migrate:fresh --seed

create seeder class
php artisan make:seeder

delete all data and regenerate database and data using seedrer
php artisan migrate:fresh --seed

delete all data and regenerate database
php artisan migrate:fresh

seed only specified table through a seeder class
php artisan db:seed --class=JobSeeder

11
CSRF-Cross Site Request Forgery
related to forms and data submission
solve by tokenizing each request using injecting a hidden input token field

add @csrf tag immediatly after the <form> tag

view all request data in route file
Route::post('/jobs',function (){
    dd(request()->all());

see specified request data field
request('title')

sending form data
Route::post('/jobs', function (){
    Job::create([
        'title'=>request('title'),

results in Decending order
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(5);

in object class..
to spcify table columns to use, should notify in fillable array
//protected $fillable = ['employer_id','title','salary'];
or
to specify table columns to protect, should notify in guarded array
protected $guarded = [];

12
form valdation

button component in views/components/button.blade.php
<a {{ $attributes->merge(['class'=>"inline-flex"]) }}>{{ $slot }}</a>
button component use in page
<x-button href="/jobs/create">Create Job</x-button>

For required input fields;
browser based validation add tag: required
or
server based validation: validate through router file 
Route::post('/jobs', function (){
    request()->validate([
        'title'=>['required','min:3'],
        'name'=>['required','min:3']
    ]);
and; show errors..
As a list of errors, in corresponded blade file
@if($errors->any())
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
or
single error directives below the correspnded form field
@error('title')
<p class="text-xs text-red-500 text-semibold mt-1">{{ $message }}</p>
@enderror

all validations
https://laravel.com/docs/validation

13
Data update-delete Operations
direct to the edit page with eloquent data object by router

use by PATCH, DESTROY methods
most frameworks have inbuilt feature
in laravel, use derectives @method('POST') with form method

mutiple forms
if element to submit in another form, but in another form, 
can use form attribute with form id

14
routes arranging
$id replace by Job object

or
controller class
php artisan make:controller -> empty
file can find in app
\http\controllers\JobController.php

controller class contains just all request handling functions from route file

or
route listing
php artisan route:list --except-vendor

or
Grouping by controller class

or
Route resource
Route::resource('jobs', JobController::class);

can filter page/action requests by adding arrays: only and except
Route::resource('jobs', JobController::class,[
    'only'=>['index','show','create','store']
]);
Route::resource('jobs', JobController::class,[
    'except'=>['edit']
]);

15
authentication

authentication status verify with the directive: 
if registered: @auth
if guest: @guest

'password'=>['required',Password::min(5)->letters()->numbers()]
default()

inline form expressions to view old data
:value="old('email')"

16
Authorization
----------need v23 again----

---1 Inline
check user not logged in
if(Auth::guest()){
    return redirect('/login');
}
check user is has no relationship
JobController.php
if($job->employer->user->isNot(Auth::user())){
    abort(403);
}
return view('jobs.edit',['job'=>$job]);

---2 Gates
AppServiceProvider.php-to access from anywhere in app
Gate::define('edit-job', function(User $user, Job $job){
    return $job->employer->user->is($user);
});
JobController.php
if(Auth::guest()){
    return redirect('/login');
}
Gate::authorize('edit-job', $job);
return view('jobs.edit',['job'=>$job]);

---Can
show.blade.php
@can('edit-job',$job)
        <p class="mt-6">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        </p>
    @endcan

---Middleware
---Policy
these methods are for Router file based authentication
v23 12.03 onwords

17
send email
php artisan make:mail
configurations are in
config\mail
