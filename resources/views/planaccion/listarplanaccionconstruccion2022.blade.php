@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-10 col-md-offset-1">
    <!-- <div class="col-md-8 col-md-offset-2"> -->

      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Plan de Desarrollo | <b>CONSTRUCCION Plan de Accion 2022</b></h3></div>
          <div class="pull-right">

            <!-- Formulario para filtro de consulta por SECRETARIAS -->
            <form method="GET" action="{{ url('/planaccionconstruir2022') }}" role="form" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <table>
                <tr>
                  <td>
                    <div class="form-group">

                      <select class="form-control" name="filtroSecretaria">
                        <option value='9999' selected>Todos los registros</option>
                        @foreach($entidadOficina as $secretaria) 
                            @if((isset($_GET['filtroSecretaria'])) && ($secretaria->id == $_GET['filtroSecretaria']))
                              <option value={{ $secretaria->id }} selected>{{ $secretaria->nombre }}</option>
                            @else
                              <option value={{ $secretaria->id }}>{{ $secretaria->nombre }}</option>
                            @endif
                        @endforeach
                      </select> 

                      <td>
                        <div class="form-group">
                          @if(isset($_GET['filtroactividad']))
                            <input class="form-control" placeholder="N° Actividad..." name="filtroactividad" type="number" id="filtroactividad" value= {{ $_GET['filtroactividad'] }}> 
                          @else
                            <input class="form-control" placeholder="N° Actividad..." name="filtroactividad" type="number" id="filtroactividad"> 
                          @endif
                        </div>
                      </td>
    
                      <td>
                        <div class="form-group">
                          @if(isset($_GET['filtropalabras']))
                            <input class="form-control" placeholder="Palabras clave..." name="filtropalabras" type="text" id="filtropalabras" value= {{ $_GET['filtropalabras'] }}> 
                          @else
                            <input class="form-control" placeholder="Palabras clave..." name="filtropalabras" type="text" id="filtropalabras"> 
                          @endif
                        </div>
                      </td>

                    </div>
                  </td>
                  <td valign="top">
                      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Filtrar</button>
                  <td>
                </tr>
              </table>
            </form>
          <!-- Fin del formulario de filtros -->


          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <tbody>

              @foreach($planDesarrollo as $plandesarrollo) 
                <tr>
                  <th class="bg-info"><h3>{{$plandesarrollo->administracion->slogan}}</h3></th>
                </tr>
              @endforeach 

              <tr>
                <td>
                  <!-- Datos generales -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>

                     <!-- Inicia contador numero de acciones inscritas - Agrupado por consulta general -->
                     @php $acumAccionesGeneral = 0; @endphp

                     @foreach($planDesarrolloNivel4 as $Nivel4) 
                      <tr>
                        <th>Codigo</th>
                        <th>{{$plandesarrollo->nombre_nivel4}}</th>
                        <th>Indicador</th>
                        <th>Tipo</th>
                        <th>Medicion</th>
                        <th>Obj. 2022</th>
                        <th>Rezago 2021</th>
                        <th>Responsable</th>
                        <th>Opciones</th>
                      </tr>

                      <tr>
                        <td style="width:5%;font-size:28px;"><b>{{$Nivel4->numeral}}</b></td>
                        <td style="width:20%">{{$Nivel4->nombre}}</td>

                        <!-- Busca INDICADORES relacionados con el NIVEL4 -->
                        @foreach($medicionIndicador as $indicador) 
                          @if($indicador->nivel4_id == $Nivel4->id)
                            <td style="width:5%;font-size:15px;">{{$indicador->nombre}}</td>
                            <td style="width:5%;font-size:10px;">{{$indicador->Tipo->nombre}}</td>
                            <td style="width:5%;font-size:10px;">{{$indicador->Medida->nombre}}</td>

                            <!-- Busca EL PLAN INDICATIVO relacionado con el INDICADOR y la VIGENCIA -->
                            @foreach($planIndicativo as $indicativo) 
                              @if(($indicativo->indicador_id == $indicador->id) && ($indicativo->vigencia_id == '14')) <!-- *** CUIDADO *** CON EL CODIGO SEGUN LA VIGENCIA -->
                                
                                @php $auxIndicativo = $indicativo->id; @endphp <!-- Codigo del plan indicativo para encadenar con el boton de inscribir actividades -->

                                @if($indicador->Medida->id == 2)
                                  <td style="width:5%">{{$indicativo->valor * 100}} %</td> <!-- Meta porcentual - Multiplica por 100 -->
                                @else
                                  <td style="width:5%">{{$indicativo->valor}}</td> <!-- Meta numerica o en puntos -->
                                @endif

                              @endif
                            @endforeach

                            <!-- Busca EL REZAGO 2021 PLAN INDICATIVO relacionado con el INDICADOR -->
                            @foreach($planIndicativoRezago2021 as $indicativoRezago) 
                              @if($indicativoRezago->indicador_id == $indicador->id) 

                                @if($indicativoRezago->rezago != 0)
                                  @if($indicador->Medida->id == 2)
                                    <td style="width:5%;background:rgb(252, 188, 188);">{{round($indicativoRezago->rezago * 100,4)}} %</td> <!-- Meta porcentual - Multiplica por 100 -->
                                  @else
                                    <td style="width:5%;background:rgb(252, 188, 188);">{{round($indicativoRezago->rezago,4)}}</td> <!-- Meta numerica o en puntos -->
                                  @endif
                                @else
                                  @if($indicador->Medida->id == 2)
                                    <td style="width:5%;background:rgb(205, 250, 180);">{{round($indicativoRezago->rezago * 100,4)}} %</td> <!-- Meta porcentual - Multiplica por 100 -->
                                  @else
                                    <td style="width:5%;background:rgb(205, 250, 180);">{{round($indicativoRezago->rezago,4)}}</td> <!-- Meta numerica o en puntos -->
                                  @endif
                                @endif

                              @endif
                            @endforeach

                          @endif
                        @endforeach

                        <td style="width:10%;font-size:10px;">{{$Nivel4->entidadOficina->nombre}}</td>

                        <td style="width:5%;font-size:10px;">
                        @if( (Auth::user()->hasRole('super')) || (Auth::user()->hasRole('editor') && (Auth::user()->oficina_id) == $Nivel4->oficina_id) )
                           <a class="btn btn-success" href="{{ url('acciones/create?idIndicativo='.$auxIndicativo.'&idNivel4='.$Nivel4->id) }}" ><span class="glyphicon glyphicon-plus"></span>  Inscribir acción</a>
                           <!--<a class="btn btn-info" href="#" ><span class="glyphicon glyphicon-plus"></span>  Inscribir acción</a>-->
                        @endif
                        </td>

                      </tr>

                      <!--<tr>
                        <td style="width:30%;" colspan="2"></td>
                        <td style="width:70%;" colspan="7">
                          <b>Plan de Accion - Vigencia 2020</b></td>
                        </td>
                      </tr>-->

                      <!-- Busca las ACCIONES inscritas para el PLAN INDICATIVO respectivo - PLAN DE ACCION -->
                      <tr>
                        <td style="width:5%;" colspan="1"></td>
                        <td style="width:95%;" colspan="8">
                          <table id="mytable" class="table table-bordered" style="background-color: #EBF5FB;">
                            <tr>
                              <th style="width:10%;">Opciones</th>
                              <th style="width:65%;">Accion</th>
                              <th style="width:10%;">KPI</th>
                              <th style="width:5%;">Objetivo</th>
                              <th style="width:10%;">Ponderacion</th>
                            </tr>

                            @php $acumPonderadoAccion = 0; @endphp <!-- Inicializa Contador acumulado de ponderacion para mostar en pantalla por Nivel 4 -->

                            @foreach($medicionIndicador as $indicador) 
                              @if($indicador->nivel4_id == $Nivel4->id)
                                
                                @foreach($planIndicativo as $indicativo) 
                                  @if(($indicativo->indicador_id == $indicador->id) && ($indicativo->vigencia_id == '14')) <!-- *** CUIDADO *** CON EL CODIGO SEGUN LA VIGENCIA -->

                                    @foreach($planAccion as $accion) 
                                      @if($accion->plan_indicativo_id == $indicativo->id)

                                        <tr>
                                          <td style="width:10%;font-size:11px;">
                                            <form action="{{ route('acciones.destroy',$accion->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                              <input type="hidden" name="_method" value="DELETE">
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                              <input type="hidden" name="nivel4_id" value="{{ $Nivel4->id }}">

                                              <a href="{{ route('acciones.edit',$accion->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                                              <button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>
                                            </form>
                                          </td>
                                          <td style="width:65%;font-size:11px;">{{$accion->descripcion}}</td>
                                          <td style="width:10%;font-size:11px;">{{$accion->kpi}}</td>
                                          <td style="width:5%;font-size:11px;">{{$accion->objetivo}}</td>
                                          <td style="width:10%;font-size:11px;">{{$accion->ponderacion * 100}} %</td>

                                          <!-- Numero de acciones inscritas - Agrupado por consulta general -->
                                          @php $acumAccionesGeneral = $acumAccionesGeneral + 1; @endphp

                                          <!-- Sumatoria de los ponderados de las acciones agrupado por actividad -->
                                          @php $acumPonderadoAccion = $acumPonderadoAccion + $accion->ponderacion; @endphp <!-- Acumula la ponderacion para mostar en pantalla por Nivel 4 -->
                                        </tr>

                                      @endif
                                    @endforeach

                                  @endif
                                @endforeach

                              @endif
                            @endforeach

                            <!-- Mostrar totales al final de cada Tabla que conforma un plan de accion -->
                            <tr>
                              <th style="width:10%;"></th>
                              <th style="width:65%;"></th>
                              <th style="width:10%;"></th>
                              <th style="width:5%;"></th>
                              @if ( round($acumPonderadoAccion,2) == 1 ) <!-- Sumas a 100% -->
                                <th style="width:10%;background:rgb(0, 161, 53);color:#ffffff;font-size:20px;">{{ round($acumPonderadoAccion,2) * 100 }} %</th>
                              @else
                                <th style="width:10%;background:rgb(204, 6, 5);color:#ffffff;font-size:20px;">{{ round($acumPonderadoAccion,2) * 100 }} %</th>
                              @endif
                            </tr>
                            <!-- Fin tabla totales -->

                          </table>
                        </td>
                      </tr>

                      <tr><td colspan="10"></td></tr>

                     @endforeach 

                     
                     @if (count($planDesarrolloNivel4))
                          {{ $pagination }}
                      @endif

                    </tbody>
                  </table>
                </td>
              </tr>

              <!-- Boton para salir de vista simplificada y volver al listado -->
              <tr>
                <td>
                  <div class="pull-right">
                    @php ($aux = Auth::user()->oficina_id) @endphp
                    <a href="{{ url('/planaccionconstruir2022?filtroSecretaria=' . $aux)  }}"> <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> Volver al listado</button></a>
                  </div>
                </td>
              </tr>
              <!-- Fin boton de volver al listado -->

              <tr>
                <td><h4><b>{{ $acumAccionesGeneral }}</b> | Acciones</h4></td>
              </tr>

            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection