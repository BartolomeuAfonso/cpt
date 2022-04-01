<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class funcao extends Model
{
    protected $table = "funcao";
    protected $fillable = ['id', 'designacao', 'saldo', 'codigoStatus'];
}
