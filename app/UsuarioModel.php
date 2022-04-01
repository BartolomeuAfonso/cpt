<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsuarioModel extends Model
{

    protected $table = "usuario";
    protected $fillable = ['id', 'username', 'senha', 'telefone', 'tipoUtilizador', 'nome'];
}
