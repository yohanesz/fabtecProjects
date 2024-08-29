<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['vencimento', 'pagamento'];

    public function produtos() {
        return $this->belongsToMany('App\Models\Produto', 'pedido__produtos')->withPivot('valorUnitario', 'quantidade');
    }

    public function totalPedido() {
        $total = 0;

        foreach($this->produtos() as $produto)
            $total +=($produto->pivot->quantidade * $produto->pivot->valorUnitario);


        return $total;
    }
}
