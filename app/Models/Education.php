<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Education extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'educations';

    protected $fillable = [
        'candidate_id',
        'degree',
        'major',
        'institute',
        'start',
        'end',
        'description'
    ];

}
