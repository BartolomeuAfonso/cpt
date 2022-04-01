<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fatura_itens extends Model
{
    protected $table = "factura_itens";
    protected $fillable =  ['codigoFactura','codigoServico','preco','designacao', 'descontoFactura','descontoIva','quantidade','flag'];
}
