<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class quota extends Model
{
    protected $table = "quota";
    protected $fillable = ['id', 'id_pessoa', 'numDias', 'valorvalido', 'tipo', 'data', 'updated_at', 'created_at'];



    public static function getUltimaQuota()
    {
        return quota::select('*')->latest('id')->first();
    }


    public static function getComprovativo($codigo)
    {
        $quota = DB::table('quota')
            ->join('pessoa', 'pessoa.id', '=', 'quota.id_pessoa')
            ->where('quota.id', '=', $codigo)
            ->select('pessoa.id as id', 'pessoa.nome as nome', 'pessoa.nBi as nBi', 'quota.valorvalido as valorvalido', 'quota.data as dataInserida')
            ->first();
        return $quota;
    }

    public static function geListaPoupanca()
    {
        $quota = DB::table('quota')
            ->join('pessoa', 'pessoa.id', '=', 'quota.id_pessoa')
            ->whereDate('quota.created_at', '=', date("Y-m-d"))
            ->select('quota.id as id', 'pessoa.nome as nome', 'pessoa.nBi as nBi', 'quota.valorvalido as valorvalido', 'quota.data as dataInserida')
            ->paginate(10);
        return $quota;
    }


    public static function getComprovativoData($codigo, $dataInicio, $dataFinal)
    {
        $quota = DB::table('quota')
            ->join('pessoa', 'pessoa.id', '=', 'quota.id_pessoa')
            ->where('pessoa.nBi', '=', $codigo)
            ->whereDate('quota.created_at', '=', $dataInicio)
            ->select('pessoa.id as id', 'pessoa.nome as nome', 'pessoa.nBi as nBi', 'quota.valorvalido as valorvalido', 'quota.data as dataInserida')
            ->first();
        return $quota;
    }


    public static function getBuscaQuotaporMensal($codigo, $dataInicio, $dataFinal)
    {

        $pessoa = DB::table('pessoa')
            ->join('quota', 'pessoa.id', '=', 'quota.id_pessoa') 
            ->whereBetween(DB::raw('DATE(quota.created_at)'), [$dataInicio, $dataFinal])
            ->where('pessoa.nBi', '=', $codigo)
            ->select('pessoa.id as id', 'pessoa.nome as nome', 'pessoa.endereco as endereco', 'pessoa.nBi as nBi', 'quota.valorvalido as valorvalido', 'quota.data as data', 'quota.tipo as tipo')
            ->get();

        return $pessoa;
    }

  
}
