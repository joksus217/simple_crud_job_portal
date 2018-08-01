<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jobs';

    public function jobFreelancer()
    {
        return $this->belongsToMany('App\Models\Base\Freelancer', 'proposals')->withPivot('budget', 'estimation_date', 'summary');
    }
}