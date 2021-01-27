<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();

        if (count($permission->all())<1){
            $permissions[] = ['id'=>null, 'name'=>'list-user', 'label'=>'Listar usuários'];
            $permissions[] = ['id'=>null, 'name'=>'create-user', 'label'=>'Criar usuários'];
            $permissions[] = ['id'=>null, 'name'=>'delete-user', 'label'=>'Apagar usuários'];
            $permissions[] = ['id'=>null, 'name'=>'update-user', 'label'=>'Atualizar usuários'];
            $permissions[] = ['id'=>null, 'name'=>'save-user', 'label'=>'Salvar usuários'];
            $permissions[] = ['id'=>null, 'name'=>'list-funcionario', 'label'=>'Listar funcionário'];
            $permissions[] = ['id'=>null, 'name'=>'create-funcionario', 'label'=>'Criar funcionário'];
            $permissions[] = ['id'=>null, 'name'=>'delete-funcionario', 'label'=>'Apagar funcionário'];
            $permissions[] = ['id'=>null, 'name'=>'update-funcionario', 'label'=>'Atualizar funcionário'];
            $permissions[] = ['id'=>null, 'name'=>'save-funcionario', 'label'=>'Salvar funcionário'];
            $permissions[] = ['id'=>null, 'name'=>'list-cargo', 'label'=>'Listar cargos'];
            $permissions[] = ['id'=>null, 'name'=>'change-cargo', 'label'=>'atualizar cargos'];
            $permissions[] = ['id'=>null, 'name'=>'list-funcao', 'label'=>'Listar funções'];
            $permissions[] = ['id'=>null, 'name'=>'change-funcao', 'label'=>'atualizar funções'];
            $permissions[] = ['id'=>null, 'name'=>'list-cliente', 'label'=>'Listar clientes'];
            $permissions[] = ['id'=>null, 'name'=>'change-cliente', 'label'=>'atualizar clientes'];
            $permissions[] = ['id'=>null, 'name'=>'list-comessa', 'label'=>'Listar comessas'];
            $permissions[] = ['id'=>null, 'name'=>'change-comessa', 'label'=>'atualizar comessas'];
            $permissions[] = ['id'=>null, 'name'=>'list-orcamento', 'label'=>'Listar orçamentos'];
            $permissions[] = ['id'=>null, 'name'=>'change-orcamento', 'label'=>'atualizar orçamentos'];
            $permissions[] = ['id'=>null, 'name'=>'list-proposta', 'label'=>'Listar propostas'];
            $permissions[] = ['id'=>null, 'name'=>'change-proposta', 'label'=>'atualizar propostas'];
            $permissions[] = ['id'=>null, 'name'=>'ver-proposta', 'label'=>'visualizar proposta'];
            $permissions[] = ['id'=>null, 'name'=>'list-anexo', 'label'=>'Listar anexos'];
            $permissions[] = ['id'=>null, 'name'=>'change-anexo', 'label'=>'Atualizar anexos'];
            $permissions[] = ['id'=>null, 'name'=>'list-post', 'label'=>'Listar posts'];
            $permissions[] = ['id'=>null, 'name'=>'change-post', 'label'=>'Atualizar posts'];
            $permissions[] = ['id'=>null, 'name'=>'delete-post', 'label'=>'Apagar posts'];           
            $permissions[] = ['id'=>null, 'name'=>'list-file', 'label'=>'Lista arquivos'];            
            $permissions[] = ['id'=>null, 'name'=>'import-file', 'label'=>'Importar arquivos'];
            $permissions[] = ['id'=>null, 'name'=>'delete-file', 'label'=>'Apagar arquivos'];
            $permissions[] = ['id'=>null, 'name'=>'list-carga', 'label'=>'Listar carga de trabalho'];
            $permissions[] = ['id'=>null, 'name'=>'create-carga', 'label'=>'Adcionar funcionário à carga de trabalho'];
            $permissions[] = ['id'=>null, 'name'=>'delete-carga', 'label'=>'Apagar funcionário da carga de trabalho'];
            $permissions[] = ['id'=>null, 'name'=>'update-carga', 'label'=>'Atualizar carga de trabalho'];
            $permissions[] = ['id'=>null, 'name'=>'save-carga', 'label'=>'Salvar carga de trabalho'];
            $permissions[] = ['id'=>null, 'name'=>'list-permission', 'label'=>'Listar permissões'];
            $permissions[] = ['id'=>null, 'name'=>'change-permission', 'label'=>'Atualizar permissões'];
            $permissions[] = ['id'=>null, 'name'=>'delete-permission', 'label'=>'Apagar permissões']; 
            $permissions[] = ['id'=>null, 'name'=>'list-perfil', 'label'=>'Listar perfil'];
            $permissions[] = ['id'=>null, 'name'=>'change-perfil', 'label'=>'Atualizar perfil'];
            $permissions[] = ['id'=>null, 'name'=>'delete-perfil', 'label'=>'Apagar perfil'];
            $permissions[] = ['id'=>null, 'name'=>'menu-engenharia', 'label'=>'Acessar o menu engenharia']; 
            $permissions[] = ['id'=>null, 'name'=>'menu-financeiro', 'label'=>'Acessar o menu financeiro']; 
            $permissions[] = ['id'=>null, 'name'=>'menu-controle', 'label'=>'Acessar o menu controle']; 
            $permissions[] = ['id'=>null, 'name'=>'menu-relatorios', 'label'=>'Acessar o menu relatorios']; 
            $permissions[] = ['id'=>null, 'name'=>'menu-rh', 'label'=>'Acessar o menu rh']; 
            $permissions[] = ['id'=>null, 'name'=>'menu-rh', 'label'=>'Acessar o menu gestão-rh']; 
            $permissions[] = ['id'=>null, 'name'=>'menu-comercial', 'label'=>'Acessar o menu comercial']; 
            $permissions[] = ['id'=>null, 'name'=>'menu-sistema', 'label'=>'Acessar o menu sistema']; 
            
            foreach ($permissions as $p){
                $permission->create($p);
            }
        }
    }
}
