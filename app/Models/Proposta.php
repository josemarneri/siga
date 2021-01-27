<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{
    //
    protected $fillable = [
        'id','orcamento_id','tarifa','n_horas', 'data_envio','data_resposta','obs', 'status',
    ];

}
