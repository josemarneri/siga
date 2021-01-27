<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Carga;
use App\Models\Funcionario;
use Gate;
use App\Models\Comessa;

class CargaController extends Controller
{
    //
    private $carga;
    
    public function __construct(Carga $carga){
        $this->carga = $carga;
    }
    
    public function index(){
        if (Gate::denies('list-carga')){
            $user = auth()->user();
            $coordenador=$user->getFuncionario($user->id);
            $cargas = $this->ListByCoordenador($coordenador->id);
            if($cargas){
                return view('painel.cargas.cargas', compact('cargas'));
            }else{
                return view('errors.403');
            }
            //abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}else{
            $cargas = $this->carga->all();
            return view('painel.cargas.cargas', compact('cargas'));
        }
    }
    
    public function ListByCoordenador($coordenador_id){
        $coordenador = Funcionario::find($coordenador_id);
        if (Gate::denies('list-cargacoordenador',$coordenador)){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        $cargas = $this->carga->getCargaByCoordenador($coordenador_id);
        return view('painel.cargas.cargas', compact('cargas'));
    }
    
    public function Livre($id){
        $carga = Carga::find($id);
        if (Gate::denies('update-carga',$carga)){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        
        $carga->livre = ($carga->livre==1) ? 0 : 1; 
        $carga->save();
        return redirect('/painel/cargas');
    }
    public function Atualizar($id){
        $carga = Carga::find($id);
        if (Gate::denies('update-carga', $carga)){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        $df = \DateTime::createFromFormat('Y-m-d', $carga->data_inicio); 
        $carga->data_inicio = $df->format('d/m/Y');
        $df = \DateTime::createFromFormat('Y-m-d', $carga->data_fim); 
        $carga->data_fim = $df ? $df->format('d/m/Y'):null;
        $comessas = Comessa::all();
        return view('painel.cargas.novacarga', compact('carga','comessas'));
    }
    
    public function Novo(){
        if (Gate::denies('create-carga')){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}        
        $carga = new Carga(); 
        $data = new \DateTime();
        $carga->data_inicio = $data->format('d/m/Y');
        $carga->data_fim = $data->format('d/m/Y');        
        $funcionarios = $this->carga->getFuncionarioSemCarga();
        $comessas = Comessa::all();
        return view('painel.cargas.novacarga', compact('carga','funcionarios','comessas'));
    }
    
    public function Apagar($id){
        if (Gate::denies('delete-carga')){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        $carga = Carga::find($id);        
        $carga->delete();
        return redirect('/painel/cargas');
    }
    
    public function Salvar(Request $request){
        $id = $request->get('id');
        $carga = Carga::find($id);
        if (Gate::denies('save-carga',$carga)){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        $data = \DateTime::createFromFormat('d/m/Y', $request['data_inicio']);
        $df = $data->format('Y-m-d');                            
        $request['data_inicio'] = $df;
        $data = \DateTime::createFromFormat('d/m/Y', $request['data_fim']);
        $df = $data->format('Y-m-d');                            
        $request['data_fim'] = $df;
        $request['livre'] = empty($request['livre']) ? 0 : 1;
        
        if (!Empty($carga)){           
            $carga->fill($request->all()); 
            $carga->save();
            \Session::flash('mensagem_sucesso', "Carga ".$carga->id." atualizada com sucesso ");
        }else {
            $carga = new Carga();
            $request['id']=$carga->id;
            $carga->create($request->all());
            \Session::flash('mensagem_sucesso', 'Carga cadastrada com sucesso');
        }  
        return redirect('/painel/cargas');
    }
    
    public function NovaEquipe($comessa_id){ 
        $comessa = new Comessa();
        $comessa = $comessa->find($comessa_id);
        if (Gate::denies('create-equipe',$comessa)){
    		//abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}
        $inclusos = $this->carga->getByComessa($comessa_id);
        $exclusos = $this->carga->getLivre();
        $habilitados = $comessa->getFuncionarios();
        //dd($comessa,$inclusos,$exclusos);
        
        return view('painel.cargas.novaequipe', compact('comessa','inclusos','exclusos','habilitados'));
    }
    
    public function SalvarEquipe(Request $request){
        $comessa = new Comessa();
        $comessa_id = $request['comessa_id'];
        $comessa = $comessa->find($comessa_id);
        if (Gate::denies('save-equipe',$comessa)){
    		abort(403, "Acesso não autorizado para o usuário: ". auth()->user()->login);
    	}     
        $inclusos = $request['inclusos'];
        $habilitados = $request['habilitados'];
        $exclusos_I = $request['exclusos_I'];
        $exclusos_H = $request['exclusos_H'];
        //dd($exclusos_H);
        $comessa->limpaEquipe();
        $this->carga->limpaEquipe($comessa_id);
        //dd($comessa_id,$inclusos,$exclusos);
        $this->carga->addEquipe($comessa_id, $inclusos);
        $comessa->addEquipe($comessa_id, $inclusos);
        $comessa->addEquipe($comessa_id, $habilitados);
        //dd($comessa_id,$inclusos,$exclusos);
        $this->carga->addEquipe($comessa_id, $exclusos_I);
        $comessa->addEquipe($comessa_id, $exclusos_H);
        $comessa->addEquipe($comessa_id, $exclusos_I);

        //dd($comessa,$inclusos,$exclusos);
        
        return redirect('/painel/comessas');
    }
}
