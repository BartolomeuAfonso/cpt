<?php

namespace App\Http\Controllers;

use App\plano;
use Illuminate\Http\Request;
use DataTables;

class PlanoController extends Controller
{



    public function index(){

        $plano = plano::paginate(10);
        return view('plano.index', compact('plano'));
    }
}
