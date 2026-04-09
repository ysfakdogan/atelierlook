<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailLog extends Model
{
    protected $fillable = [
        'email',
        'subject',
        'is_read',
        'read_at'
    ];
}
