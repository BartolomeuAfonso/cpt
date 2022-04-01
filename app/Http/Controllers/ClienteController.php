<?php

namespace App\Http\Controllers;

use App\associacao;
use Illuminate\Http\Request;
use App\pessoa;
use App\plano;
use App\provincia;
use App\funcao;
use Illuminate\Support\Facades\Validator;
use PDF;

class ClienteController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        return view('formulario.cliente');
    }


    public function listaCliente()
    {
        $pessoa = pessoa::getDadosCliente();
        return view('cliente.index', compact('pessoa'));
    }

    public function resgistoPessoa()
    {
        $provincia = provincia::all();
        $plano = plano::all();
        //    $staff = StaffModel::all();
        $staff = associacao::all();
        $funcao = funcao::all();
        $provincia = provincia::all();
        return view('cliente.create', compact('provincia', 'plano', 'staff', 'funcao'));
    }

    public function salvaPessoal(Request $request)
    {
        //   dd($request);
        $validator = Validator::make(
            $request->all(),
            []
        );

        if (pessoa::where('nome',  $request->input('nome'))->exists()) {
            return back()->with('error', 'Esse nome já existe na base de dados, contactar a Mind Vision Tecnology');
        } else {
            try {

                if ($validator->fails()) {
                    return redirect('pessoa.create')
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    $pessoa = new pessoa();
                    $pessoa->nome = $request->input('nome');
                    $pessoa->genero = $request->input('genero');
                    $pessoa->pai = $request->input('pai');
                    $pessoa->mae = $request->input('mae');
                    $pessoa->nDependente = $request->input('nDependente');
                    $pessoa->estadocivil = $request->input('estadocivil');
                    $pessoa->dataNasc = $request->input('dataNasc');
                    $pessoa->naturalidade = $request->input('naturalidade');
                    $pessoa->nBi = $request->input('nBi');
                    $pessoa->biprovincia = $request->input('biprovincia');
                    $pessoa->bimunicipio = $request->input('bimunicipio');
                    $pessoa->endereco = $request->input('biendereco');
                    $pessoa->codigoFuncao = $request->input('codigoFuncao');
                    $pessoa->data_ingresso = $request->input('data_ingresso');
                    $pessoa->codigoAssociacao = $request->input('codigoAssociacao');
                    $pessoa->matricula = $request->input('matricula');
                    $pessoa->codigoStaff = $request->input('codigoStaff');
                    $pessoa->data_venc_seguro = $request->input('data_venc_seguro');
                    $pessoa->data_venc_licenca = $request->input('data_venc_licenca');
                    $pessoa->telefone_proprietario = $request->input('telefone_proprietario');
                    $pessoa->telefone_proprietario = $request->input('telefone_proprietario_alt');
                    $pessoa->email_proprietario = $request->input('email_proprietario');
                    $pessoa->contacto = $request->input('contacto');
                    $pessoa->email = $request->input('email');
                    $pessoa->habilitacoes = $request->input('habilitacoes');
                    $pessoa->save();
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
        $pessoa = pessoa::find($codigo);
        $provincia = provincia::all();
        $staff = associacao::all();
        $funcao = funcao::all();
        $provincia = provincia::all();
        return view('cliente.editar', compact('pessoa', 'provincia', 'funcao', 'staff'));
    }


    public function atualizacao(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            []

        );

        if (pessoa::where('nome',  $request->input('nome'))->exists()) {
            return back()->with('error', 'Esse nome já existe na base de dados, contactar a Mind Vision Tecnology');
        } else {
            try {
                if ($validator->fails()) {
                    return redirect('pessoa.create')
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    $pessoa = pessoa::find($request->id);
                    $pessoa->nome = $request->input('nome');
                    $pessoa->genero = $request->input('genero');
                    $pessoa->pai = $request->input('pai');
                    $pessoa->mae = $request->input('mae');
                    $pessoa->nDependente = $request->input('nDependente');
                    $pessoa->estadocivil = $request->input('estadocivil');
                    $pessoa->dataNasc = $request->input('dataNasc');
                    $pessoa->naturalidade = $request->input('naturalidade');
                    $pessoa->nBi = $request->input('nBi');
                    $pessoa->biprovincia = $request->input('biprovincia');
                    $pessoa->bimunicipio = $request->input('bimunicipio');
                    $pessoa->endereco = $request->input('biendereco');
                    $pessoa->codigoFuncao = $request->input('codigoFuncao');
                    $pessoa->data_ingresso = $request->input('data_ingresso');
                    $pessoa->codigoStaff = $request->input('codigoStaff');
                    $pessoa->matricula = $request->input('matricula');
                    $pessoa->codigoStaff = $request->input('codigoStaff');
                    $pessoa->data_venc_seguro = $request->input('data_venc_seguro');
                    $pessoa->data_venc_licenca = $request->input('data_venc_licenca');
                    $pessoa->telefone_proprietario = $request->input('telefone_proprietario');
                    $pessoa->telefone_proprietario = $request->input('telefone_proprietario_alt');
                    $pessoa->email_proprietario = $request->input('email_proprietario');
                    $pessoa->contacto = $request->input('contacto');
                    $pessoa->email = $request->input('email');
                    $pessoa->habilitacoes = $request->input('habilitacoes');
                    $pessoa->save();
                    return back()->with('sucesso', 'Dados alteradoss com sucesso');
                }
            } catch (Exception $e) {
                return back()->with('error', 'Erro ao tentar registar cliente.');
            }
        }
    }

    /** ---------------------------- Consulta extra ---------------------------- */
    public function baixarContrato()
    {
        return view('cliente.vista');
    }

    public function pesquisaporBi($codigo)
    {
  //        $pessoa = pessoa::porBI($codigo);
        $pessoa = $this->getBuscaQuota($codigo);
     
        return json_encode($pessoa);
    }


    public function ImprimirContrato(Request $request)
    {
        // dd($request->nome);

        $cliente = pessoa::getDadosClienteporId($request->nome);
        // dd($cliente);

        return PDF::loadView('relatorio.fichaCPT', compact('cliente'))->setPaper('A4', 'portrait')->stream('Fatura.pdf');
    }
    public function ImprimirContratoporParametro($id)
    {
        // dd($request->nome);

        $cliente = pessoa::getDadosClienteporId($id);
        // dd($cliente);

        return PDF::loadView('relatorio.fichaCPT', compact('cliente'))->setPaper('A4', 'portrait')->stream('Fatura.pdf');
    }
    /* ------------------------------------ Quotas* */
    public function getBuscaQuota($codigo)
    {
        $Pessoa = new pessoa();
        $pessoa = $Pessoa->getSoma($codigo);
     
         return $pessoa;
    }


  
}
