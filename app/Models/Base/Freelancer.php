<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'freelancers';

    public function jobProposal()
    {
        return $this->belongsToMany('App\Models\Base\Job', 'proposals');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Base\User');
    }
}