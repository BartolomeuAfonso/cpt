<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pessoa extends Model
{
    protected $table = "pessoa";
    protected $fillable = ['id', 'nome', 'dataNasc', 'pai', 'mae', 'nBi', 'genero', 'estadocivil', 'habilitacoes', 'codigoFuncao', 'codigoStaff', 'codigoStatus', 'matricula', 'nDependente', 'naturalidade', 'endereco', 'contacto', 'email', 'data_ingresso', 'foto', 'data_venc_seguro', 'data_venc_licenca', 'nome_proprietario', 'telefone_proprietario', 'email_proprietario', 'biprovincia', 'codigoAssociacao'];


    public static function getDadosCliente()
    {
        $pessoa = DB::table('pessoa')
            ->join('staff', 'pessoa.codigoStaff', '=', 'staff.id')
            ->join('municipios', 'pessoa.bimunicipio', '=', 'municipios.id')
            ->select('pessoa.id as id', 'pessoa.nome as nome', 'pessoa.nBi as nBi', 'staff.designacao as staff', 'pessoa.contacto as telefone', 'municipios.designacao as distrito')
            ->paginate(10);


        return $pessoa;
    }


    public static  function ClienteEspecifico($codigo)
    {

        $pessoa = DB::table('pessoa')
            ->where('id', '=', $codigo)
            ->first();

        return $pessoa;
    }
    public static function porBI($codigo)
    {

        $pessoa = DB::table('pessoa')
            ->where('nBi', '=', $codigo)
            ->first();

        return $pessoa;
    }

    public static function getDadosClienteporId($codigo)
    {
        $pessoa = DB::table('pessoa')
            ->join('associacao', 'pessoa.codigoAssociacao', '=', 'associacao.id')
            ->join('staff', 'pessoa.codigoStaff', '=', 'staff.id')
            ->join('funcao', 'pessoa.codigoFuncao', '=', 'funcao.id')
            ->join('provincias', 'pessoa.biprovincia', '=', 'provincias.id')
            ->join('municipios', 'pessoa.bimunicipio', '=', 'municipios.id')
            ->where('pessoa.nBi', '=', $codigo)
            ->select('pessoa.id as id', 'pessoa.nome as nome',  'pessoa.dataNasc as dataNasc', 'staff.designacao as staff', 'pessoa.contacto as telefone', 'pessoa.endereco as endereco', 'funcao.designacao as funcao', 'associacao.designacao as associacao', 'pessoa.matricula as matricula', 'pessoa.pai as pai', 'pessoa.mae as mae', 'pessoa.naturalidade as naturalidade', 'pessoa.genero as genero', 'pessoa.nBi as nBi', 'pessoa.estadocivil as estadocivil',  'pessoa.nDependente as nDependente')
            ->first();


        return $pessoa;
    }


    public function getBuscaQuota($codigo)
    {

        $pessoa = DB::table('pessoa')
            ->join('quota', 'pessoa.id', '=', 'quota.id_pessoa')
            ->where('pessoa.nBi', '=', $codigo)
            ->where('quota.data', 'like', '%' . date("Y-m") . '%')
            ->select('pessoa.id as id', 'pessoa.nome as nome', 'pessoa.nBi as nBi', 'quota.valorvalido as valorvalido')
            ->get();

        return $pessoa;
    }


    public function getNaoPagoQuota($codigo)
    {
        $pessoa = DB::table('pessoa')
            ->where('pessoa.nBi', '=', $codigo)
            ->select('pessoa.id as id', 'pessoa.nome as nome', 'pessoa.nBi as nBi')
            ->get();

        return $pessoa;
    }

    public function getSoma($codigo)
    {
        $lista = $this->getBuscaQuota($codigo);
        $quantidade = count($lista);
        $cont = 0;

        if ($quantidade == 0) {
            $lista = $this->getNaoPagoQuota($codigo);
            $cont = 0;
            return $lista[0]->nome . '*del*' . $cont;
        } else {
            for ($i = 0; $i < count($lista); $i++) {

                $cont = $cont + $lista[$i]->valorvalido;
            }

            return $lista[0]->nome . '*del*' . $cont;
        }
        return '';
    }

    public function getSomaPoupanca($codigo)
    {
        $lista = $this->getBuscaQuota($codigo);

        $cont = 0;
        for ($i = 0; $i < count($lista); $i++) {

            $cont = $cont + $lista[$i]->valorvalido;
        }
        return $cont;
    }

    public function getBuscaQuotaporData($codigo, $dataInicio, $dataFinal)
    {

        $pessoa = DB::table('pessoa')
            ->join('quota', 'pessoa.id', '=', 'quota.id_pessoa')
            ->where('pessoa.nBi', '=', $codigo)
            ->whereDate('quota.created_at', '=', $dataInicio)
            ->select('pessoa.id as id', 'pessoa.nome as nome', 'pessoa.nBi as nBi', 'quota.valorvalido as valorvalido')
            ->get();

        return $pessoa;
    }

    public function getSomaPoupancaporData($codigo, $dataInicio, $dataFinal)
    {
        $lista = $this->getBuscaQuotaporData($codigo, $dataInicio, $dataFinal);

        $cont = 0;
        for ($i = 0; $i < count($lista); $i++) {

            $cont = $cont + $lista[$i]->valorvalido;
        }
        return $cont;
    }


   

}
