<?php

namespace App\Http\Controllers;

use App\municipio;
use App\StaffModel;
use Illuminate\Routing\Controller as BaseController;


class MunicipioController extends BaseController
{

    public $municipios;


    public function getMunicipio($codigoMunicipio)
    {
        $municipios = municipio::getMunicipioByIdProvincia($codigoMunicipio);

        return json_encode($municipios);
    }
    public function getAssociacao($codigoMunicipio)
    {
        $associacao = StaffModel::getAssociacaoByStaff($codigoMunicipio);

        return json_encode($associacao);
    }
}
