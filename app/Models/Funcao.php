<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    //
    protected $table = 'funcoes';
    
    protected $fillable = [ 
        'id','nome',
    ];
    
    public function getByNome($nome){
        $funcao = new Funcao();
        $funcao = Funcao::where('nome','=',$nome)->get()->first();
        return $funcao;
    }
}
