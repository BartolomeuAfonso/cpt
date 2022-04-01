<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class associacao extends Model
{
    protected $table = "associacao";

    protected $fillable = ['id', 'designacao', 'endereco', 'telefone', 'responsavel', 'codigoStatus', 'updated_at', 'created_at'];


}
