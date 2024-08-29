<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    use HasFactory;

    public function usuario() {
        return $this->belongsToMany('App\Models\Usuario', 'Funcao_usuario');
    }
}
