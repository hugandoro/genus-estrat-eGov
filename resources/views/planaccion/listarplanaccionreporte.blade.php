@extends('layouts.app')
@section('content')

<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Plan de Desarrollo | <b>Plan de Accion 2020 - Reporte tareas realizadas</b></h3></div>
          <div class="pull-right">

            <!-- Formulario para filtro de consulta por SECRETARIAS -->
            <form method="GET" action="{{ url('/planaccionlistarreporte') }}" role="form" enctype="multipart/form-data">
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
                        <td style="width:5%;" colspan="1"></td>
                        <td style="width:95%;" colspan="7">
                          <table id="mytable" class="table table-bordered table-dark">
                            <tr>
                              <th style="width:65%;">Accion</th>
                              <th style="width:10%;">KPI</th>
                              <th style="width:5%;">Objetivo</th>
                              <th style="width:10%;">Ponderacion</th>
                              <th style="width:20%;">Opciones</th>
                            </tr>

                            @foreach($medicionIndicador as $indicador) 
                              @if($indicador->nivel4_id == $Nivel4->id)
                                
                                @foreach($planIndicativo as $indicativo) 
                                  @if(($indicativo->indicador_id == $indicador->id) && ($indicativo->vigencia_id == '12'))

                                    @foreach($planAccion as $accion) 
                                      @if($accion->plan_indicativo_id == $indicativo->id)

                                        <!-- Registos PLAN DE accion -->
                                        <tr>
                                          <td style="width:30%;font-size:11px;">{{$accion->descripcion}}</td>
                                          <td style="width:25%;font-size:11px;">{{$accion->kpi}}</td>
                                          <td style="width:15%;font-size:11px;">{{$accion->objetivo}}</td>
                                          <td style="width:10%;font-size:11px;">{{$accion->ponderacion * 100}} %</td>
                                          <td style="width:20%;">

                                            <!-- Valida si es un usuario (SUPERADMINISTRADOR O ADMINISTRADOR) o si es un usuario (EDITOR asignado a la DEPENDENCIA) responable de esa actividad Nivel 4 -->
                                            @if( (Auth::user()->hasRole('super')) || (Auth::user()->hasRole('editor') && (Auth::user()->oficina_id) == $Nivel4->oficina_id) )
                                              <a class="btn btn-success" href="{{ url('tarea/create?idAccion='.$accion->id.'&kpi='.$accion->kpi.'&kpiObjetivo='.$accion->objetivo) }}" ><span class="glyphicon glyphicon-plus"></span>  Reportar</a>
                                            @endif
                                            <!-- Fin de la validacion de permisos para reportar -->

                                          </td>
                                        </tr>

                                        <!-- Registros de las TAREAS reportadas -->
                                        <tr>
                                          <td style="width:95%;" colspan="5">
                                            <table id="mytable" class="table table-bordered table-dark" style="background: #ffffff;">
                                              <tr>
                                                <th style="width:15%;">Fecha</th>
                                                <th style="width:50%;">Tarea realizada</th>
                                                <th style="width:15%;">Impacto al KPI</th>
                                                <th style="width:20%;">Opciones</th>
                                              </tr>

                                              <!-- Listado de las tareas reportadas -->
                                              @php $acumImpactoKPI = 0; @endphp <!-- Inicializa Contador acumulado de impacto KPI -->

                                              @foreach ($tarea as $registro)
                                                @if($registro->accion_id == $accion->id)

                                                <tr>
                                                  <td style="width:15%;">{{$registro->fecha_realizacion}}</td>
                                                  <td style="width:50%;">{{$registro->descripcion}}</td>
                                                  <td style="width:15%;">{{$registro->impacto_kpi}}</td>
                                                  <td style="width:20%;">
                                                    
                                                    <a href="{{ route('tarea.show',$registro->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-zoom-in"></span></a>

                                                    <!-- Ocpiones de EDICION y ELIMINAR -->
                                                    <!-- Valida si es un usuario (SUPERADMINISTRADOR O ADMINISTRADOR) o si es un usuario (EDITOR asignado a la DEPENDENCIA) responable de esa actividad Nivel 4 -->
                                                    @if( (Auth::user()->hasRole('super')) || (Auth::user()->hasRole('editor') && (Auth::user()->oficina_id) == $Nivel4->oficina_id) )
                                                      
                                                      <!-- Calcula la diferencia de horas entre Fecha de Reporte y Fecha actual -->
                                                      @php 
                                                        $fechaCreado = $registro->created_at;
                                                        $fechaActual = new DateTime(); 
                                                      @endphp

                                                      <!-- Valida si supera el filtro de las 24 horas permitidas para editar -->
                                                      <!-- Tambien se incluye filtro en la vista "edit.blade.php" -->
                                                      @if ($fechaActual->diff($fechaCreado)->days <= 1 )
                                                        <form action="{{ route('tarea.destroy',$registro->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                                          <input type="hidden" name="_method" value="DELETE">
                                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                          <a href="{{ route('tarea.edit',$registro->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                                                          <button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>
                                                        </form>
                                                      @else
                                                        <form action="{{ route('tarea.destroy',$registro->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                          <a href="{{ route('tarea.show',$registro->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-zoom-in"></span></a>
                                                        </form>
                                                      @endif

                                                    @endif
                                                    <!-- Fin de los botones de opciones -->

                                                  </td>
                                                  @php $acumImpactoKPI = $acumImpactoKPI + $registro->impacto_kpi; @endphp <!-- Acumula el impacto al KPI reportado en las tareas -->
                                                </tr>

                                                @endif
                                              @endforeach
                                              <!-- Fin listado tareas reportadas -->

                                              <tr style="color: #ffffff; background-color: #999999;">
                                                <td style="width:15%;"></td>
                                                <td style="width:50%;"><h5>Sumatoria impacto al KPI</h5></td>
                                                <td style="width:15%;"><h4>{{ $acumImpactoKPI }} de <b>{{$accion->objetivo}}</b></h4></td>
                                                @if (($accion->objetivo != '') && ($accion->objetivo > '0'))
                                                  <td style="width:20%;"><h4>{{ (($acumImpactoKPI * 1 )/$accion->objetivo) * 100 }} %</h4></td>
                                                @else
                                                  <td style="width:20%;"><h4>0 %</h4></td>
                                                @endif
                                              </tr>

                                            </table>
                                          </td>
                                        </tr>

                                      @endif
                                    @endforeach

                                  @endif
                                @endforeach

                              @endif
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

            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection