<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class provincia extends Model
{

    protected $table = "provincias";
    protected $fillable = ['id', 'designacao', 'sigla'];

    public static function getListaProvinciaByIdMunicipio($id)
    {
        $provincia = DB::table('provincias')
            ->join('municipios', 'provincias.id', '=', 'municipios.codigoProvincia')
            ->where('municipios.id', '=', $id)
            ->select('provincias.id', 'provincias.designacao', 'provincia.sigla')
            ->get();

        return $provincia;
    }

    public static function getIdProvincia($designacao)
    {

        $provincia = DB::table('provincia')
            ->where('provincia.designacao', '=', $designacao)
            ->get();

        return $provincia;
    }
}
