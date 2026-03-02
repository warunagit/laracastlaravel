<?php

namespace App\Models;
use \Illuminate\Support\Arr;

class Job{

    public static function all():array{
        return [
            [
                "id"=>1,
                "title"=>"Director",
                "salary"=>"50,000"
            ],
            [
                "id"=>2,
                "title"=>"Designer",
                "salary"=>"35,000"
            ],
            [
                "id"=>3,
                "title"=>"Engineer",
                "salary"=>"45,000"
            ]
        ];
    }

    public static function find(int $id){
        $job =  Arr::first(static::all(),fn ($job) => $job['id'] == $id);

        if(!$job){
            abort(404);
        }

        return $job;
    }
}
