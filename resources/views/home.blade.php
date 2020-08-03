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
                        <div class="col-sm-2">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono2.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#000000;"><b>Plan de desarrollo</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ url('/plandesarrollo') }}">Arbol del plan</a></li>
                                    <li class="list-group-item"><a href="{{ url('/plandesarrollonivel4listarregistros') }}">Consultar el plan</a></li>
                                  </ul>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono9.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#000000;"><b>Plan indicativo</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ url('/planindicativolistar') }}">Consultar el plan</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono12.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#000000;"><b>Plan de accion</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ url('/planaccionlistar') }}">Consultar el plan</a></li>
                                </ul>
                            </div>
                        </div>                  

                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono15.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#000000;"><b>Analitica de datos</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ url('/graficaplancomponentes') }}">Distribucion del plan</a></li>
                                    <li class="list-group-item"><a href="{{ url('/graficaplanresponsables') }}">Distribucion por secretarias</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono_pdf.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#000000;"><b>PDF Documentos tecnicos</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a target="_blank" href="{{ url('https://plandesarrollo.dosquebradas.gov.co/repositorio/1%20-%20PLAN%20DE%20DESARROLLO%20PARA%20IMPRIMIR.pdf') }}">Libro Digital</a></li>
                                    <li class="list-group-item"><a target="_blank" href="{{ url('https://plandesarrollo.dosquebradas.gov.co/repositorio/3%20-%20Anexo%20A%20-%20Dosquebradas%20Solidaria%20(COVID-19).pdf') }}">Anexo A - COVID19</a></li>
                                    <li class="list-group-item"><a target="_blank" href="{{ url('https://plandesarrollo.dosquebradas.gov.co/repositorio/4%20-%20Anexo%20B%20-%20Diagn%C3%B3stico%20estrat%C3%A9gico%20NNAJ.pdf') }}">Anexo B - NNAJ</a></li>
                                    <li class="list-group-item"><a target="_blank" href="{{ url('https://plandesarrollo.dosquebradas.gov.co/repositorio/5%20-%20Anexo%20C%20-%20Plan%20Territorial%20de%20Salud.pdf') }}">Anexo C - PTS</a></li>
                                  </ul>
                            </div>
                        </div>                          
                    </div>

                    <!-- MENU - Fila 2 -->
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono_ods.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#000000;"><b>Objetivos ODS</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ url('/ods') }}">Conocer los objetivos</a></li>
                                  </ul>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono_mipg.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#000000;"><b>Politicas MIPG</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ url('/mipg') }}">Conocer las politicas</a></li>
                                  </ul>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono7.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#000000;"><b>Plan y politicas publicas</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ url('/pndesarrollo') }}">Plan nacional de desarrollo</a></li>
                                    <li class="list-group-item"><a href="{{ url('/ppmunicipal') }}">Politicas publicas municipales</a></li>
                                  </ul>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><br><img class="card-img-top" src="{{ asset("images/iconos/icono16.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#000000;"><b>Informacion institucional</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ url('/administracion') }}">Datos de la administracion</a></li>
                                    <li class="list-group-item"><a href="{{ url('/entidadoficina') }}">Gabinete municipal</a></li>
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
