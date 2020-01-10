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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                    <a class="navbar-brand" href="{{ url('/home') }}">
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
                                    <li><a href="{{ url('/administracion') }}">.: Administracion vigente</a></li>
                                    <li><a href="#">.: Organigrama</a></li>
                                    <li><a href="#">.: Comunas y Veredas</a></li>
                                </ul>
                            </li>

                            <!-- GESTION ADMINISTRATIVA -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Gestion administrativa |<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="#">.: Plan de desarrollo</a></li>
                                    <li><a href="#">.: Plan indicativo</a></li>
                                    <li><a href="#">.: Plan de accion</a></li>
                                    <li><a href="#">.: Banco de proyectos</a></li>
                                    <li><a href="#">.: Marco fiscal mediano plazo</a></li>
                                    <li><a href="#">.: Plan plurianual de inversion</a></li>
                                </ul>
                            </li>

                            <!-- ACTIVIDADES -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Actividades |<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="#">.: Reportar</a></li>
                                    <li><a href="#">.: Consultar</a></li>
                                </ul>
                            </li>

                            <!-- ANALITICA DE DATOS  -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Analitica |<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="#">.: Reportes</a></li>
                                    <li><a href="#">.: Estadisticos</a></li>
                                    <li><a href="#">.: Proyecciones</a></li>
                                </ul>
                            </li>

                            <!-- POLITICAS PUBLICAS -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Politicas publicas |<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/ods') }}">.: Objetivos Desarrollo Sostenible</a></li>
                                    <li><a href="{{ url('/ppnacional') }}">.: Politicas publicas nacionales</a></li>
                                    <li><a href="{{ url('/ppdepartamental') }}">.: Politicas publicas departamentales</a></li>
                                    <li><a href="{{ url('/ppmunicipal') }}">.: Politicas publicas municipales</a></li>
                                </ul>
                            </li>

                            <!-- INFORMACION INSTITUCIONAL -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Configuracion |<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="#">.: Rangos semaforo de medicion</a></li>
                                    <li><a href="#">.: Alarmas</a></li>
                                    <li><a href="#">.: Indicadores</a></li>
                                </ul>
                            </li>


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
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
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
