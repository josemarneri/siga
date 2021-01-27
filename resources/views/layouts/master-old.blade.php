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
                    <div class="head-menu-user">
                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right">
                                <!-- Authentication Links -->
                                @if (Auth::guest())
                                    <li><a href="{{ url('/login') }}">Entrar</a></li>
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li>                                        
                                                <a class="edit" href="{{url("/painel/usuarios/alterarsenha/".Auth::user()->id) }}"> Alterar Senha

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
                </nav>
            </div>
        <nav class="navbar navbar-default navbar-static-top margin-top-menu" >
            <div class="container">
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li>                                        
                            <a href="{{url('/')}}" aria-expanded="false">
                                Home
                            </a>                            
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Gerenciar <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @can('list-user')
                                <li>                                        
                                    <a href="{{url('/painel/usuarios')}}" aria-expanded="false">
                                        Usuários
                                    </a>                            
                                </li>
                                @endcan
                                
                                @can('list-funcionarios')
                                <li>                                        
                                    <a href="{{url('/painel/funcionarios')}}" aria-expanded="false">
                                        Funcionários
                                    </a>                            
                                </li>
                                @endcan
                                
                                @can('list-cliente')
                                <li>                                        
                                    <a href="{{url('/painel/clientes')}}" aria-expanded="false">
                                        Clientes
                                    </a>                            
                                </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Controle <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @can('list-user')
                                <li>                                        
                                    <a href="{{url('/painel/usuarios')}}" aria-expanded="false">
                                        Horas
                                    </a>                            
                                </li>
                                @endcan
                                
                                @can('list-funcionarios')
                                <li>                                        
                                    <a href="{{url('/painel/funcionarios')}}" aria-expanded="false">
                                        Atividades
                                    </a>                            
                                </li>
                                @endcan
                                
                                @can('list-cliente')
                                <li>                                        
                                    <a href="{{url('/painel/clientes')}}" aria-expanded="false">
                                        Solicitações
                                    </a>                            
                                </li>
                                @endcan
                                
                                @can('list-cliente')
                                <li>                                        
                                    <a href="{{url('/painel/clientes')}}" aria-expanded="false">
                                        Ocorrências de ponto
                                    </a>                            
                                </li>
                                @endcan
                                
                                @can('list-cliente')
                                <li>                                        
                                    <a href="{{url('/painel/clientes')}}" aria-expanded="false">
                                        Férias
                                    </a>                            
                                </li>
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="area-util">            
               @yield('content')            
            <div id="rodapé" class="rodape">
                Rodapé
            </div>            
        </div>   

    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
