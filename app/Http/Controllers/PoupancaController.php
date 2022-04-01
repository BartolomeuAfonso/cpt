<?php

namespace App\Http\Controllers;

use App\pessoa;
use App\quota;
use App\empresa;
use Illuminate\Http\Request;
use PDF;

class PoupancaController extends Controller
{


    public function index()
    {
        $pessoa = pessoa::all();
        return view('poupanca.index', compact('pessoa'));
    }

    public function getPoupanca()
    {

        return view('poupanca.operacao');
    }

    public function getPoupancaPadroes()
    {

        return view('poupanca.operacaoPatroes');
    }


    public function getSalvarPoupanca(Request $request)
    {

        $this->getPoupancaSave($request);
        $id = $this->getUltimaQuota()->id;
        return $this->ImprimirRecibo($id, 1);
    }


    public function getUltimaQuota()
    {
        $ultimo = quota::getUltimaQuota();
        return $ultimo;
    }

    public function getPoupancaSave(Request $request)
    {
        $poupanca = new quota();
        $pessoa = pessoa::porBI($request->id_contrato);
        $poupanca->id_pessoa = $pessoa->id;
        $poupanca->numDias = $request->valorrecebido / 1000;
        if (is_null($request->tipo)) {
            $poupanca->tipo = '';
        } else {
            $poupanca->tipo = $request->tipo;
        }
        $poupanca->valorvalido = $request->valorrecebido;
        $poupanca->data = date('Y-m-d');
        $poupanca->save();
    }

    public function ImprimirRecibo($id, $codigoVersao)
    {
        $quotas = quota::getComprovativo($id);
        $pessoa = new pessoa();
        $poupanca = $pessoa->getSomaPoupanca($quotas->nBi);
        if ($codigoVersao == 1) {
            $versao = 'Original';
        } else {
            $versao = "2ª Via";
        }

        return PDF::loadView('relatorio.comprovativo', compact('quotas', 'versao', 'poupanca'))->setPaper('A6', 'portrait')->stream('Fatura.pdf');
    }

    public function getListaPoupanca()
    {
        $quota = quota::geListaPoupanca();
        return view('poupanca.listaPoupanca', compact('quota'));
    }


    public function getRelatorio(Request $request)
    {
        $dataInicio =  $request->input('dataInicio');
        $dataFim = $request->input('dataFinal');
        $codigoCliente = $request->input('codigoCliente');
        $opcao = $request->input('radio1');


        if ($opcao == 1) {
            $quotas = quota::getComprovativoData($codigoCliente, $dataInicio, $dataFim);
            $pessoa = new pessoa();
            $poupanca = $pessoa->getSomaPoupancaporData($codigoCliente, $dataInicio, $dataFim);
            $versao = "2ª Via";
            if (is_null($quotas)) {
                return redirect('listaPoupanca')->with('error', 'Não pagamento de Poupança registado nesta' . $dataInicio);
            } else {


                return PDF::loadView('relatorio.comprovativo', compact('quotas', 'versao', 'poupanca'))->setPaper('A6', 'portrait')->stream('Fatura.pdf');
            }
        } elseif ($opcao == 2) {

            $dadosFactura = empresa::all();
            $quotas = quota::getBuscaQuotaporMensal($codigoCliente, $dataInicio, $dataFim);
            $cont = 0;
            for ($i = 0; $i < count($quotas); $i++) {
                $cont = $cont + $quotas[$i]->valorvalido;
            }
            return PDF::loadView('relatorio.poupancaMensal', compact('dadosFactura', 'quotas', 'cont'))->setPaper('A4', 'portrait')->stream('Fatura.pdf');
        } else {

            // Poupança Anual
            return PDF::loadView('relatorio.comprovativo', compact('quotas', 'versao', 'poupanca'))->setPaper('A6', 'portrait')->stream('Fatura.pdf');
        }
    }
}
