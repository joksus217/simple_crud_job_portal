<?php

namespace App\Models\Repositories;

use App\Models\Base\User;

class FreelancerRepository
{
    function getFreelancerByUserId($id) 
    {
        $user = User::find($id);

        if($user->freelancer){
            return $user->freelancer;
        } else {
            return false;
        }
        
    }
}
