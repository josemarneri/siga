<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Funcao;

class Funcionario extends Model
{
    //
    protected $fillable = [
        'id','nome','endereco','telefone', 'email','cargo_id', 'funcao_id' , 'user_id', 'ativo',
    ];
    
    public function User(){
        return $this->belongsTo(\App\User::class);
    }
    
    public function getFuncionarioByUserId($id) {
        $funcionario = Funcionario::where('user_id', '=', $id)->get()->first();
        return $funcionario;
    }
    
    public function getComessas(){        
        $funcionarios = DB::table('funcionarios')
                ->join('comessa_funcionarios','comessa_funcionarios.funcionario_id','=', 'funcionarios.id')
                ->where('comessa_funcionarios.comessa_id', '=', $this->id )
                ->select('funcionarios.*')
                ->get();
        return $funcionarios;
    }
    
    public function getUserName($idfuncionario){
        $user = User::find($idfuncionario)->name;
        if ($user === "Nulo"){
            return "";
        }else {
            return $user;
        }
    }
    
    public function getByFuncao($funcao){
        $func = new Funcao();
        $func = $func->getByNome($funcao);
        $id = $func->id;
        $funcionarios = Funcionario::where('funcao_id','=',$id)->get();
        return $funcionarios;
    }
    
    public function getUserLogin($idfuncionario){
        $user = User::find($idfuncionario)->login;
        if ($user === "Nulo"){
            return "";
        }else {
            return $user;
        }
    }
}
