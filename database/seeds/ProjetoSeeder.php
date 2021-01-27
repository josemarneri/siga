<?php

use Illuminate\Database\Seeder;

class ProjetoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $projetos = new Projeto();
        if (count($projetos->all())<1){
            $projetos[] = ['id'=> null, 'codigo'=>'NSD_001', 'alias'=>null, 
                'descricao'=> 'Teste de sistema', 'observacoes'=> 'teste',
                'comessa_id'=> null];

            
            foreach($projetos as $p){
                $projetos->create($p);
            }
        }
    }
}

