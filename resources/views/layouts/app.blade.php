<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Estrat-eGov') }}</title>

    <!-- Styles -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fondoAnimado.css') }}" rel="stylesheet">

    <!-- JavaScript -->
    <script type="text/javascript" src="{{ asset('js/fondoAnimado.js') }}"></script>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

    <!-- Librerias Chart.JS -->
    <script type="text/javascript" src="{{ asset('js/chart.js-2.9.3/Chart.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/chart.js-2.9.3/Chart.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/chart.js-2.9.3/Chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/chart.js-2.9.3/Chart.min.js') }}"></script>
    <link href="{{ asset('css/chart.js-2.9.3/Chart.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chart.js-2.9.3/Chart.min.css') }}" rel="stylesheet">


    <!-- Confirma ANTES DE ELIMINAR un registro -->
    <script type="text/javascript">
      function confirmarEliminar()
      {
        var x = confirm("Estas seguro de Eliminar?");
        if (x)
            return true;
        else
            return false;
      }
    </script>
    <!-- Fin del Script confirmarEliminar -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}" style="color: #363636;font-size: 28px;font-weight: 900;">
                        {{ config('app.name', 'Estrat-eGov') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Ingreso</a></li>
                            <li><a href="{{ route('register') }}">Registro</a></li>
                        @else
                            <!-- INFORMACION INSTITUCIONAL -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Institucional |<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a style="color:#000000;" href="{{ url('/entidad') }}">Informacion de la Entidad</a></li>
                                    <li><a style="color:#000000;" href="{{ url('/administracion') }}">Informacion de la Administración</a></li>
                                    <li><a style="color:#000000;" href="{{ url('/entidadoficina') }}">Areas o Dependencias de la Entidad</a></li>
                                </ul>
                            </li>

                            <!-- GESTION ADMINISTRATIVA -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Gestión administrativa |<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a style="color:#000000;" href="{{ url('/plandesarrollonivel4listarregistros') }}">Plan de desarrollo | Consultar</a></li>
                                    <li><a style="color:#000000;" href="{{ url('/plandesarrollo') }}">Plan de desarrollo | Arbol del plan</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a style="color:#000000;" href="{{ url('/planindicativolistar') }}">Plan indicativo | Consultar</a></li>

                                    <li role="separator" class="divider"></li>
                                    <li><a style="color:#000000;" href="{{ url('/planaccionlistar2022') }}"><b>Plan de accion 2022</b> | Consultar</a></li>
                                    @if ((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('editor')))
                                        @php ($aux = Auth::user()->oficina_id) @endphp
                                        <li><a style="color:#000000;" href="{{ url('/tareaslistargeneral2022') }}"><b>Plan de accion 2022</b> | Cronologico tareas reportadas</a></li>
                                        <li><a style="color:#000000;" href="{{ url('/planaccionlistaravance2022?filtroSecretaria=' . $aux) }}"><b>Plan de accion 2022</b> | Avance de ejecucion</a></li>
                                        <li><a style="color:#000000;" href="{{ url('/plandesarrollonivel4listaravance2022?filtroSecretaria=' . $aux) }}"><b>Plan de accion 2022</b> | Ponderado ejecucion actividades</a></li>
                                    @endif

                                    <li role="separator" class="divider"></li>
                                    <li><a style="color:#000000;" href="{{ url('/planaccionlistar2021') }}">Plan de accion 2021 | Consultar</a></li>
                                    @if ((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('editor')))
                                        @php ($aux = Auth::user()->oficina_id) @endphp
                                        <li><a style="color:#000000;" href="{{ url('/tareaslistargeneral2021') }}">Plan de accion 2021 | Cronologico tareas reportadas</a></li>
                                        <li><a style="color:#000000;" href="{{ url('/planaccionlistaravance2021?filtroSecretaria=' . $aux) }}">Plan de accion 2021 | Avance de ejecucion</a></li>
                                        <li><a style="color:#000000;" href="{{ url('/plandesarrollonivel4listaravance2021?filtroSecretaria=' . $aux) }}">Plan de accion 2021 | Ponderado ejecucion actividades</a></li>
                                    @endif

                                    <li role="separator" class="divider"></li>
                                    <li><a style="color:#000000;" href="{{ url('/planaccionlistar2020') }}">Plan de accion 2020 | Consultar</a></li>
                                    @if ((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('editor')))
                                        @php ($aux = Auth::user()->oficina_id) @endphp
                                        <li><a style="color:#000000;" href="{{ url('/tareaslistargeneral2020') }}">Plan de accion 2020 | Cronologico tareas reportadas</a></li>
                                        <li><a style="color:#000000;" href="{{ url('/planaccionlistaravance2020?filtroSecretaria=' . $aux) }}">Plan de accion 2020 | Avance de ejecucion</a></li>
                                        <li><a style="color:#000000;" href="{{ url('/plandesarrollonivel4listaravance2020?filtroSecretaria=' . $aux) }}">Plan de accion 2020 | Ponderado ejecucion actividades</a></li>
                                    @endif

                                </ul>
                            </li>

                            <!-- TAREAS -->
                            @if(!(Auth::user()->hasRole('user'))) 
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        Tareas |<span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        @if ((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('editor')))
                                            @php ($aux = Auth::user()->oficina_id) @endphp

                                            <li><a style="color:#000000;" href="{{ url('/planaccionlistarreporte2022?filtroSecretaria=' . $aux) }}"><b>Vigencia 2022</b> | Reportar</a></li>
                                            <li><a style="color:#000000;" href="{{ url('/planaccionlistarreporte2021?filtroSecretaria=' . $aux) }}">Vigencia 2021 | Ver tareas reportadas</a></li>
                                            <li><a style="color:#000000;" href="{{ url('/planaccionlistarreporte2020?filtroSecretaria=' . $aux) }}">Vigencia 2020 | Ver tareas reportadas</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif

                            <!-- ANALITICA DE DATOS  -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                     Analítica |<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a style="color:#000000;" href="{{ url('/graficaplancomponentes') }}">Distribucion del plan</a></li>
                                    <li><a style="color:#000000;" href="{{ url('/graficaplanresponsables') }}">Distribucion por secretarias</a></li> 
                                    <li><a style="color:#000000;" href="{{ url('/graficaplanods') }}">Distribucion por ODS</a></li>       
                                    <li><a style="color:#000000;" href="{{ url('/graficaplanmipg') }}">Distribucion por MIPG</a></li>       
                                    <li><a style="color:#000000;" href="{{ url('/graficaplanppmunicipal') }}">Distribucion por Politicas Publicas Municipales</a></li>   
                                    
                                    @if ((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('editor')))
                                        <li role="separator" class="divider"></li>
                                        <li><a style="color:#000000;" href="{{ url('/graficaavanceplandeaccion2022?tipo=1') }}"><b>Analitica 2022</b> - Avance plan de accion</a></li>       
                                        <li><a style="color:#000000;" href="{{ url('/graficaavanceplandesarrollo2022?tipo=2') }}"><b>Analitica 2022</b> - Avance plan de desarrollo</a></li>     
                                        <!-- <li><a style="color:#000000;" href="{{ url('/home') }}"><b>Analitica 2021</b> - Semaforos de cumplimiento</a></li> -->  

                                        <li role="separator" class="divider"></li>
                                        <li><a style="color:#000000;" href="{{ url('/graficaavanceplandeaccion2021?tipo=1') }}">Analitica 2021 - Avance plan de accion</a></li>       
                                        <li><a style="color:#000000;" href="{{ url('/graficaavanceplandesarrollo2021?tipo=2') }}">Analitica 2021 - Avance plan de desarrollo</a></li>     
                                        <!-- <li><a style="color:#000000;" href="{{ url('/home') }}"><b>Analitica 2021</b> - Semaforos de cumplimiento</a></li> -->  

                                        <li role="separator" class="divider"></li>
                                        <li><a style="color:#000000;" href="{{ url('/graficaavanceplandeaccion2020?tipo=1') }}">Analitica 2020 - Avance plan de accion</a></li>       
                                        <li><a style="color:#000000;" href="{{ url('/graficaavanceplandesarrollo2020?tipo=2') }}">Analitica 2020 - Avance plan de desarrollo</a></li>     
                                        <!-- <li><a style="color:#000000;" href="{{ url('/graficaavanceplandesarrollo?tipo=3') }}">Analitica 2020 - Semaforos de cumplimiento</a></li> -->        
                                    @endif
                                </ul>
                            </li>

                            <!-- INFORMES -->
                            @if((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')))
                                <!-- 
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        Informes |<span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        @if ((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')))
                                            <li><a style="color:#000000;" href="{{ url('/informetipounoexcel2021') }}"><b>Informes 2021</b> | Informe T1 actividades programadas</a></li>
                                            <li><a style="color:#000000;" href="{{ url('/tareaslistargeneralexcel2021') }}"><b>Informes 2021</b> | Sabana completa tareas reportadas</a></li>
                                            
                                            <li role="separator" class="divider"></li>
                                            <li><a style="color:#000000;" href="{{ url('/informetipounoexcel2020') }}">Informes 2020 | Informe T1 actividades programadas</a></li>
                                            <li><a style="color:#000000;" href="{{ url('/tareaslistargeneralexcel2020') }}">Informes 2020 | Sabana completa tareas reportadas</a></li>
                                        @endif
                                    </ul>
                                </li>
                                -->
                            @endif

                            <!-- POLITICAS PUBLICAS -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Referentes |<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a style="color:#000000;" href="{{ url('/ods') }}">Objetivos desarrollo sostenible ODS</a></li>
                                    <li><a style="color:#000000;" href="{{ url('/pndesarrollo') }}">Plan nacional de desarrollo</a></li>
                                    <li><a style="color:#000000;" href="{{ url('/ppnacional') }}">Políticas públicas nacionales</a></li>
                                    <li><a style="color:#000000;" href="{{ url('/ppdepartamental') }}">Políticas públicas departamentales</a></li>
                                    <li><a style="color:#000000;" href="{{ url('/ppmunicipal') }}">Políticas públicas municipales</a></li>
                                    <li><a style="color:#000000;" href="{{ url('/mipg') }}">Modelo Integrado de Planeación y Gestión MIPG</a></li>
                                </ul>
                            </li>

                            <!-- INFORMACION INSTITUCIONAL -->
                            @if(Auth::user()->hasRole('super'))
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        Configuración |<span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a style="color:#000000;" href="{{ route('plandesarrollo.edit',config('app.plan_desarrollo')) }}">Plan de desarrollo | Nombres de los niveles</a></li>
                                        <li><a style="color:#000000;" href="{{ url('/regenerarNivelesEjecucionTodasMetas') }}">Regeneración niveles de ejecución</a></li>
                                    </ul>
                                </li>
                            @endif

                            <!-- LOGIN DE USUARIO -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a style="color:#000000;" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar sesion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <!-- Pie de pagina -->
        <footer class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <center><small class="d-block mb-3 text-muted">Estrat-eGov y Estratego &copy; - Derechos reservados <a href="http://www.genusgroupsas.com" target="_blank">Genus Group SAS</a> - Colombia 2020</small><center>
                </div>
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
