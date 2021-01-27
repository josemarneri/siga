<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    //
    protected $fillable = [
        'id','checklist_id','descricao' ];
    
}
