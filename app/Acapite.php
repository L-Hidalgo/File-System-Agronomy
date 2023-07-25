<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acapite extends Model
{

    protected $table="acapite";
    protected $fillable=[
        'comentario',
        'documento_id',
        'user_id',
    ];
    public function Username(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
