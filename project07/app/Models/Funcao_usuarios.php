<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcao_usuarios extends Model
{
    use HasFactory;

    protected $primaryKey = ['usuario_id', 'funcao_id'];

    protected $fillable = ['descricao', 'dataInicio'];
}
