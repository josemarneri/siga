<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = [
        'id','nome', 'cnpj','endereco','telefone', 'email','sigla',
    ];
}
