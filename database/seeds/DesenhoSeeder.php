<?php

use Illuminate\Database\Seeder;
use App\Models\Desenho;

class DesenhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desenho = new Desenho();
        
        if (count($desenho->all())<1){
            $desenhos[] = ['id'=>null, 'pai'=>null, 'descricao'=> 'Complessivo Escotilha','material'=> 'Plástico',
                'peso'=> '30','tratamento'=> 'Pintura' ];
            echo 'Desenho criado';
            $desenhos[] = ['id'=>null,'numero'=>$desenho->gerarNumero(), 'alias'=> $desenho->gerarNumero(),'pai'=>null,
                'descricao'=> 'Mecanismo Fixo de Abertura da Escotilha','material'=> 'Aço','peso'=> '3','tratamento'=> 'Pintura',
                ];
            echo 'Desenho criado';
            $desenhos[] = ['id'=>null,'numero'=>$desenho->gerarNumero(), 'alias'=> $desenho->gerarNumero(),'pai'=>null,
                'descricao'=> 'Disco do Mecanismo','material'=> 'Plástico','peso'=> '0.2','tratamento'=> 'Pintura',
                ];
            echo 'Desenho criado';
            
            foreach($desenhos as $c){
                $numero = $desenho->gerarNumero();
                $c['numero'] = $numero;
                $c['alias'] = $numero;
                $desenho->create($c);
            }
        }
    }
}
