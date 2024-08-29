<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;


    protected $primaryKey = 'usuario_idusuario';
    public $incrementing = false;

    public function usuario() {
        return $this->belongsTo('App\Models\Usuario');
    }
}
