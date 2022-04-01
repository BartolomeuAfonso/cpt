<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class servico extends Model
{
    protected $table = "servicos";
    protected $fillable = ['id', 'designacao', 'preco1', 'codigoCategoria', 'codigoStatus'];

    public static function geListaProdutos()
    {
        $quiosque = DB::table('servicos')
            ->join('categorias', 'servicos.codigoCategoria', '=', 'categorias.id')
            ->select('servicos.id as id', 'servicos.designacao as designacao', 'servicos.preco1 as preco', 'categorias.designacao as categoria')
            ->paginate(15);

        return $quiosque;
    }
}
