<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class WorkExperience extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'company_name',
        'position',
        'start',
        'end',
        'job_description',
        'candidate_id'
    ];

}
