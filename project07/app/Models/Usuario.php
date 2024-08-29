<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public function funcao() {
        return $this->belongsToMany('App\Models\Funcao', 'Funcao_usuario');
    }

    public function perfil() {
        return $this->hasOne('App\Models\Perfil');
    }

    public function setor() {
        return $this->belongsTo('App\Models\Setor');
    }

}
