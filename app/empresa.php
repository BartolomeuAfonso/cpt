<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    
    protected $table = "empresa";
    protected $fillable =  ['id','nome','contacto','endereco', 'nif','email','cidade','web'];
}
