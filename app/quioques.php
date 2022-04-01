<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class quioques extends Model
{
    
    protected $table = "quiosque";
    protected $fillable = ['id', 'designacao', 'codigoProvincia', 'codigoMunicipio', 'paragem'];

    public static function geListaQuioques()
    {
        $quiosque = DB::table('quiosque')
            ->join('municipios', 'quiosque.codigoMunicipio', '=', 'municipios.id')
            ->join('provincias', 'provincias.id', '=', 'municipios.codigoProvincia')
            ->select('quiosque.id as id', 'quiosque.designacao as nome', 'provincias.designacao as provincia', 'municipios.designacao as cidade', 'quiosque.paragem as paragem')
            ->get();

        return $quiosque;
    }

}
