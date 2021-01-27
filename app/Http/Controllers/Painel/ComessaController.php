<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Gate;
use App\Http\Controllers\Controller;
use App\Models\Comessa;
use App\Models\Funcionario;
use App\Models\Orcamento;

class ComessaController extends Controller
{
    private $comessa;
    
    public function __construct(Comessa $comessa){
        $this->comessa = $comessa;
    }
    
    public function index(){
        if (Gate::denies('list-comessa')){ 
            $user = auth()->user();
            $coordenador=$user->getFuncionario($user->id);
            $comessas = $this->ListByCoordenador($coordenador);
            if($comessas){
                return view('painel.comessas.comessas', compact('comessas'));
            }
            return view('errors.403');
            
            //abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}else{
            $comessas = $this->comessa->all();
            return view('painel.comessas.comessas', compact('comessas'));
        }
        
    }
    
    public function ListByCoordenador($coordenador){
        if (Gate::denies('list-comessacoordenador',$this->comessa)){
            return false;
    		//abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        $comessas = $this->comessa->getByCoordenador($coordenador->id);
        return $comessas;
    }
    
    public function Atualizar($id){
        $comessa = Comessa::find($id);

        if (Gate::denies('change-comessa')){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        $df = \DateTime::createFromFormat('Y-m-d', $comessa->data_inicio); 
        $comessa->data_inicio = $df->format('d/m/Y');
        $df = \DateTime::createFromFormat('Y-m-d', $comessa->data_fim); 
        $comessa->data_fim = $df->format('d/m/Y');
        $funcionario = new Funcionario();
        $gerentes = $funcionario->getByFuncao('gerente');
        $coordenadores = $funcionario->all();
        $orcamentos = Orcamento::all();
        return view('painel.comessas.novacomessa', compact('comessa','gerentes','coordenadores','orcamentos'));
    }
    
    public function AtivarDesativar($idComessa){
        if (Gate::denies('change-comessa')){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        $comessa = Comessa::find($idComessa);
        $comessa->ativa = ($comessa->ativa==1) ? 0 : 1; 
        $comessa->save();
        return redirect('/painel/comessas');
    }
    
    public function Novo($orcamento_id = 0){
        if (Gate::denies('change-comessa')){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}        
        $comessa = new Comessa(); 
        if($orcamento_id != 0){
            $comessa->orcamento_id = $orcamento_id;
        }
        $data = new \DateTime();
        $comessa->data_inicio = $data->format('d/m/Y');
        $comessa->data_fim = $data->format('d/m/Y');
        
        $funcionario = new Funcionario();
        $gerentes = $funcionario->getByFuncao('gerente');
        //$coordenadores = $funcionario->getByFuncao('coordenador');
        $coordenadores = $funcionario->all();        
        $orcamentos = Orcamento::all();
        return view('painel.comessas.novacomessa', compact('comessa','gerentes','coordenadores','orcamentos'));
    }
    
    public function Apagar($id){
        if (Gate::denies('change-comessa')){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        $comessa = Comessa::find($id);        
        $comessa->delete();
        return redirect('/painel/comessas');
    }
    
    public function Salvar(Request $request){
        $id = $request->get('id');
        $comessa = Comessa::find($id);
        if (Gate::denies('change-comessa')){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        $data = \DateTime::createFromFormat('d/m/Y', $request['data_inicio']);
        $df = $data->format('Y-m-d');                            
        $request['data_inicio'] = $df;
        $data = \DateTime::createFromFormat('d/m/Y', $request['data_fim']);
        $df = $data->format('Y-m-d');                            
        $request['data_fim'] = $df;
        if (count($comessa)>=1){           
            $comessa->fill($request->all()); 
            $comessa->save();
            \Session::flash('mensagem_sucesso', "Comessa ".$comessa->id." atualizada com sucesso ");
        }else {
            $comessa = new Comessa();
            $request['id']=$comessa->id;
            $request['ativa']=true;
            $comessa->create($request->all());
            \Session::flash('mensagem_sucesso', 'Comessa cadastrada com sucesso');
        }  
        return redirect('/painel/comessas');
    }
}
