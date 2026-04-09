<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    // ✅ Mass assignment için izin verilen alanlar
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'link'
    ];
}
