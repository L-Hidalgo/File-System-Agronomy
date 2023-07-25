<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable=[
        'titulo',
        'categoria_id',
        'estado',
        'user_id',
        'subido_por',
        'estudiante',
        'dirigido',
    ];
    public function Username(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Subido(){
        return $this->belongsTo(User::class, 'subido_por');
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
