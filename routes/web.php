<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'painel'], function(){
    //PainelController
    Route::get('/', 'Painel\PainelController@index');
    
    //UserController
    Route::get('usuarios','Painel\UserController@index');
    Route::get('usuarios/novo', 'Painel\UserController@Novo');
    Route::post('usuarios/salvar', 'Painel\UserController@Salvar');
    Route::get('usuarios/ativar/{id}', 'Painel\UserController@AtivarDesativar');
    Route::post('usuarios/salvarnovasenha', 'Painel\UserController@SalvarNovaSenha');
    Route::get('usuarios/atualizar/{id}', 'Painel\UserController@Atualizar');
    Route::get('usuarios/apagar/{id}', 'Painel\UserController@Apagar');
    Route::get('usuarios/alterarsenha/{id}', 'Painel\UserController@AlterarSenha');
    
    
    //ClienteController
    Route::get('clientes',['as'=>'clientes', 'uses'=>'Painel\ClienteController@index']);
    Route::get('clientes/novo', 'Painel\ClienteController@Novo');
    Route::post('clientes/salvar', 'Painel\ClienteController@Salvar');
    Route::get('clientes/atualizar/{id}', 'Painel\ClienteController@Atualizar');
    Route::get('clientes/apagar/{id}', 'Painel\ClienteController@Apagar');
    
    //RoleController
    Route::get('perfis',['as'=>'perfis', 'uses'=>'Painel\RoleController@index']);
    Route::get('perfis/novo', 'Painel\RoleController@Novo');
    Route::post('perfis/salvar', 'Painel\RoleController@Salvar');
    Route::get('perfis/atualizar/{id}', 'Painel\RoleController@Atualizar');
    Route::get('perfis/apagar/{id}', 'Painel\RoleController@Apagar');
    Route::get('perfis/addusuarioperfil/{id}', 'Painel\RoleController@addUsuario');
    Route::post('perfis/salvarperfiladd', 'Painel\RoleController@SalvarPerfilAdd');

    
    //PermissionController
    Route::get('permissoes',['as'=>'permissoes', 'uses'=>'Painel\PermissionController@index']);
    Route::get('permissoes/novo', 'Painel\PermissionController@Novo');
    Route::post('permissoes/salvar', 'Painel\PermissionController@Salvar');
    Route::get('permissoes/atualizar/{id}', 'Painel\PermissionController@Atualizar');
    Route::get('permissoes/apagar/{id}', 'Painel\PermissionController@Apagar');
    
    //ComessaController
    Route::get('comessas',['as'=>'comessas', 'uses'=> 'Painel\ComessaController@index']);
    Route::get('comessas/novo/{orcamento_id?}', 'Painel\ComessaController@Novo');
    Route::post('comessas/salvar', 'Painel\ComessaController@Salvar');
    Route::get('comessas/atualizar/{id}', 'Painel\ComessaController@Atualizar');
    Route::get('comessas/apagar/{id}', 'Painel\ComessaController@Apagar');
    Route::get('comessas/ativardesativar/{id}', 'Painel\ComessaController@AtivarDesativar');
    Route::get('comessas/equipe/{id}', 'Painel\CargaController@NovaEquipe');
    
    //AtividadeController
    Route::get('atividades',['as'=>'atividades', 'uses'=> 'Painel\AtividadeController@index']);
    Route::get('atividades/novo/{comessa_id?}', 'Painel\AtividadeController@Novo');
    Route::post('atividades/salvar', 'Painel\AtividadeController@Salvar');
    Route::get('atividades/atualizar/{id}', 'Painel\AtividadeController@Atualizar');
    Route::get('atividades/apagar/{id}', 'Painel\AtividadeController@Apagar');
    Route::get('atividades/iniciar/{id}', 'Painel\AtividadeController@Iniciar');
    Route::get('atividades/concluir/{id}', 'Painel\AtividadeController@Concluir');
    Route::get('atividades/avaliar/{id}', 'Painel\AtividadeController@Avaliar');
    Route::get('atividades/addnota/{id}', 'Painel\AtividadeController@addNota');
    Route::get('atividades/funcionarioshabilitados/{id}', 'Painel\AtividadeController@getFuncionarios');
    //Route::post('atividades/selectfuncionarios', 'Painel\AtividadeController@getFuncionarios');
    
    //ChecklistController
    Route::get('checklists',['as'=>'checklists', 'uses'=> 'Painel\ChecklistController@index']);
    Route::get('checklists/novo', 'Painel\ChecklistController@Novo');
    Route::post('checklists/salvar', 'Painel\ChecklistController@Salvar');
    Route::get('checklists/atualizar/{id}', 'Painel\ChecklistController@Atualizar');
    Route::get('checklists/apagar/{id}', 'Painel\ChecklistController@Apagar');
    Route::get('checklists/apagarpergunta/{id}', 'Painel\ChecklistController@ApagarPergunta');
    
    //DiariosdebordoController
    Route::get('diariosdebordo',['as'=>'diariosdebordo', 'uses'=> 'Painel\DiariosdebordoController@index']);
    Route::get('diariosdebordo/novo', 'Painel\DiariosdebordoController@Novo');
    Route::post('diariosdebordo/salvar', 'Painel\DiariosdebordoController@Salvar');
    Route::get('diariosdebordo/atualizar/{id}', 'Painel\DiariosdebordoController@Atualizar');
    Route::get('diariosdebordo/apagar/{id}', 'Painel\DiariosdebordoController@Apagar');
    Route::get('diariosdebordo/atividades/{id}', 'Painel\DiariosdebordoController@getAtividades');
    Route::get('diariosdebordo/horaspendentes/{data}', 'Painel\DiariosdebordoController@getHorasPendentes');
    
    //CargaController
    Route::get('cargas',['as'=>'cargas', 'uses'=> 'Painel\CargaController@index']);
    Route::get('cargas/novo', 'Painel\CargaController@Novo');
    Route::post('cargas/salvar', 'Painel\CargaController@Salvar');
    Route::get('cargas/atualizar/{id}', 'Painel\CargaController@Atualizar');
    Route::get('cargas/apagar/{id}', 'Painel\CargaController@Apagar');
    Route::get('cargas/livre/{id}', 'Painel\CargaController@Livre');
    Route::post('equipe/salvar', 'Painel\CargaController@SalvarEquipe');
    
    
    //OrcamentoController
    Route::get('orcamentos',['as' => 'orcamentos', 'uses'=>'Painel\OrcamentoController@index']);
    Route::get('orcamentos/novo', 'Painel\OrcamentoController@Novo');
    Route::post('orcamentos/salvar', 'Painel\OrcamentoController@Salvar');
    Route::get('orcamentos/atualizar/{id}', 'Painel\OrcamentoController@Atualizar');
    Route::get('orcamentos/apagar/{id}', 'Painel\OrcamentoController@Apagar');
    Route::get('orcamentos/verproposta/{id}', 'Painel\OrcamentoController@VerProposta');
    Route::get('orcamentos/atualizarproposta/{id}', 'Painel\OrcamentoController@AtualizarProposta');
    Route::get('orcamentos/novaproposta/{id}', 'Painel\OrcamentoController@NovaProposta');
    Route::post('orcamentos/salvarproposta', 'Painel\OrcamentoController@SalvarProposta');
    
    
    //FuncionarioController
    Route::get('funcionarios','Painel\FuncionarioController@index');
    Route::get('funcionarios/novo', 'Painel\FuncionarioController@Novo');
    Route::get('funcionarios/ativar/{id}', 'Painel\FuncionarioController@AtivarDesativar');
    Route::post('funcionarios/salvar', 'Painel\FuncionarioController@Salvar');
    Route::get('funcionarios/atualizar/{id}', 'Painel\FuncionarioController@Atualizar');
    Route::get('funcionarios/apagar/{id}', 'Painel\FuncionarioController@Apagar');
    Route::get('funcionarios/alterardadospessoais/{id}', 'Painel\FuncionarioController@AlterarDadosPessoais');
    Route::post('funcionarios/salvardadospessoais', 'Painel\FuncionarioController@SalvarDadosPessoais');
    
    //PostControler
    Route::get('posts', 'Painel\PostController@index');
    
    //RoleController
    Route::get('role', 'Painel\RoleController@index');
    
    //PermissionController
    Route::get('permission', 'Painel\PermissionController@index');
    
});
//ArquivoController
Route::group(['prefix' => 'arquivos'], function(){    
    Route::get('arquivos',['as' => 'arquivos' ,'uses'=>'Util\ArquivoController@index']);
    Route::get('/','Util\ArquivoController@index');
    Route::post('carregar', 'Util\ArquivoController@Carregar');
    Route::get('anexar/{anexode}/{from_id?}', 'Util\ArquivoController@ListarAnexos');
    Route::post('anexar', 'Util\ArquivoController@Anexar');
    Route::get('baixar/{id}', 'Util\ArquivoController@Baixar');
    Route::get('apagar/{id}', 'Util\ArquivoController@Apagar');   
});

//ArquivoController
Route::group(['prefix' => 'plm'], function(){    
Route::get('desenhos',['as' => 'desenhos', 'uses'=>'Plm\DesenhoController@index']);
    Route::get('desenhos/novo', 'Plm\DesenhoController@Novo');
    Route::post('desenhos/salvar', 'Plm\DesenhoController@Salvar');
    Route::post('desenhos/filtrar', 'Plm\DesenhoController@Filtrar');
    Route::get('desenhos/atualizar/{id}', 'Plm\DesenhoController@Atualizar');
    Route::get('desenhos/apagar/{id}', 'Plm\DesenhoController@Apagar');  
    Route::get('desenhos/novo/importarplanilha', 'Plm\DesenhoController@ImportarPlanilha');  
    Route::post('desenhos/novo/lerplanilha', 'Plm\DesenhoController@ReadPlanilha');  
  
    
Route::get('projetos',['as' => 'projetos', 'uses'=>'Plm\ProjetoController@index']);
    Route::get('projetos/novo', 'Plm\ProjetoController@Novo');
    Route::post('projetos/salvar', 'Plm\ProjetoController@Salvar');
    Route::post('projetos/filtrar', 'Plm\ProjetoController@Filtrar');
    Route::get('projetos/atualizar/{id}', 'Plm\ProjetoController@Atualizar');
    Route::get('projetos/apagar/{id}', 'Plm\ProjetoController@Apagar');  
});

//UtilController
Route::group(['prefix' => 'util'], function(){    
    Route::get('/','Util\UtilController@index'); 
    Route::post('importarfuncionariosdoexcel', 'Util\UtilController@CreateFuncionarioFromExcel');
    Route::post('importarusuariosdoexcel', 'Util\UtilController@CreateUserFromExcel');
});

//RdpController
Route::group(['prefix' => 'rdp'], function(){    
    Route::get('/','Painel\RdpController@index');
    Route::post('exceltodb', 'Painel\RdpController@ImportFromExcelToDB');
    Route::get('baixar/{id}', 'Painel\ArquivoController@Baixar');
    Route::get('apagar/{id}', 'Util\ArquivoController@Apagar');   
});


Route::group(['prefix' => 'post'], function(){
    //Exibir os posts
    Route::get('/', 'Painel\PostController@index');
    
    //inserir posts
    Route::get('novo','Painel\PostController@Novo');
    
    
    //apagar posts
    Route::get('apagar/{id}','Painel\PostController@Apagar');
    
    //atualizar posts
    Route::get('atualizar/{id}','Painel\PostController@Atualizar');
    
    //salvar
    Route::post('salvar/','Painel\PostController@Salvar');
    
});

Route::auth();

Route::get('/', 'SiteController@index');
Route::get('/excel', 'Util\ExcelController@index');
Route::get('/rdp', 'Painel\RdpController@index');
Route::get('/func/{id?}', 'Painel\UserController@getFuncionario');
Route::get('/test/{id?}', 'Util\ExcelController@test');
Route::get('/home', 'SiteController@index');
Route::get('notice/{id}/update', 'HomeController@update');

Auth::routes();

Route::get('/home', 'HomeController@index');
