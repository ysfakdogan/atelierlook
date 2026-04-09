<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'brand_name',
        'platform',
        'profile_url',
        'followers',
        'temperature',
        'status',
    ];
}
