<?php

namespace App\Models\Repositories;

use App\Models\Base\User;

class CompanyRepository
{
    function getCompanyByUserId($id) 
    {
        $user = User::find($id);

        if($user->company){
            return $user->company;
        } else {
            return false;
        }
        
    }
}
