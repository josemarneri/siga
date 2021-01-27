<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespostaChecklist extends Model
{
    //
    protected $fillable = [
        'id','atividade_id','pergunta_id','resposta' ];

}
