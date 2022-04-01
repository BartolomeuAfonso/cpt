<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prestador extends Model
{
    

    protected $table = "prestador";
    protected $fillable = ['id', 'nome', 'telefone', 'nif', 'responsavel', 'codigoPlano', 'codigoStatus'];

}
