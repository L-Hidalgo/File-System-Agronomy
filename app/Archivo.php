<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table="archivos";
    protected $fillable=["documento_id","path","tipo"];

    public function Tipodocumento(){
        return $this->belongsTo(Documento::class, 'documento_id');
    }
}
