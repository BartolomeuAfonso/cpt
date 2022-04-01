<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\StaffModel;
use App\associacao;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $listaStaff = StaffModel::getDadosStaff();

        return view('staff.index', compact('listaStaff'));
    }

    public function getFormulario()
    {

        $staff = associacao::all();
        return view('staff.create', compact('staff'));
    }

    public function registarStaff(Request $request)
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
        if (StaffModel::where('designacao',  $request->input('nome'))->exists()) {

            return back()->with('error', 'Staff já existe na base de dados');
        } else {
            try {

                if ($validator->fails()) {
                    return redirect('staff.cadastroStaff')
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    $staff = new StaffModel();
                    $staff->designacao = $request->input('nome');
                    $staff->endereco = $request->input('endereco');
                    $staff->telefone = $request->input('responsavel');
                    $staff->responsavel = $request->input('telefone');
                    $staff->codigoAssociacao = $request->input('codigoAssociacao');
                    $staff->codigoStatus = 1;
                    $staff->save();

                    return back()->with('sucesso', 'Dados salvo com sucesso');
                }
            } catch (Exception $e) {
                return back()->with('error', 'Erro ao tentar registar cliente.');
            }
        }
    }

    public function obterDadosStaff($id_staff)
    {
        $id  = base64_decode($id_staff);
        $staff = StaffModel::find($id);
        $associacao = associacao::all();
        return view('staff.editar', compact('staff','associacao'));
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
            return redirect('editar')
                ->withErrors($validator)
                ->withInput();
        } else {

            $staff = StaffModel::find($request->id);
            $staff->designacao = $request->input('nome');
            $staff->endereco = $request->input('endereco');
            $staff->telefone = $request->input('responsavel');
            $staff->responsavel = $request->input('telefone');
            $staff->codigoAssociacao = $request->input('codigoAssociacao');
            $staff->codigoStatus = 1;
            $staff->save();
            return back()->with('sucesso', 'dados alterado com sucesso');
        }
    }
}
