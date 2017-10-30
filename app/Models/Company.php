<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'headline', 'description', 'address', 'employer', 'website', 'foundation', 'phone', 'company_email',
        'facebook', 'linkedin', 'company_detail'
    ];

    public function user()
    {
        return $this->morphTo(User::class, 'userable');
    }
}
