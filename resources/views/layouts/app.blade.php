<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hammer') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/icons/all.css">
    <script src="/js/icons/all.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Anton&family=Concert+One&family=Rubik:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
   

    

    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body id="body">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container bgAdmin">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h3 class="font-n-xl color-primario">Hammer</h3>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @role('admin')
                    <ul class="navbar-nav me-auto">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-users-gear fa-xl me-2 iconos"></i>Gestionar
                            </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="{{ url('/productos')}}">Productos</a>
                                <a class="dropdown-item" href="{{ url('/clientes')}}">Clientes</a>
                                <a class="dropdown-item" href="{{ url('/vehiculos')}}">Vehiculos</a>                                
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-building fa-xl me-2 iconos"></i>Empresa
                                    </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="{{ url('/roles')}}">Roles</a>
                                <a class="dropdown-item" href="{{ url('/users')}}">Usuarios</a>                                
                            </div>
                        </div>

                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-chart-line fa-xl me-2 iconos"></i>Indicadores
                                    </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="{{ url('/ventas')}}" role="button">Ventas</a>                          
                            <a class="dropdown-item" href="{{ url('/recibos')}}" role="button">Recibos</a>                          
                            </div>
                        </div>                      
                        
                        
                    </ul>
                    @endrole
                    @role('rh')
                    <ul class="navbar-nav me-auto">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-users-gear fa-xl me-2 iconos"></i>Gestionar
                                    </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="{{ url('/horarios')}}">Horarios</a>
                                <a class="dropdown-item" href="{{ url('/empleados')}}">Empleados</a>                                
                            </div>
                        </div>
                        
                        <div class="btn">
                            <a class="dropdown-item" href="{{ url('/asistencias')}}"><i class="fa-solid fa-business-time fa-xl me-2 iconos"></i>Asistencias</a>
                        </div>
                     
                        
                        
                    </ul>
                    @endrole
                    @role('portero')
                    <ul class="navbar-nav me-auto">
                        <div class="btn">
                            <a class="dropdown-item" href="{{ route('asistencias.create')}}"><i class="fa-solid fa-arrow-right-to-bracket fa-2xl me-2 iconos"></i>INGRESO</a>
                        </div>
                        
                        <div class="btn">
                            <a class="dropdown-item" href="{{ route('salidaPorteria')}}"><i class="fa-solid fa-door-open fa-2xl me-2 iconos"></i>SALIDA</a>
                        </div>                    
                        
                        
                    </ul>
                    @endrole
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-user fa-xl me-2"></i>{{ Auth::user()->name }}
                                <i> / </i>{{Auth::user()->getRoleNames()->first()}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-door-open fa-xl me-2"></i>Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <div class="row d-flex align-items-end">
        <div class="col-4 text-center">
            <div class="d-flex justify-content-center">
                <img src="/resources/icons/sena.png" class="w-25">
            </div>
            <h3>Sena regional Huila</h3>
        </div>
        <div class="col-4">
            <span>Diseñado como proyecto en el programa de <br>
                software Sena Regional Huila
            </span>
        </div>
        <div class="col-4 text-center">
            <div class="d-flex justify-content-center">
                <img src="/resources/icons/loking.png" alt="" class="w-25">
            </div>
            
            <span>Lopez Quintero Ingenieria <br>
            patente en tramite</span>
        </div>
    </div>
    
</body>
</html>
