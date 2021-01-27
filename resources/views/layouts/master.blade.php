<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/app2.css" rel="stylesheet">
    <link href="/css/biblioteca.css" rel="stylesheet">
    

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    
</head>
<body >  
  
    <div id="app">
        <div id="header" class="head-2">
                <nav class="navbar navbar-default navbar-static-top" >            
                    
                    <div class="head-logo"></div>
                    <div class="head-text">
                        <h1 >Sistema de Gestão e Apoio</h1>
                    </div>
                </nav>
            </div>
        <nav class="navbar navbar-default navbar-static-top margin-top-menu" >
            <div >
                <div class="menu-funcoes" >
                    <!-- Left Side Of Navbar -->
                    <ul >
                        <li>                                        
                            <a href="{{url('/')}}" >
                                Home
                            </a>                            
                        </li>
                        @can('menu-rh')
                        <li class="dropdown">
                            <a href="#" >
                                Gestão RH <span class="caret"></span>
                            </a>

                            <ul >
                                @can('list-user')
                                <li>                                        
                                    <a href="{{url('/painel/usuarios')}}" >
                                        Usuários
                                    </a>                            
                                </li>
                                @endcan
                                
                                @can('list-funcionario')
                                <li>                                        
                                    <a href="{{url('/painel/funcionarios')}}" >
                                        Funcionários
                                    </a>                            
                                </li>
                                @endcan
                                
                                @can('list-util')
                                <li>                                        
                                    <a href="{{url('/util')}}" >
                                        Ponto
                                    </a>                            
                                </li>
                                @endcan
                                
                                @can('list-funcionarios')
                                <li>                                        
                                    <a href="{{url('/painel/posts')}}" >
                                        Informativos
                                    </a>                            
                                </li>
                                @endcan
                                
                                @can('list-gerentes')
                                    <li>
                                        <a href="/painel/funcionarios/gerentes">Gerentes</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        
                        @can('menu-financeiro')
                        <li>
                            <a href="#">Financeiro</a>
                            
                        </li>
                        @endcan
                        
                        @can('menu-engenharia')
                        <li>
                            <a href="#">Engenharia</a>
                                <ul>
                                    <li><a href="{{ route('diariosdebordo')}}">Diário de bordo</a></li>
                                    <li><a href="{{ route('atividades')}}">Atividades</a></li>
                                    <li><a href="{{ route('comessas')}}">Comessa</a></li>
                                    <li><a href="/painel/cargas">Carga de Trabalho</a></li>
                                    <li><a href="/painel/engenharia/equipes">Equipes</a></li>
                                    <li><a href="{{ route('checklists')}}">Check-List</a></li>
                                    <li><a href="{{ route('desenhos')}}">Desenhos</a></li>
                                    <li><a href="{{ route('projetos')}}">Projetos</a></li>
                                </ul>
                        </li>
                        @endcan
                        
                        @can('menu-comercial')
                        <li>
                            <a href="#">Comercial</a>
                                <ul>
                                    <li><a href="{{ route('clientes')}}">Cliente</a></li>  
                                    <li><a href="{{ route('orcamentos') }}">Orçamento</a></li>
                                </ul>
                        </li>
                        @endcan
                        
                        @can('menu-sistema')
                        <li>
                            <a href="#">Sistema</a>
                                <ul>
                                    <li><a href="{{ route('permissoes')}}">Permissões</a></li>
                                    <li><a href="{{ route('perfis')}}">Perfil de acesso</a></li>
                                    <li><a href="{{ route('arquivos')}}">Arquivos anexos</a></li>
                                </ul>
                        </li>
                        @endcan
                        
                        @can('menu-controle')
                        <li>
                            <a href="#">Controle</a>
                            <ul>
                                
                                <li>
                                    <a href="#">Ponto</a>
                                    <ul>
                                        <li><a href="#">Registro</a></li>
                                        <li><a href="#">Ocorrência</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Horas</a>
                                </li>
                                <li>
                                    
                                </li>
                            </ul>
                        </li>
                        @endcan
                        
                        @can('menu-relatorios')
                        <li>
                            <a href="#">Relatórios</a>
                            <ul>
                                <li>
                                    <a href="#">Orçamentos</a>
                                </li>
                                <li>
                                    <a href="#">Comessas</a>
                                </li>
                                <li>
                                    <a href="#">Atividades</a>
                                </li>
                                <li>
                                    <a href="#">Ponto</a>
                                    <ul>
                                        <li><a href="#">Registro</a></li>
                                        <li><a href="#">Ocorrência</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Horas</a>
                                </li>
                                <li>
                                    
                                </li>
                            </ul>
                        </li>
                        @endcan
                       
                        <li><a href="#">Sugestões</a></li>
                         
                    </ul>
                </div>
                <div class="menu-user-dir">
                        <ul>
            <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Entrar</a></li>
                        @else
                            <li >
                                <a href="#" >
                                    {{ Auth::user()->login }} 
                                </a>

                                <ul >
                                    <li>                                        
                                        <a  href="{{url("/painel/usuarios/alterarsenha/".Auth::user()->id) }}"> Alterar Senha
                                        </a>
                                    </li>
                                    <li>                                        
                                        <a  href="{{url("/painel/funcionarios/alterardadospessoais/".Auth::user()->id) }}"> Alterar dados pessoais
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ url('/logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    Sair
                                                </a>

                                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>

                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                
                </div>
            </div>
            
        </nav>
        <div > 
            <div class="area-util">                
                <div class="menu-lateral">
                </div>
            
                <div class="area-trabalho">
                    @yield('content')
                </div>
            </div>
                           
            <div id="rodapé" class="rodape">
                Rodapé
            </div>            
        </div>   

    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
