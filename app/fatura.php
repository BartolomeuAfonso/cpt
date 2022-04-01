<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class fatura extends Model
{
    protected $table = "factura";
    protected $fillable =  ['id', 'dataFactura', 'grossTotal', 'nextTotal', 'descontoFactura', 'descontoIva', 'hash', 'estadoFactura', 'nRef', 'codigoCliente', 'nomeCliente', 'created_at', 'updated_at'];

    public static function getUltimaFactura()
    {

        return fatura::select('*')->latest('id')->first();
    }

    public static function getDadosFactura($codigo)
    {
        $fatura = DB::table('factura')
            ->join('factura_itens', 'factura_itens.codigoFactura', '=', 'factura.id')
            ->where('factura.id', '=', $codigo)
            ->get();

        return $fatura;
    }

    public static function getFaturacaoAtual()
    {

        $fatura = DB::table('factura')
            ->whereDate('created_at', '=', date("Y-m-d"))
            ->paginate(10);

        return $fatura;
    }

    public static function getBuscaporData($dataInicial, $dataFinal)
    {
        $fatura = DB::table('factura')
            ->whereDate('created_at', '>=', $dataInicial)
            ->whereDate('created_at', '<=', $dataFinal)
            ->paginate(20);

        return $fatura;
    }


    public static function getBuscaResumoMensal($dataInicial, $dataFinal)
    {
        $fatura = DB::table('factura')
            ->whereDate('created_at', '>=', $dataInicial)
            ->whereDate('created_at', '<=', $dataFinal)
            ->distinct('factura.id as id', 'factura.nomeCliente as nome', 'factura.grossTotal as grossTotal' )
            ->paginate(20);

        return $fatura;
    }



}
