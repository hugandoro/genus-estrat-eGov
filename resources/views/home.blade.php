@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!--<div class="panel-heading">Menu principal</div> -->

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!--<center><picture><img class='img-responsive' src="{{ asset('images/portada_menu.png') }}"></picture></center>-->
                    <!--<div id="particles-js"></div>-->

                    <!-- MENU - Fila 1 -->
                    <div class="row">
                        <!-- MENU ICONO - Plan de desarrollo -->
                        <div class="col-sm-2">
                            <div class="card text-center text-white bg-warning mb-3" style="background-color: #363636;border-radius: 10px 10px 10px 10px;">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono2.png") }}" alt="Estrategov" width="30%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#ffffff;">Plan de desarrollo</h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/plandesarrollonivel4listarregistros') }}">Consultar</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/plandesarrollo') }}">Arbol del plan</a></li>
                                  </ul>
                            </div>
                        </div>

                        <!-- MENU ICONO - Plan indicativo -->
                        <div class="col-sm-2">
                            <div class="card text-center text-white bg-warning mb-3" style="background-color: #363636;border-radius: 10px 10px 10px 10px;">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono9.png") }}" alt="Estrategov" width="30%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#ffffff;">Plan indicativo</h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/planindicativolistar') }}">Consultar</a></li>
                                </ul>
                            </div>
                        </div>
                    
                        <!-- MENU ICONO - Plan de accion -->
                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-warning mb-3" style="background-color: #363636;border-radius: 10px 10px 10px 10px;">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono12.png") }}" alt="Estrategov" width="30%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#ffffff;">Plan de accion 2021</h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a style="color:#adadad;font-size: 12px;" href="{{ url('/home') }}">Consultar</a></li>

                                    @if ((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('editor')))
                                        @php ($aux = Auth::user()->oficina_id) @endphp
                                        <li class="list-group-item"><a style="color:#adadad;font-size: 16px;" href="{{ url('/home') }}"><b>Reportar tareas</b></a></li>
                                    @endif

                                    @if ((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('editor')))
                                        <li class="list-group-item"><a style="color:#adadad;font-size: 12px;" href="{{ url('/home') }}">Cronologico tareas reportadas</a></li>
                                    @endif

                                    @if ((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('editor')))
                                        @php ($aux = Auth::user()->oficina_id) @endphp    
                                        <li class="list-group-item"><a style="color:#adadad;font-size: 12px;" href="{{ url('/home') }}">Avance de ejecucion</a></li>
                                    @endif

                                    @if ((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('editor')))
                                        @php ($aux = Auth::user()->oficina_id) @endphp  
                                        <li class="list-group-item"><a style="color:#adadad;font-size: 12px;" href="{{ url('/home') }}">Ponderado ejecucion actividades</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>                  

                        <!-- MENU ICONO - Analitica de datos -->
                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-warning mb-3" style="background-color: #363636;border-radius: 10px 10px 10px 10px;">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono15.png") }}" alt="Estrategov" width="30%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#ffffff;">Analitica de datos</h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/graficaplancomponentes') }}">Distribucion del plan</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/graficaplanresponsables') }}">Distribucion por secretarias</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/graficaplanods') }}">Distribucion por ODS</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/graficaplanmipg') }}">Distribucion por MIPG</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/graficaplanppmunicipal') }}">Distribucion por Politicas Publicas</a></li>
                                    <li class="list-group-item"><a style="color:#adadad;font-size: 12px;" href="{{ url('/home') }}">Avance plan de accion 2021</a></li>
                                    <li class="list-group-item"><a style="color:#adadad;font-size: 12px;" href="{{ url('/home') }}">Avance plan de desarrollo 2021</a></li>
                                    <li class="list-group-item"><a style="color:#adadad;font-size: 12px;" href="{{ url('/home') }}">Semaforos de cumplimiento 2021</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- MENU ICONO - Documentos tecnicos -->
                        <div class="col-sm-2">
                            <div class="card text-center text-white bg-warning mb-3" style="background-color: #363636;border-radius: 10px 10px 10px 10px;">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono_pdf.png") }}" alt="Estrategov" width="30%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#ffffff;">Documentos tecnicos</h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" target="_blank" href="{{ url('https://plandesarrollo.dosquebradas.gov.co/repositorio/1%20-%20PLAN%20DE%20DESARROLLO%20PARA%20IMPRIMIR.pdf') }}">Libro Digital</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" target="_blank" href="{{ url('https://plandesarrollo.dosquebradas.gov.co/repositorio/3%20-%20Anexo%20A%20-%20Dosquebradas%20Solidaria%20(COVID-19).pdf') }}">Anexo A | COVID19</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" target="_blank" href="{{ url('https://plandesarrollo.dosquebradas.gov.co/repositorio/4%20-%20Anexo%20B%20-%20Diagn%C3%B3stico%20estrat%C3%A9gico%20NNAJ.pdf') }}">Anexo B | NNAJ</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" target="_blank" href="{{ url('https://plandesarrollo.dosquebradas.gov.co/repositorio/5%20-%20Anexo%20C%20-%20Plan%20Territorial%20de%20Salud.pdf') }}">Anexo C | PTS</a></li>
                                
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" target="_blank" href="{{ url('https://plandesarrollo.dosquebradas.gov.co/repositorio/ppi-2020-2023/CENTRAL_PLAN%20PLURIANUAL%20DE%20INVERSIONES%202020_2023_DDAS.pdf') }}">PPI | Central</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" target="_blank" href="{{ url('https://plandesarrollo.dosquebradas.gov.co/repositorio/ppi-2020-2023/IDM_PLAN%20PLURIANUAL%20DE%20INVERSIONES%202020_2023_DDAS.pdf') }}">PPI | IDM</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" target="_blank" href="{{ url('https://plandesarrollo.dosquebradas.gov.co/repositorio/ppi-2020-2023/BOMBEROS_PLAN%20PLURIANUAL%20DE%20INVERSIONES%202020_2023_DDAS.pdf') }}">PPI | Bomberos</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" target="_blank" href="{{ url('https://plandesarrollo.dosquebradas.gov.co/repositorio/ppi-2020-2023/SERVICIUDAD_PLAN%20PLURIANUAL%20DE%20INVERSIONES%202020_2023_DDAS.pdf') }}">PPI | Serviciudad</a></li>
                                </ul>
                            </div>
                        </div>                          
                    </div>

                    <!-- MENU - Fila 2 -->
                    <div class="row">
                        <!-- MENU ICONO - Objetivos ODS -->
                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-success mb-3" style="background-color: #363636;border-radius: 10px 10px 10px 10px;">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono_ods.png") }}" alt="Estrategov" width="30%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#ffffff;">Objetivos ODS</h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/ods') }}">Conocer los objetivos</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/odslistarconvergencia') }}">Convergencia a los ODS</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- MENU ICONO - Politicas MIPG -->
                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-success mb-3" style="background-color: #363636;border-radius: 10px 10px 10px 10px;">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono_mipg.png") }}" alt="Estrategov" width="30%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#ffffff;">Politicas MIPG</h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/mipg') }}">Conocer las politicas</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/mipglistarconvergencia') }}">Convergencia politicas MIPG</a></li>
                                  </ul>
                            </div>
                        </div>

                        <!-- MENU ICONO - Plan y politicas publicas -->
                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-success mb-3" style="background-color: #363636;border-radius: 10px 10px 10px 10px;">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono7.png") }}" alt="Estrategov" width="30%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#ffffff;">Plan y politicas publicas</h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/pndesarrollo') }}">Plan nacional de desarrollo</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/ppmunicipal') }}">Politicas publicas municipales</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/ppmunicipallistarconvergencia') }}">Convergencia politicas municipales</a></li>
                                  </ul>
                            </div>
                        </div>

                        <!-- MENU ICONO - Informacion institucional -->
                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-success mb-3" style="background-color: #363636;border-radius: 10px 10px 10px 10px;">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono16.png") }}" alt="Estrategov" width="30%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#ffffff;">Informacion institucional</h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/administracion') }}">Datos de la administracion</a></li>
                                    <li class="list-group-item"><a style="color:#000000;font-size: 12px;" href="{{ url('/entidadoficina') }}">Gabinete municipal</a></li>
                                  </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
