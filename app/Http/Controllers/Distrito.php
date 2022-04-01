<?php

namespace App\Http\Controllers;

use App\distrito as AppDistrito;
use App\municipio;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Distrito extends BaseController
{

    public function getDistrito()
    {
        $codigoMunicipio = $this->request->getVar('id');
        $distritos = AppDistrito::selectDistrito($codigoMunicipio);
        return $distritos;
    }
}
