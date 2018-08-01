<?php

namespace App\Models\Repositories;

use App\Models\Base\Proposal;
use App\Models\Base\Job;

class ProposalRepository
{
    function create($request, $job_id) 
    {
        $proposal = new Proposal;

        $proposal->freelancer_id = $request->freelancer_id;
        $proposal->job_id = $job_id;
        $proposal->budget = $request->budget;
        $proposal->estimation_date = $request->estimation_date;
        $proposal->summary = $request->summary;

        if($proposal->save()){
        	return $proposal->id;
        } else {
        	return false;
        }
    }

    function checkIsDuplicate($freelancer_id, $job_id)
    {
    	$user = Proposal::where('freelancer_id', $freelancer_id)
    						->where('job_id', $job_id)
    						->first();

    	if($user){
    		return true;
    	} else {
    		return false;
    	}
    }

    function getPerMonth($freelancer_id, $month = null)
    {
    	if($month == null){
    		$month = date('n');
    	}

    	$proposal = Proposal::where('freelancer_id', $freelancer_id)
    						->whereRaw('MONTH(created_at) = '.$month)
    						->get();

    	if($proposal){
    		return $proposal;
    	} else {
    		return false;
    	}
    }

    function getByJob($company_id, $job_id)
    {
    	$job = Job::where('id',$job_id)
                        ->where('company_id', $company_id)
                        ->first();

        if(@$job->jobFreelancer){
            $proposal = [];
            foreach ($job->jobFreelancer as $freelancer) {
                $proposal[] = [
                    'freelancer' => $freelancer->user->fullname,
                    'position' => $freelancer->position,
                    'experience' => $freelancer->experience,
                    'budget' => $freelancer->pivot->budget,
                    'estimation_date' => $freelancer->pivot->budget,
                    'summary' => $freelancer->pivot->summary
                ];
                
            }  

            return $proposal;
        } else {
            return false;
        }
    }
}
