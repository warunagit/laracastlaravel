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




