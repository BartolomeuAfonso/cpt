<?php

namespace App\Http\Controllers;

use App\provincia;
use App\quioques;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuioquesController extends Controller
{



    public function lista()
    {

        $quiosque = quioques::geListaQuioques();
        //   dd($quiosque);

        return view('quiosques.index', compact('quiosque'));
    }

    public function index()
    {
        $provincia  = provincia::all();
        return view('quiosques.create', compact('provincia'));
    }

    public function registarQuiosque(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'nome' => 'required',
                'paragem' => 'required'
            ]
        );
        if (quioques::where('designacao',  $request->input('nome'))->exists()) {
            return back()->with('error', 'Staff já existe na base de dados');
        } else {
            try {

                if ($validator->fails()) {
                    return redirect('staff.cadastroStaff')
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    $quioques = new quioques();
                    $quioques->designacao = $request->input('nome');
                    $quioques->codigoProvincia = $request->input('biprovincia');
                    $quioques->codigoMunicipio = $request->input('bimunicipio');
                    $quioques->paragem = $request->input('paragem');
                    $quioques->save();
                    return back()->with('sucesso', 'Dados salvo com sucesso');
                }
            } catch (Exception $e) {
                return back()->with('error', 'Erro ao tentar registar cliente.');
            }
        }
    }


    public function getObterDados($parametro)
    {

        $codigo = base64_decode($parametro);
        $quiosques = quioques::find($codigo);

        $provincia  = provincia::all();

        return view('quiosques.editar', compact('provincia', 'quiosques'));
    }


    public function editarQuiosque(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'nome' => 'required',
                'paragem' => 'required'
            ]
        );
        if (quioques::where('designacao',  $request->input('nome'))->exists()) {
            return back()->with('error', 'Staff já existe na base de dados');
        } else {
            try {

                if ($validator->fails()) {
                    return redirect('staff.cadastroStaff')
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    $quioques = quioques::find($request->id);
                    $quioques->designacao = $request->input('nome');
                    $quioques->codigoProvincia = $request->input('biprovincia');
                    $quioques->codigoMunicipio = $request->input('bimunicipio');
                    $quioques->paragem = $request->input('paragem');
                    $quioques->save();
                    return back()->with('sucesso', 'Dados alterado com sucesso');
                }
            } catch (Exception $e) {
                return back()->with('error', 'Erro ao tentar registar cliente.');
            }
        }
    }
}
