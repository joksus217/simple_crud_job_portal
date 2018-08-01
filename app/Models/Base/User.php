<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    public function freelancer()
    {
        return $this->hasOne('App\Models\Base\Freelancer');
    }

    public function company()
    {
        return $this->hasOne('App\Models\Base\Company');
    }
}