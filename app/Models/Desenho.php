<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Desenho extends Model
{
    //
    protected $fillable = [
        'id','numero','pai', 'alias', 'descricao','material','peso','tratamento','observacoes', 'projeto_id', 'user_id'
    ];
    
    function getFillable() {
        return $this->fillable;
    }

    function setFillable($fillable) {
        $this->fillable = $fillable;
    }
    
    public function getDesenhos($filtro) {
        //$numero = empty($filtro['numero'])?'*':$filtro['numero'];
        $desenhos = DB::table('desenhos')
                    ->where([
                        ['numero', '=', empty($filtro['numero'])?'*':$filtro['numero']],               
                    ])->get();

        return $desenhos;
    }
    public function Filtrar($filtro){
        
        $desenhos = DB::table('desenhos');

        $resultado;
        if(!empty($filtro['filtronumero'])){
            $desenhos->where('numero','=',$filtro['filtronumero']);
        }
        if(!empty($filtro['filtropai'])){
            $desenhos->where('pai','=',$filtro['filtropai']);
        }
        if(!empty($filtro['filtroalias'])){
            $desenhos->where('alias','=',$filtro['filtroalias']);
        }
        if(!empty($filtro['filtrodescricao'])){
            $desenhos->where('descricao','like','%'.$filtro['filtrodescricao'].'%');
        }
        if(!empty($filtro['filtromaterial'])){
            $desenhos->where('material','like','%'.$filtro['filtromaterial'].'%');
        }
        
        if(!empty($filtro['maxresult'])){
            $desenhos->take($filtro['maxresult']);             
        }
        if(empty($filtro['filtroordem'])){
            $desenhos->inRandomOrder();
        }else{
            foreach($filtro['filtroordem'] as $key=>$valor){
                $desenhos->orderBy($key,$valor);
            }            
        } 
        
        $desenhos = $desenhos->get()->all(); 
        foreach($desenhos as $d){
           $resultado[$d->id]=$this->find($d->id); 
           
        }
        return (empty($resultado))? null : $resultado;
        //return $resultado;
        
    }
    
    public function gerarNumero(){
        
        $data = date('ymd');
        $lista = DB::table('desenhos')
                ->where('numero', '>',  $data)
                ->orderBy('numero', 'desc')
                ->get();
        if (count($lista)<1){
            $numero = $data . '000';
            //echo $numero + '/n';
            return $numero;
        }
        $numero = $lista[0]->numero; 
        echo $numero +1;
        return $numero + 1;
        
    }
    
    public function pegarData(){
        $data = date('ymd');
        dd($data);
        return $data;
    }
    
    public function getAnexos($id){
        $arquivo = new Arquivo();
        $anexos = $arquivo->ListarDeById('desenhos', $id);
        return $anexos;
    }


    
   
}
