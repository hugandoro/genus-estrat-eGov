@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Plan de Desarrollo | <b>Plan de Accion 2020</b></h3></div>
          <div class="pull-right">

            <!-- Formulario para filtro de consulta por SECRETARIAS -->
            <form method="GET" action="{{ url('/planaccionlistar') }}" role="form" enctype="multipart/form-data">
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
                     <tr>
                      @foreach($planDesarrollo as $plandesarrollo) 
                        <th>Codigo</th>
                        <th>{{$plandesarrollo->nombre_nivel4}}</th>
                        <th>Indicador</th>
                        <th>Tipo</th>
                        <th>Objetivo</th>
                        <th></th>
                        <th>2020</th>
                        <th>Responsable</th>
                      @endforeach 
                     </tr>

                     @foreach($planDesarrolloNivel4 as $Nivel4) 
                      <tr>
                        <td style="width:5%">{{$Nivel4->nivel3->nivel2->nivel1->numeral}}.{{$Nivel4->nivel3->nivel2->numeral}}.{{$Nivel4->nivel3->numeral}}.{{$Nivel4->numeral}}</td>
                        <td style="width:25%">{{$Nivel4->nombre}}</td>

                        <!-- Busca INDICADORES relacionados con el NIVEL4 -->
                        @foreach($medicionIndicador as $indicador) 
                          @if($indicador->nivel4_id == $Nivel4->id)
                            <td style="width:5%;font-size:15px;">{{$indicador->nombre}}</td>
                            <td style="width:5%;font-size:10px;">{{$indicador->Tipo->nombre}}</td>
                            
                            <!-- Validacion dato a mostrar segun el tipo (Incremento - Mantenimiento) -->
                            @if($indicador->tipo_id == 3)
                              <td style="width:5%">{{$indicador->meta}}</td>
                            @else
                              <td style="width:5%">{{$indicador->objetivo}}</td>
                            @endif
                            <td style="width:5%;font-size:10px;">{{$indicador->Medida->nombre}}</td>

                            <!-- Busca EL PLAN INDICATIVO relacionado con el INDICADOR y la VIGENCIA -->
                            @foreach($planIndicativo as $indicativo) 
                              @if(($indicativo->indicador_id == $indicador->id) && ($indicativo->vigencia_id == '12'))
                                <td style="width:5%">{{$indicativo->valor}}</td>
                              @endif
                            @endforeach
                          @endif
                        @endforeach

                        <td style="width:15%;font-size:10px;">{{$Nivel4->entidadOficina->nombre}}</td>
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
                          <table id="mytable" class="table table-bordered table-dark">
                            <tr>
                              <th style="width:65%;">Accion</th>
                              <th style="width:10%;">KPI</th>
                              <th style="width:5%;">Objetivo</th>
                              <th style="width:10%;">Ponderacion</th>
                              <th style="width:20%;">Opciones</th>
                            </tr>

                            @php $acumPonderadoAccion = 0; @endphp <!-- Inicializa Contador acumulado de ponderacion para mostar en pantalla por Nivel 4 -->

                            @foreach($medicionIndicador as $indicador) 
                              @if($indicador->nivel4_id == $Nivel4->id)
                                
                                @foreach($planIndicativo as $indicativo) 
                                  @if(($indicativo->indicador_id == $indicador->id) && ($indicativo->vigencia_id == '12'))

                                    @foreach($planAccion as $accion) 
                                      @if($accion->plan_indicativo_id == $indicativo->id)

                                        <tr>
                                          <td style="width:30%;font-size:11px;">{{$accion->descripcion}}</td>
                                          <td style="width:25%;font-size:11px;">{{$accion->kpi}}</td>
                                          <td style="width:15%;font-size:11px;">{{$accion->objetivo}}</td>
                                          <td style="width:10%;font-size:11px;">{{$accion->ponderacion * 100}} %</td>
                                          @php $acumPonderadoAccion = $acumPonderadoAccion + $accion->ponderacion; @endphp <!-- Acumula la ponderacion para mostar en pantalla por Nivel 4 -->
                                          <td style="width:20%;"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Reportar</button></td>
                                        </tr>

                                      @endif
                                    @endforeach

                                  @endif
                                @endforeach

                              @endif
                            @endforeach

                            <!-- Mostrar totales al final de cada Tabla que conforma un plan de accion -->
                            <tr>
                              <th style="width:30%;"></th>
                              <th style="width:25%;"></th>
                              <th style="width:15%;"></th>
                              @if ( $acumPonderadoAccion == 1 ) <!-- Sumas a 100% -->
                                <th style="width:10%;background:rgb(205, 250, 180);">{{ $acumPonderadoAccion * 100 }} %</th>
                              @else
                                <th style="width:10%;background:rgb(252, 188, 188);">{{ $acumPonderadoAccion * 100 }} %</th>
                              @endif
                              <th style="width:20%;"></th>
                            </tr>
                            <!-- Fin tabla totales -->

                          </table>
                        </td>
                      </tr>

                      <tr><td colspan="9"></td></tr>
                     @endforeach 

                     
                     @if (count($planDesarrolloNivel4))
                          {{ $pagination }}
                      @endif

                    </tbody>
                  </table>
                </td>
              </tr>

            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection