<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'data_nascimento'
    ];

    public function funcao() {
        return $this->belongsToMany(Funcao::class, 'funcao_usuarios')->withPivot('dataInicio');
    }

    public function perfil() {
        return $this->hasOne('App\Models\Perfil');
    }

    public function setor() {
        return $this->belongsTo('App\Models\Setor');
    }

}
