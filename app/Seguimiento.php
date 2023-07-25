<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $fillable=[
        'documento_id',
        'de_donde',
        'a_donde',
    ];
    public function Username(){
        return $this->belongsTo(Documento::class, 'documento_id');
    }
}
