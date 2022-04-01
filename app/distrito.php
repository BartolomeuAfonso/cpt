<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class distrito extends Model
{

    protected $table = "distritos";
    protected $fillable = ['id', 'codigoMunicipio', 'designacao'];

    public static function getDistritoByIdMunicipioQuiosque($codigoMunicipio)
    {
        $distritos = DB::table('distritos')
            ->join('quiosque', 'provincias.id', '=', 'municipios.codigoProvincia')
            ->where('municipios.id', '=', $codigoMunicipio)
            ->select('provincias.id', 'provincias.designacao', 'provincia.sigla')
            ->get();

        return $distritos;
    }
}
