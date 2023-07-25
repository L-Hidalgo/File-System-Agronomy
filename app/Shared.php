<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shared extends Model
{
    protected $table="shared";
    protected $fillable=[
        'documento_id',
        'user_id',
        'correo_id',
    ];
    public function Document(){
        return $this->belongsTo(Documento::class, 'documento_id');
    }
    public function Username(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Correo(){
        return $this->belongsTo(Correo::class, 'correo_id');
    }
}
