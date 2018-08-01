<?php

namespace App\Models\Repositories;

use App\Models\Base\Job;

class JobRepository
{
    function getActivejob($id) 
    {
        $job = Job::where('id', $id)
        			->where('status', 1)
        			->first();

        if($job){
            return $job;
        } else {
            return false;
        }
        
    }
}
