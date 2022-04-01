<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class municipio extends Model
{
    protected $table = "municipios";
    protected $fillable = ['id', 'designacao', 'codigoProvincia'];



    public static function getMunicipioByIdProvincia($codigoProvincia)
    {
        $municipios = DB::table('municipios')
            ->where('municipios.codigoProvincia', '=', $codigoProvincia)
            ->get();

        return $municipios;
    }
 
}
