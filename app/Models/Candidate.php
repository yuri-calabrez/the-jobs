<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'headline', 'description', 'cover', 'salary', 'address', 'phone', 'website', 'age', 'facebook', 'linkedin', 'github'
    ];

    public function user()
    {
        return $this->morphTo(User::class, 'userable');
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }
}
