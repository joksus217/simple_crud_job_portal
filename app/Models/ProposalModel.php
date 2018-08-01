<?php

namespace App\Models;

use App\Models\Repositories\FreelancerRepository;
use App\Models\Repositories\ProposalRepository;
use App\Models\Repositories\JobRepository;
use App\Models\Repositories\CompanyRepository;

class ProposalModel
{

    static function create($request, $job_id)
    {
        $freelancer = new FreelancerRepository;

        $detail = $freelancer->getFreelancerByUserId($request->userid);

        if($detail){
            $request->freelancer_id = $detail->id;
            $proposal = new ProposalRepository;

            $status = $proposal->create($request, $job_id);

            return $status;
        } else {
            return false;
        } 
    }

    static function check($userid, $job_id)
    {
        $freelancer = new FreelancerRepository;
        $detail_freelancer = $freelancer->getFreelancerByUserId($userid);

        if(!$detail_freelancer){
            return 'invalid_user'; 
        }

        $job = new JobRepository;
        $detail_job = $job->getActivejob($job_id);

        if(!$detail_job){
            return 'invalid_job'; 
        }

        $proposal = new ProposalRepository;
        $check_duplicate = $proposal->checkIsDuplicate($detail_freelancer->id, $job_id);

        if($check_duplicate){
            return 'already_submited'; 
        }

        $proposal_this_month = $proposal->getPerMonth($detail_freelancer->id);

        if($detail_freelancer->rank == 1){
           $limit = 20; 
        } else {
            $limit = 10;
        }

        if($proposal_this_month){
            if($proposal_this_month->count() >= $limit){
                return 'max_limit'; 
            }  
        }
        

        return true;
    }

    static function get($userid, $job_id)
    {
        $company = new CompanyRepository;

        $detail_company = $company->getcompanyByUserId($userid);

        if($detail_company){
            $proposal = new ProposalRepository;
            
            $status = $proposal->getByJob($detail_company->id, $job_id);

            return $status;
        } else {
            return false;
        } 
    }
}
