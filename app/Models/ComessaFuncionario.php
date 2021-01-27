<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComessaFuncionario extends Model
{
    //
    protected $fillable = [
        'id', 'comessa_id', 'funcionario_id',
    ];
    
}
