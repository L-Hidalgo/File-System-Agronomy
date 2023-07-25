<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempimage extends Model
{
    protected $fillable=[
        'user_id',
        'archivo',
        'path',
    ];
}
