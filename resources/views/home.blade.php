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
                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><img class="card-img-top" src="{{ asset("images/iconos/icono2.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title"><b>PLAN DE DESARROLLO</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ url('/plandesarrollo') }}">Arbol del plan</a></li>
                                    <li class="list-group-item"><a href="{{ url('/plandesarrollonivel4listarregistros') }}">Listar contenido</a></li>
                                  </ul>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><img class="card-img-top" src="{{ asset("images/iconos/icono9.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title"><b>PLAN INDICATIVO</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ url('/planindicativolistar') }}">Listar contenido</a></li>
                                  </ul>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><img class="card-img-top" src="{{ asset("images/iconos/icono12.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title"><b>PLAN DE ACCION</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="#">Reportar</a></li>
                                    <li class="list-group-item"><a href="#">Listar contenido</a></li>
                                  </ul>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><img class="card-img-top" src="{{ asset("images/iconos/icono15.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title"><b>ANALITICA</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="#">Infografia del plan</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- MENU - Fila 2 -->
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><img class="card-img-top" src="{{ asset("images/iconos/icono_ods.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title"><b>ODS</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ url('/ods') }}">Conocer los objetivos</a></li>
                                  </ul>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><img class="card-img-top" src="{{ asset("images/iconos/icono_mipg.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title"><b>MIPG</b></h5>
                                    <!--<<p class="card-text">Texto que describe</p>-->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ url('/mipg') }}">Conocer las politicas</a></li>
                                  </ul>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card text-center text-white bg-info mb-3">
                                <div><img class="card-img-top" src="{{ asset("images/iconos/icono7.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title"><b>PLAN Y POLITICAS PUBLICAS</b></h5>
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
                                <div><img class="card-img-top" src="{{ asset("images/iconos/icono16.png") }}" alt="Estrategov" width="35%"></div>
                                <div class="card-body">
                                    <h5 class="card-title"><b>INFORMACION INSTITUCIONAL</b></h5>
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
