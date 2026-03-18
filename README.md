1
php artisan serve
host the project in localhost

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
then do changes and add to database
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

Make a mmodel with factory
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

in routes, wildcard selecters must go to bottom to prevent similar fixed url conflicts.

