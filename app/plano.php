<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class plano extends Model
{
    protected $table = "plano";
    protected $fillable = ['id', 'designacao', 'saldo', 'codigoStatus'];
}
