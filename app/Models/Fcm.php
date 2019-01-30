<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fcm extends Model
{

    protected $table = 'user_fcm_tokens';

    protected $fillable = [
        'user_id',
        'fcm'
    ];

}