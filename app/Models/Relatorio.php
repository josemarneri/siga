<?php

namespace App\Models;

//use PHPExcel; 
use phpspreedsheet;
use PHPExcel_IOFactory;
use App\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    //
    function __construct() {
        
    }
    
    public function existFile($filename){
        //dd($filename);
        if (!file_exists($filename)) {
                exit("Arquivo não encontrado");
                return null;
        }else{
            
            $objPHPExcel = PHPExcel_IOFactory::load($filename);
            dd('aqui');
            $ci = $objPHPExcel->getActiveSheet()->calculateWorksheetDataDimension();
            $campos = $objPHPExcel->getActiveSheet()->rangeToArray($ci);
            return $campos;
        }
    }
    
    public function ReadExcel($filename){
        //dd($filename);
        $campos = $this->existFile($filename);
        dd('aqui');
        $nlines = count($campos);
        dd(aqui1);
        for ($i=0; $i<$nlines; $i++){
            
        }
        
     return $campos;   
    }

    
}
