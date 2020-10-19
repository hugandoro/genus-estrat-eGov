@extends('layouts.app')
@section('content')

<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Plan de Desarrollo | <b>Plan de Accion 2020 - Niveles de avance y ejecución</b></h3></div>
          <div class="pull-right">

            <!-- Formulario para filtro de consulta por SECRETARIAS -->
            <form method="GET" action="{{ url('/planaccionlistaravance') }}" role="form" enctype="multipart/form-data">
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
                        <th>Medicion</th>
                        <th>2020</th>
                        <th>Responsable</th>
                      @endforeach 
                     </tr>

                     <!-- Inicia contador numero de acciones inscritas - Agrupado por consulta general -->
                     @php $acumAccionesGeneral = 0; @endphp
                     <!-- Inicia acumulador porcentaje de cumplimiento de los KPI - Agrupado por acciones consulta general  -->
                     @php $acumImpactoKPIGeneral = 0; @endphp

                     @foreach($planDesarrolloNivel4 as $Nivel4) 
                      <tr>
                        <td style="width:5%;font-size:20px;font-weight: bold;">{{$Nivel4->nivel3->nivel2->nivel1->numeral}}.{{$Nivel4->nivel3->nivel2->numeral}}.{{$Nivel4->nivel3->numeral}}.{{$Nivel4->numeral}}</td>
                        <td style="width:25%">{{$Nivel4->nombre}}</td>

                        <!-- Busca INDICADORES relacionados con el NIVEL4 -->
                        @foreach($medicionIndicador as $indicador) 
                          @if($indicador->nivel4_id == $Nivel4->id)
                            <td style="width:5%;font-size:15px;">{{$indicador->nombre}}</td>
                            <td style="width:5%;font-size:10px;">{{$indicador->Tipo->nombre}}</td>
                            <td style="width:5%;font-size:10px;">{{$indicador->Medida->nombre}}</td>

                            <!-- Busca EL PLAN INDICATIVO relacionado con el INDICADOR y la VIGENCIA -->
                            @foreach($planIndicativo as $indicativo) 
                              @if(($indicativo->indicador_id == $indicador->id) && ($indicativo->vigencia_id == '12'))
                              
                                @if($indicador->Medida->id == 2)
                                  <td style="width:5%">{{$indicativo->valor * 100}} %</td> <!-- Meta porcentual - Multiplica por 100 -->
                                @else
                                  <td style="width:5%">{{$indicativo->valor}}</td> <!-- Meta numerica o en puntos -->
                                @endif

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
                        <td style="width:95%;" colspan="7">
                          <table id="mytable" class="table table-bordered table-dark">
                            <tr>
                              <th style="width:50%;">Accion</th>
                              <th style="width:15%;">KPI</th>
                              <th style="width:5%;">Objetivo</th>
                              <th style="width:10%;">Acumulado reportado</th>
                              <th style="width:10%;">Porcentaje cumplimiento</th>
                            </tr>

                            @foreach($medicionIndicador->where('nivel4_id',$Nivel4->id) as $indicador) 
                              {{-- @if($indicador->nivel4_id == $Nivel4->id) --}}
                                
                                @foreach($planIndicativo->where('indicador_id',$indicador->id)->where('vigencia_id','12') as $indicativo) 
                                  {{-- @if(($indicativo->indicador_id == $indicador->id) && ($indicativo->vigencia_id == '12')) --}}

                                    @foreach($planAccion->where('plan_indicativo_id',$indicativo->id) as $accion) 
                                      {{-- @if($accion->plan_indicativo_id == $indicativo->id) --}}

                                        <!-- Registos PLAN DE accion -->
                                        <tr>
                                          <td style="width:60%;font-size:11px;">{{$accion->descripcion}}</td>
                                          <td style="width:15%;font-size:11px;">{{$accion->kpi}}</td>
                                          <td style="width:5%;font-size:11px;">{{$accion->objetivo}}</td>

                                          <!-- Acumulados KPI de las tareas reportadas -->
                                          @php $acumImpactoKPI = 0; @endphp <!-- Inicializa Contador acumulado de impacto KPI -->

                                          @foreach ($tarea->where('accion_id',$accion->id) as $registro)
                                            {{-- @if($registro->accion_id == $accion->id) --}}
                                              @php $acumImpactoKPI = $acumImpactoKPI + $registro->impacto_kpi; @endphp <!-- Acumula el impacto al KPI reportado en las tareas -->
                                            {{-- @endif --}}
                                          @endforeach
                                          
                                          <!-- Fin acumulado KPI tareas reportadas -->

                                          <!-- Mostrar en la grilla en pantalla el acumulado de KPI y el calculo porcentaje de cumplimiento -->
                                          <td style="width:10%;">{{ $acumImpactoKPI }} / <b>{{$accion->objetivo}}</b></td>
                                          @if (($accion->objetivo != '') && ($accion->objetivo > '0'))
                                            <td style="width:10%;">{{ round(((($acumImpactoKPI * 1 )/$accion->objetivo) * 100),2) }} %</td>
                                          @else
                                            <td style="width:10%;">0 %</td>
                                          @endif
                                          <!-- Fin mostrar grilla de resultado -->
                                        </tr>

                                        <!-- Acumulado porcentaje de cumplimiento de los KPI - Agrupado por acciones consulta general  -->
                                        @if (($accion->objetivo != '') && ($accion->objetivo > '0')) <!-- Evita division Zero cuando no se tiene objetivo -->
                                          @if (round(((($acumImpactoKPI * 1 )/$accion->objetivo) * 100),2) <= 100)
                                            @php $acumImpactoKPIGeneral = $acumImpactoKPIGeneral + round(((($acumImpactoKPI * 1 )/$accion->objetivo) * 100),2); @endphp
                                          @else
                                            @php $acumImpactoKPIGeneral = $acumImpactoKPIGeneral + 100; @endphp <!-- Limita a 100 en caso de sobreejecucion -->
                                          @endif
                                        @endif
                                        <!-- Fin Acumulado porcentaje de cumplimiento de los KPI -->

                                        <!-- Numero de acciones inscritas - Agrupado por consulta general -->
                                        @php $acumAccionesGeneral = $acumAccionesGeneral + 1; @endphp

                                      {{-- @endif --}}
                                    @endforeach

                                  {{-- @endif --}}
                                @endforeach

                              {{-- @endif --}}
                            @endforeach


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

              <tr>
                <td><h4><b>{{ $acumAccionesGeneral }}</b> | Acciones</h4></td>
              </tr>

              <tr>
                @if ($acumAccionesGeneral != 0)
                  <td><h1><b>{{ round(($acumImpactoKPIGeneral/$acumAccionesGeneral),2) }} %</b></h1><h4>Porcentaje promedio de cumplimiento | Plan de Accion</h4></td>
                @else
                  <td><h1><b>0 %</b></h1><h4>Porcentaje promedio de cumplimiento | Plan de Accion</h4></td>
                @endif
              </tr>

            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection