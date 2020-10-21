@extends('layouts.app')
@section('content')

<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Plan de Desarrollo | <b>Actividades (Metas) - Niveles de avance y ejecución</b></h3></div>
          <div class="pull-right">

            <!-- Formulario para filtro de consulta por SECRETARIAS -->
            <form method="GET" action="{{ url('/plandesarrollonivel4listaravance') }}" role="form" enctype="multipart/form-data">
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
                        <th>Objetivo 2020</th>
                        <th>Objetivo Cuatrienio</th>
                        <th>Responsable</th>
                      @endforeach 
                     </tr>

                     <!-- Inicia contador numero de acciones inscritas - Agrupado por consulta general -->
                     @php $acumAccionesGeneral = 0; @endphp
                     <!-- Inicia acumulador porcentaje de cumplimiento de los KPI - Agrupado por acciones consulta general  -->
                     @php $acumImpactoKPIGeneral = 0; @endphp

                     <!-- Inicia contador numero de actividades - Agrupado por consulta general -->
                     @php $acumNivel4General = 0; @endphp
                     <!-- Inicia acumulador porcentaje de cumplimiento de los indicadores - Vigencia 2020 -->
                     @php $acumImpactoIndicador2020General = 0; @endphp

                     @foreach($planDesarrolloNivel4 as $Nivel4) 
                      <tr>
                        <td style="width:10%;font-size:20px;font-weight: bold;">{{$Nivel4->nivel3->nivel2->nivel1->numeral}}.{{$Nivel4->nivel3->nivel2->numeral}}.{{$Nivel4->nivel3->numeral}}.{{$Nivel4->numeral}}</td>
                        <td style="width:40%">{{$Nivel4->nombre}}</td>

                        <!-- Busca INDICADORES relacionados con el NIVEL4 -->
                        @foreach($medicionIndicador as $indicador) 
                          @if($indicador->nivel4_id == $Nivel4->id)

                            <td style="width:20%;font-size:15px;">{{$indicador->nombre}}</td>
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

                            @if($indicador->Medida->id == 2)
                              <td style="width:5%">{{$indicador->objetivo * 100}} %</td> <!-- Meta porcentual - Multiplica por 100 -->
                            @else
                              <td style="width:5%">{{$indicador->objetivo}}</td> <!-- Meta numerica o en puntos -->
                            @endif

                          @endif
                        @endforeach

                        <td style="width:10%;font-size:10px;">{{$Nivel4->entidadOficina->nombre}}</td>
                      </tr>

                      <!-- Busca las ACCIONES inscritas para el PLAN INDICATIVO respectivo - PLAN DE ACCION -->
                      <tr>
                        <td style="width:95%;" colspan="8">
                          <table id="mytable" class="table table-bordered table-dark">
                            <tr>
                              <th style="width:60%;">Accion</th>
                              <th style="width:5%;">Objetivo</th>
                              <th style="width:5%;">Ponderado</th>
                              <th style="width:10%;">Acumulado reportado</th>
                              <th style="width:10%;">Porcentaje cumplimiento</th>
                              <th style="width:10%;">Porcentaje ponderado</th>
                            </tr>

                            @foreach($medicionIndicador->where('nivel4_id',$Nivel4->id) as $indicador) 
                              {{-- @if($indicador->nivel4_id == $Nivel4->id) --}}
                                
                                @foreach($planIndicativo->where('indicador_id',$indicador->id)->where('vigencia_id','12') as $indicativo) 
                                  {{-- @if(($indicativo->indicador_id == $indicador->id) && ($indicativo->vigencia_id == '12')) --}}

                                    <!-- Inicializa Contador acumulado de ponderacion -->
                                    @php $acumProporcionalPonderadoAccion = 0; @endphp 

                                    @foreach($planAccion->where('plan_indicativo_id',$indicativo->id) as $accion) 
                                      {{-- @if($accion->plan_indicativo_id == $indicativo->id) --}}

                                        <!-- Registros PLAN DE accion -->
                                        <tr>
                                          <td style="width:60%;font-size:11px;">{{$accion->descripcion}}</td>
                                          <td style="width:5%;font-size:11px;">{{$accion->objetivo}}</td>
                                          <td style="width:5%;font-size:11px;">{{ $accion->ponderacion * 100 }} %</td>

                                          <!-- Acumulados KPI de las tareas reportadas -->
                                          @php $acumImpactoKPI = 0; @endphp <!-- Inicializa Contador acumulado de impacto KPI -->

                                          @foreach ($tarea->where('accion_id',$accion->id) as $registro)
                                            {{-- @if($registro->accion_id == $accion->id) --}}
                                              @php $acumImpactoKPI = $acumImpactoKPI + $registro->impacto_kpi; @endphp <!-- Acumula el impacto al KPI reportado en las tareas -->
                                            {{-- @endif --}}
                                          @endforeach
                                        
                                          @if (($accion->objetivo != '') && ($accion->objetivo > '0')) <!-- Evita division Zero cuando no se tiene objetivo -->
                                            @if (round(((($acumImpactoKPI * 1 )/$accion->objetivo) * 100),2) <= 100) <!-- Verifica no superar limite a 100 en caso de sobreejecucion -->
                                              @php $acumImpactoKPIGeneral = $acumImpactoKPIGeneral + round(((($acumImpactoKPI * 1 )/$accion->objetivo) * 100),2); @endphp
                                              @php $auxCumplimientoAccion = ($acumImpactoKPI * 1 ) / $accion->objetivo; @endphp <!-- Variable auxiliar "% de Cumplimiento accion" para posterior caclulo del proporcional al  ponderado -->
                                            @else
                                              @php $acumImpactoKPIGeneral = $acumImpactoKPIGeneral + 100; @endphp <!-- Limita a 100 en caso de sobreejecucion -->
                                              @php $auxCumplimientoAccion = 1; @endphp <!-- Variable auxiliar "% de Cumplimiento accion" para posterior caclulo del proporcional al  ponderado -->
                                            @endif
                                          @endif
                                          <!-- Fin acumulado KPI tareas reportadas -->

                                          <!-- Calculo del proporcional PONDERADO -->
                                          @if (($accion->objetivo != '') && ($accion->objetivo > '0')) <!-- Evita division Zero cuando no se tiene objetivo -->
                                            @php $proporcionalPonderadoAccion = ($auxCumplimientoAccion * $accion->ponderacion ) / 1; @endphp
                                          @else
                                            @php $proporcionalPonderadoAccion = 0; @endphp
                                          @endif        

                                          @php $acumProporcionalPonderadoAccion = $acumProporcionalPonderadoAccion + $proporcionalPonderadoAccion; @endphp                           
                                          <!-- Fin calculo del proporcional PONDERADO -->

                                          <!-- Mostrar en la grilla en pantalla el acumulado de KPI y el calculo porcentaje de cumplimiento -->
                                          <td style="width:10%;">{{ $acumImpactoKPI }} / <b>{{$accion->objetivo}}</b></td>

                                          @if (($accion->objetivo != '') && ($accion->objetivo > '0'))
                                            <td style="width:10%;">{{ round(((($acumImpactoKPI * 1 )/$accion->objetivo) * 100),2) }} %</td>
                                          @else
                                            <td style="width:10%;">0 %</td>
                                          @endif
                                          <!-- Fin mostrar grilla de resultado -->
                                        
                                          <!-- Mostrar en la grilla en pantalla el calculo porcentaje equivalente al Ponderado -->
                                          <td style="width:10%;font-size:11px;">{{ round(($proporcionalPonderadoAccion * 100),2) }} %</td>
                                        </tr>


                                        <!-- Numero de acciones inscritas - Agrupado por consulta general -->
                                        @php $acumAccionesGeneral = $acumAccionesGeneral + 1; @endphp

                                      {{-- @endif --}}
                                    @endforeach

                                    <tr>
                                      <td colspan="1"></td>
                                      <td colspan="4">Plan Accion -> Ponderados -> Acumulado 2020</td>
                                      <td colspan="1">{{ round(($acumProporcionalPonderadoAccion * 100),2) }} %</td>
                                    </tr>

                                    <tr>
                                      <td colspan="1"></td>
                                      <td colspan="4">Actividad (Meta) -> Impacto ponderado al indicador -> Objetivo 2020</td>
                                      @if($indicador->Medida->id == 2)
                                        <td colspan="1">{{ round((($indicativo->valor * $acumProporcionalPonderadoAccion)/1) * 100,2) }} %</td><!-- Meta porcentual - Multiplica por 100 -->
                                      @else
                                        <td colspan="1">{{ round((($indicativo->valor * $acumProporcionalPonderadoAccion)/1),2) }}</td>
                                      @endif
                                    </tr>

                                    <tr>
                                      <td colspan="1"></td>
                                      <td colspan="4" style="background:rgb(104, 103, 187);color:#ffffff;">Actividad (Meta) -> Porcentaje ponderado cumplimiento -> Cuatrienio</td>
                                      
                                      <!-- Diferente de CERO - Calcula dividiendo por el objetivo -->
                                      @if ($indicador->objetivo != 0)
                                        <td colspan="1" style="font-size:18px;font-weight: bold;">{{ round(((($indicativo->valor * $acumProporcionalPonderadoAccion)/1)*100)/$indicador->objetivo,2) }} %</td>
                                        <!-- Acumula a nivel GENERAL el nivel de avance de cada Actividad Nivel 4 (Vigencia 2020 -->
                                        @php $acumImpactoIndicador2020General = $acumImpactoIndicador2020General + ( ((($indicativo->valor * $acumProporcionalPonderadoAccion)/1)*100)/$indicador->objetivo ); @endphp
                                      @endif 

                                      <!-- CERO y tipo MANTENIMIENTO - Calcula dividiendo por la linea base multiplicado por 4 -->
                                      @if (($indicador->objetivo == 0) && ($indicador->tipo_id == 3))
                                        <td colspan="1" style="font-size:18px;font-weight: bold;">{{ round(((($indicativo->valor * $acumProporcionalPonderadoAccion)/1)*100)/($indicador->linea_base*4),2) }} %</td>
                                        <!-- Acumula a nivel GENERAL el nivel de avance de cada Actividad Nivel 4 (Vigencia 2020 -->
                                        @php $acumImpactoIndicador2020General = $acumImpactoIndicador2020General + ( ((($indicativo->valor * $acumProporcionalPonderadoAccion)/1)*100)/($indicador->linea_base*4) ); @endphp
                                      @endif

                                      <!-- CERO y tipo NO MANTENIMIENTO - Igual a cero -->
                                      @if (($indicador->objetivo == 0) && ($indicador->tipo_id != 3))
                                        <td colspan="1" style="font-size:18px;font-weight: bold;">0 %</td>
                                        <!-- Acumula a nivel GENERAL el nivel de avance de cada Actividad Nivel 4 (Vigencia 2020 -->
                                        @php $acumImpactoIndicador2020General = $acumImpactoIndicador2020General + 0; @endphp
                                      @endif
                                    </tr>

                                  {{-- @endif --}}
                                @endforeach

                              {{-- @endif --}}
                            @endforeach


                          </table>
                        </td>
                      </tr>

                      <tr><td colspan="9"></td></tr>

                      <!-- Numero de acciones inscritas - Agrupado por consulta general -->
                      @php $acumNivel4General = $acumNivel4General + 1; @endphp

                     @endforeach 

                     
                     @if (count($planDesarrolloNivel4))
                          {{ $pagination }}
                     @endif


                    </tbody>
                  </table>
                </td>
              </tr>

              <tr>
                <td><h4><b>{{ $acumAccionesGeneral }}</b> | Acciones filtradas</h4></td>
              </tr>

              <tr>
                @if ($acumAccionesGeneral != 0)
                  <td><h1><b>{{ round(($acumImpactoKPIGeneral/$acumAccionesGeneral),2) }} %</b></h1><h4>Porcentaje promedio de cumplimiento | Plan de Accion 2020</h4></td>
                @else
                  <td><h1><b>0 %</b></h1><h4>Porcentaje promedio de cumplimiento | Plan de Accion 2020</h4></td>
                @endif
              </tr>

              <tr>
                <td><h4><b>{{ $acumNivel4General }}</b> | Actividades filtradas</h4></td>
              </tr>

              <tr>
                @if ($acumNivel4General != 0)
                  <td><h1><b>{{ round(($acumImpactoIndicador2020General/$acumNivel4General),2) }} %</b></h1><h4>Porcentaje ponderado de cumplimiento Cuatrienio | Actividades</h4></td>
                @else
                  <td><h1><b>0 %</b></h1><h4>Porcentaje ponderado de cumplimiento Cuatrienio | Actividades</h4></td>
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