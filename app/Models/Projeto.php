<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = [
        'id','codigo', 'alias', 'descricao','observacoes', 'comessa_id'
    ];
    
    
    
}
