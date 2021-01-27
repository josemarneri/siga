<?php

namespace App\Http\Controllers\Plm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Desenho;
use App\Models\Projeto;
use Gate;
use App\Models\Relatorio;
use Request as Req;

class DesenhoController extends Controller
{
    //
     private $desenho;
    
    public function __construct(Desenho $desenho){
        $this->desenho = $desenho;
    }
    
    public function index(){
        if (Gate::denies('list-desenho')){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        $desenhos = $this->desenho->all()->sortByDesc('id');
        $desenho = new Desenho();
        
        $projetos = Projeto::all();
        return view('plm.desenhos.desenhos', compact('desenhos','desenho','projetos'));
    }
    public function Filtrar(Request $filtro){
        if (Gate::denies('list-desenho')){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}

        $desenhos = $this->desenho->Filtrar($filtro);
        rsort($desenhos);   //Função usada para ordenar os desenhos em ordem decrescente
        
        //dd($desenhos);
        $desenho = new Desenho();
        $projetos = Projeto::all(); // Busca a lista de projetos cadastrados
        return view('plm.desenhos.desenhos', compact('desenhos','desenho','projetos'));
    }
    
    public function Atualizar($iddesenho){
        $desenho = Desenho::find($iddesenho);
        if (Gate::denies('change-desenho')){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}        
        $projetos = Projeto::all();
        
        return view('plm.desenhos.novodesenho', compact('desenho', 'projetos'));
    }
    
    public function Novo(){
        if (Gate::denies('change-desenho')){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        $desenho = new Desenho();
        $desenho->numero = $this->desenho->gerarNumero();
        $projetos = Projeto::all();
        
        return view('plm.desenhos.novodesenho', compact('desenho','projetos'));
    }
    
   
    
    public function Apagar($iddesenho){
        if (Gate::denies('change-desenho')){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        $desenho = Desenho::find($iddesenho);        
        $desenho->delete();
        return redirect('/plm/desenhos');
    }
    
  
    public function Salvar(Request $request){
        if (Gate::denies('change-desenho')){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        if (Desenho::find($request->get('id'))){ 
            $desenho = Desenho::find($request->get('id'));            
            $desenho->fill($request->all()); 
            $desenho->save();
            \Session::flash('mensagem_sucesso', "Desenho ".$desenho->nome." atualizado com sucesso ");
        }else {
              $desenho = new Desenho();
              $request['id']=$desenho->id;
              $request['alias'] = $request['numero'];

              //dd($request);
              $desenho->create($request->all());
            \Session::flash('mensagem_sucesso', 'Desenho cadastrado com sucesso');
        }  
        return redirect('/plm/desenhos');
    }
    
    public function ImportarPlanilha(){
        
        return view('/plm/desenhos/importarplanilha');
        
    }
    public function ReadPlanilha(){
        //Selecionar um arquivo
        //dd('ImportarPlanilha');
        
        //dd($request['filefield']);
        $file = Req::file('filefield');
        //$file = Request::file('filefield');
        $desenhos = new Relatorio();
        
        //dd($file);
        $desenhos->ReadExcel($file->getPathname());
        //dd($desenhos);
        return redirect('/plm/desenhos');
        
    }
}
