@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <!-- Grafica N° 7 - Avance PLAN DE DESARROLLO -->
    <div class="col-md-12">
      <div class="panel panel-default">

        <!-- INICIO Establecer fecha de corte para el informe -->
        <form method="GET" action="{{ url('/graficaavancesemaforos') }}" role="form" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="tipo" value="3">
          <table>
            <tr>
              <td>
                <div class="form-group">
                  <input class="form-control" placeholder="Fecha de corte..." name="fecha_corte" type="date" id="fecha_corte" required> 
                </div>
              </td>

              <td valign="top">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Historico - Linea de tiempo</button>
              <td>
            </tr>
          </table>
        </form>
        <!-- FIN Establecer fecha de corte para el informe -->

        @php set_time_limit(300); @endphp
        @foreach ($nombresSecretarias as $key => $nombre)

          <!-- Tabla ENCABEZADO DATOS MACRO - SECRETARIAS -->
          <center>
            <table class="table">
              <tr>
                <th style="width:25%; background-color: #217A8C; color:white; ">
                  Secretaria/Dependencia
                </th>
                <th style="width:25%; background-color: #217A8C; color:white; ">
                  Actividades (Metas) a cargo
                </th>
                <th style="width:5%; background-color: #217A8C; color:white; "></th>
                <th style="width:20%; background-color: #217A8C; color:white; ">
                  Plan Accion 2020
                </th>
                <th style="width:5%; background-color: #217A8C; color:white; "></th>
                <th style="width:20%; background-color: #217A8C; color:white; ">
                  Plan Desarrollo 2020 - 2023
                </th>
              </tr>

              <tr>
                <td><h3>{{ $nombre }}</h3></td>
                <td><h3>{{ $vectorAcumNivel4General[$key] }} metas</h3></td> 
                
                <td style="vertical-align:middle;">
                  <!-- Semaforo PLAN DE ACCION -->
                  @if ($vectorPorcentajePlanAccion[$key] <= 30)
                    <div style="
                      width: 50px;
                      height: 50px;
                      -moz-border-radius: 50%;
                      -webkit-border-radius: 50%;
                      border-radius: 50%;
                      background: #EC7063;">
                    </div>
                  @endif

                  @if (($vectorPorcentajePlanAccion[$key] > 30) && ($vectorPorcentajePlanAccion[$key] <= 75))
                    <div style="
                      width: 50px;
                      height: 50px;
                      -moz-border-radius: 50%;
                      -webkit-border-radius: 50%;
                      border-radius: 50%;
                      background: #F4D03F;">
                    </div>
                  @endif

                  @if ($vectorPorcentajePlanAccion[$key] > 75)
                    <div style="
                      width: 50px;
                      height: 50px;
                      -moz-border-radius: 50%;
                      -webkit-border-radius: 50%;
                      border-radius: 50%;
                      background: #5cb85c;">
                    </div>
                  @endif
                </td>

                <td><h3>{{ $vectorPorcentajePlanAccion[$key] }} %</h3></td> 

                <td style="vertical-align:middle;">
                  <!-- Semaforo PLAN DE DESARROLLO -->
                  @if ($vectorPorcentajePlanDesarrollo[$key] <= 30)
                    <div style="
                      width: 50px;
                      height: 50px;
                      -moz-border-radius: 50%;
                      -webkit-border-radius: 50%;
                      border-radius: 50%;
                      background: #EC7063;">
                    </div>
                  @endif

                  @if (($vectorPorcentajePlanDesarrollo[$key] > 30) && ($vectorPorcentajePlanDesarrollo[$key] <= 75))
                    <div style="
                      width: 50px;
                      height: 50px;
                      -moz-border-radius: 50%;
                      -webkit-border-radius: 50%;
                      border-radius: 50%;
                      background: #F4D03F;">
                    </div>
                  @endif

                  @if ($vectorPorcentajePlanDesarrollo[$key] > 75)
                    <div style="
                      width: 50px;
                      height: 50px;
                      -moz-border-radius: 50%;
                      -webkit-border-radius: 50%;
                      border-radius: 50%;
                      background: #5cb85c;">
                    </div>
                  @endif
                </td>
                <td><h3>{{ $vectorPorcentajePlanDesarrollo[$key] }} %</h3></td> 
              </tr>
            </table>
          </center>
          <!-- *** FIN *** Tabla ENCABEZADO DATOS MACRO - SECRETARIAS -->

          <!-- Tabla Discriminado por Actividades - Agrupado por Secretaria -->
          <center>
            <table class="table" border="1">
              <tr>
                <td style="background-color: #5D6D7E; color:white; ">Actividad N°</td>
                <td style="background-color: #5D6D7E; color:white; ">Actividad - Descripcion</td>
                <td colspan="2" style="background-color: #5D6D7E; color:white; ">Plan Accion 2020</td>
                <td colspan="2" style="background-color: #5D6D7E; color:white; ">Plan Desarrollo 2020-2023</td>
              </tr>

              @foreach ($vectorMetaNumero as $keyMeta => $metaNumero)
                @if ($vectorMetaSecretaria[$keyMeta] == $nombre )

                  <!-- Lista las metas a cargo y su semaforo agrupadas por SECRETARIA-->
                  <tr>
                    <td style="width:10%;">{{ $metaNumero }}</td>
                    <td style="width:50%;">{{ $vectorMetaNombre[$keyMeta] }}</td>

                    <td style="width:10%;">
                      <!-- Semaforo PLAN DE DESARROLLO -->
                      @if ($vectorMetaCumplimientoPlanAccion[$keyMeta] <= 30)
                        <div style="
                          width: 15px;
                          height: 15px;
                          -moz-border-radius: 50%;
                          -webkit-border-radius: 50%;
                          border-radius: 50%;
                          background: #EC7063;">
                        </div>
                      @endif

                      @if (($vectorMetaCumplimientoPlanAccion[$keyMeta] > 30) && ($vectorMetaCumplimientoPlanAccion[$keyMeta] <= 75))
                        <div style="
                          width: 15px;
                          height: 15px;
                          -moz-border-radius: 50%;
                          -webkit-border-radius: 50%;
                          border-radius: 50%;
                          background: #F4D03F;">
                        </div>
                      @endif

                      @if ($vectorMetaCumplimientoPlanAccion[$keyMeta] > 75)
                        <div style="
                          width: 15px;
                          height: 15px;
                          -moz-border-radius: 50%;
                          -webkit-border-radius: 50%;
                          border-radius: 50%;
                          background: #5cb85c;">
                        </div>
                      @endif
                    </td>

                    <td style="width:10%;">{{ $vectorMetaCumplimientoPlanAccion[$keyMeta] }} %</td>

                    <td style="width:10%;">
                      <!-- Semaforo PLAN DE DESARROLLO -->
                      @if ($vectorMetaCumplimientoPlanDesarrollo[$keyMeta] <= 30)
                        <div style="
                          width: 15px;
                          height: 15px;
                          -moz-border-radius: 50%;
                          -webkit-border-radius: 50%;
                          border-radius: 50%;
                          background: #EC7063;">
                        </div>
                      @endif

                      @if (($vectorMetaCumplimientoPlanDesarrollo[$keyMeta] > 30) && ($vectorMetaCumplimientoPlanDesarrollo[$keyMeta] <= 75))
                        <div style="
                          width: 15px;
                          height: 15px;
                          -moz-border-radius: 50%;
                          -webkit-border-radius: 50%;
                          border-radius: 50%;
                          background: #F4D03F;">
                        </div>
                      @endif

                      @if ($vectorMetaCumplimientoPlanDesarrollo[$keyMeta] > 75)
                        <div style="
                          width: 15px;
                          height: 15px;
                          -moz-border-radius: 50%;
                          -webkit-border-radius: 50%;
                          border-radius: 50%;
                          background: #5cb85c;">
                        </div>
                      @endif
                    </td>

                    <td style="width:10%;">{{ $vectorMetaCumplimientoPlanDesarrollo[$keyMeta] }} %</td>
                  </tr>
                  <!-- *** FIN *** Lista las metas a cargo y su semaforo agrupadas por SECRETARIA-->

              @endif
              @endforeach

            </table>
          </center>
          <!-- *** FIN *** Tabla Discriminado por Actividades - Agrupado por Secretaria -->

          <br><br>

        @endforeach


      </div>
    </div>

  </div>
</div>

@endsection