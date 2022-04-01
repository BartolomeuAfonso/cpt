<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StaffModel extends Model
{

    protected $table = "staff";

    protected $fillable = ['id', 'designacao', 'endereco', 'telefone', 'responsavel', 'codigoStatus', 'codigoAssociacao'];


    public static function getContador()
    {
        return StaffModel::select('*')->latest('numerador')->first();
    }


    public static function getStaffEspecifico($codigoCliente)
    {
        $staff = DB::table('staff')
            ->where('id', '=', $codigoCliente)
            ->first();

        return $staff;
    }

    public static function getNomeStaff($nome)
    {
        $staff = DB::table('staff')
            ->where('designacao', '=', $nome)
            ->first();

        return $staff;
    }

    public static function getAssociacaoByStaff($codigoProvincia)
    {
        $staff = DB::table('staff')
            ->where('staff.codigoAssociacao', '=', $codigoProvincia)
            ->get();

        return $staff;
    }
    public static function getDadosStaff()
    {
        $staff = DB::table('staff')
            ->join('associacao', 'staff.codigoAssociacao', '=', 'associacao.id')
            ->select('staff.id as id', 'staff.designacao as designacao', 'staff.designacao as staff', 'staff.telefone as telefone', 'staff.endereco as endereco', 'staff.responsavel as responsavel', 'associacao.designacao as associacao')
            ->paginate(8);


        return $staff;
    }
}
