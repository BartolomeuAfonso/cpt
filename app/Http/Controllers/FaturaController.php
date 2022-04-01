<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\fatura;
use App\pessoa;
use App\prestador;
use App\servico;
use App\fatura_itens;
use App\empresa;
use PDF;

class FaturaController extends Controller
{

    public function index()
    {

        $produto = servico::all();
        $cliente = pessoa::all();

        return view('faturacao.fatura', compact('produto', 'cliente'));
    }

    public function listaFactura()
    {

        $factura = fatura::getFaturacaoAtual();
        return view('faturacao.listaFactura', compact('factura'));
    }

    public function getMovimento()
    {

        $prestador = prestador::all();
        return view('faturacao.movimento', compact('prestador'));
    }

    public function salvarFatura(Request $request)
    {

        try {
            $this->GetFactura($request);
            $numero_faura = $this->UltimaFactura()->id;

            for ($i = 0; $i < count($request->codigo); $i++) {
                $faturaitens = new fatura_itens();
                $faturaitens->codigoFactura = $numero_faura;
                $faturaitens->codigoServico = $request->codigo[$i];
                $faturaitens->preco = $request->preco[$i];
                $faturaitens->designacao = $request->descricao[$i];
                $faturaitens->descontoIva =  $request->iva[$i];
                $faturaitens->quantidade =  $request->quantidade[$i];
                $faturaitens->flag = 1;
                $faturaitens->save();
            }
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao tentar salvar itens da Fatura.');
        }

        return $this->ImprimirFatura($numero_faura, 1);
        //  echo "<script>window.open('".rota."', '_blank')</script>";
    }

    public function UltimaFactura()
    {
        $ultima = fatura::getUltimaFactura();
        return $ultima;
    }

    public function getCliente($codigo)
    {
        $cliente = pessoa::ClienteEspecifico($codigo);
        return $cliente;
    }


    public function GetFactura($request)
    {

        try {
            $fatura = new fatura();
            $fatura->nomeCliente = $this->getCliente($request->codigoCliente)->nome;
            $fatura->codigoCliente = $request->codigoCliente;
            $fatura->nextTotal =  $request->grossTotal;
            $fatura->descontoIva = $request->descontoIva;
            $fatura->grossTotal = $request->grossTotal;
            $fatura->descontoFactura = $request->descontoFactura;
            $fatura->estadoFactura = 'N';
            $fatura->dataFactura = date('Ymd H:i:s', strtotime('now'));
            $fatura->save();
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao tentar faturar.');
        }
    }


    public function ImprimirFatura($codigoFactura, $codigoVersao)
    {


        $factura = fatura::getDadosFactura($codigoFactura);
        // dd($factura);
        $codigoCliente = $factura[0]->codigoCliente;
        $dadosFactura = empresa::all();
        //       dd($dadosFactura);
        $cliente = pessoa::ClienteEspecifico($codigoCliente);
        //   dd($cliente);~
        if ($codigoVersao == 1) {

            $versao = "Orignal";
        } else {
            $versao = "2ª Via em conformidade com a original";
        }

        return PDF::loadView('relatorio.Invoice', compact('dadosFactura', 'versao', 'cliente', 'factura'))->setPaper('A4', 'portrait')->stream('Fatura.pdf');
    }

     /** ------------------  Buscar factura por intervalo de datas. */
    public function getBuscaporData(Request $request)
    {
        $codigo = $request->input('id');
     
        $dataInicial = $request->input('dataInicio');
        $dataFinal = $request->input('dataFim');
        $factura  = fatura::getBuscaporData($dataInicial, $dataFinal);
     
        if ($codigo == 1) {
            
            return view('faturacao.listaFactura', compact('factura'));
        } else {

            return view('faturacao.listaFactura1', compact('factura'));
        }

        return 0;
    }


    /*--------------------------- Prestador ---------------------* */

    public function listaFactura1()
    {

        $factura = fatura::getFaturacaoAtual();
        return view('faturacao.listaFactura1', compact('factura'));
    }

    public function getMovimento1()
    {

        $prestador = prestador::all();
        return view('faturacao.movimento1', compact('prestador'));
    }

    public function resumoMensal(Request $request)
    {

        $dataInicial = $request->input('dataInicio');
        $dataFinal = $request->input('dataFim');
        $factura  = fatura::getBuscaResumoMensal($dataInicial, $dataFinal);
        dd($factura);
    }
}
