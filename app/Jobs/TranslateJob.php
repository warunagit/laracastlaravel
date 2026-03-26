<?php

namespace App\Jobs;

use App\Models\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TranslateJob implements ShouldQueue{
    use Queueable;

    public function __construct(public Job $jobListing){
        //
    }
    public function handle(): void{
        /*example
        AI::translate($this->jobListing->description, 'spanish');
        */

        logger(['translating..',$this->jobListing->title, 'to Spanish']);
    }
}
