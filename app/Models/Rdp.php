<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rdp extends Model
{
    //
    protected $fillable = [
        'funcionario_id','data','entr1','entr2', 'sai1', 'sai2', 
    ];
    
    
    public function Funcionario(){
        return $this->belongsTo(App\Models\Funcionario::class);
    }
}
