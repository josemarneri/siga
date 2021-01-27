@extends('layouts.master')

@section('content')
<div class="area-util">
    <div class = "wrapper">        
              
        <div class="title-2 wrapperL" >
            Lista de projetos        
        </div>

            
    </div>    
    
    <table class="table table-hover table-condensed" >
        <thead>
        <a href="{{url("/plm/projetos/novo")}}" title="Criar Projeto">
                <img src="{{url('/assets/imagens/Add.png')}}" alt="Criar Desenho" />
            </a>
            <tr>
                <th style="text-align: center">Id</th>
                <th style="text-align: center">Código</th>
                <th style="text-align: center">Alias</th>
                <th style="text-align: center">Descrição</th>
                <th style="text-align: center">Observações</th>
                <th style="text-align: center">Comessa</th>
                <th width="100" style="text-align: center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($projetos))
                @forelse($projetos as $projeto)               
                <tr>
                    <td>{{$projeto->id}}</td>
                    <td>{{$projeto->codigo}}</td>
                    <td>{{$projeto->alias}}</td>
                    <td>{{$projeto->descricao}}</td>
                    <td>{{$projeto->observacoes}}</td>
                    <td>{{$projeto->comessa_id}}</td>
                    <td>
                        <a href="{{url("/plm/projetos/atualizar/$projeto->id")}}" title="alterar dados do projeto">
                            <img src="{{url('/assets/imagens/Edit.png')}}" alt="alterar dados do projeto" /> 
                        </a>
                        <a href="{{url("/plm/projetos/apagar/$projeto->id")}}" title="Remover projeto">
                            <img src="{{url('/assets/imagens/Delete.png')}}" alt="Remover projeto" />
                        </a>
                    </td>
                </tr>
                @empty
                    <p> Nenhum projeto cadastrado!!!</p>
                @endforelse
            @endif
        </tbody>
    </table>

    
    
</div>
@endsection


