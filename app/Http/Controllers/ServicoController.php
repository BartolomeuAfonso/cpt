<?php

namespace App\Http\Controllers;

use App\servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{

    public function index()
    {

        $servico = servico::geListaProdutos();
        return view('servicos.index', compact('servico'));
    }
}
