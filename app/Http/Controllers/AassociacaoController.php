<?php

namespace App\Http\Controllers;

use App\associacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AassociacaoController extends Controller
{

    public function index()
    {
        $associacao = associacao::paginate(10);

        return view('associacao.index', compact('associacao'));
    }


    public function create()
    {


        return view('associacao.create');
    }


    public function registarAssociacao(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'nome' => 'required',
                'endereco' => 'required',
                'responsavel' => 'required',
                'telefone' => 'required'
            ]
        );
        if (associacao::where('designacao',  $request->input('nome'))->exists()) {

            return back()->with('error', 'associacao já existe na base de dados');
        } else {
            try {

                if ($validator->fails()) {
                    return redirect('associacao.cadastroAssociacao')
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    $associacao = new associacao();
                    $associacao->designacao = $request->input('nome');
                    $associacao->endereco = $request->input('endereco');
                    $associacao->telefone = $request->input('responsavel');
                    $associacao->responsavel = $request->input('telefone');
                    $associacao->codigoStatus = 1;
                    $associacao->save();
                    return back()->with('sucesso', 'Dados salvo com sucesso');
                }
            } catch (Exception $e) {
                return back()->with('error', 'Erro ao tentar registar cliente.');
            }
        }
    }


    public function obterDadosAssociacao($id)
    {
        $id  = base64_decode($id);
        $associacao = associacao::find($id);

        return view('associacao.editar', compact('associacao'));
    }

    public function editar(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nome' => 'required',
                'endereco' => 'required',
                'responsavel' => 'required',
                'telefone' => 'required'
            ]
        );
        if ($validator->fails()) {
            return redirect('associacao.editar')
                ->withErrors($validator)
                ->withInput();
        } else {

            $associacao = associacao::find($request->id);
            $associacao->designacao = $request->input('nome');
            $associacao->endereco = $request->input('endereco');
            $associacao->telefone = $request->input('responsavel');
            $associacao->responsavel = $request->input('telefone');
            $associacao->codigoStatus = 1;
            $associacao->save();
            return back()->with('sucesso', 'dados alterado com sucesso');
        }
    }
}
