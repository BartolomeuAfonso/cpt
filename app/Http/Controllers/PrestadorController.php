<?php

namespace App\Http\Controllers;

use App\prestador;
use Illuminate\Http\Request;

class PrestadorController extends Controller
{
    

    public function index(){

        $prestador = prestador::all();
        return view('prestador.index', compact('prestador'));
    }
}
