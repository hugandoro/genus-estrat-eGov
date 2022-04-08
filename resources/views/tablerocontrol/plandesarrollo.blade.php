@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-10 col-md-offset-1">
      <!-- <div class="col-md-8 col-md-offset-2"> -->

      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left">
            <h3>Plan de Desarrollo | <b>Tablero de control | Plan de Desarrollo</b></h3>
          </div>
          <div class="pull-right">

            <!-- Formulario para filtro de consulta por SECRETARIAS -->
            <form method="GET" action="{{ url('/tableroplandesarrollo') }}" role="form" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <table>
                <tr>
                  <td>
                    <div class="form-group">

                      <select class="form-control" name="filtroSecretaria">
                        <option value='9999' selected>Entidad completa</option>
                        @foreach($entidadOficina as $secretaria)
                        @if((isset($_GET['filtroSecretaria'])) && ($secretaria->id == $_GET['filtroSecretaria']))
                        <option value={{ $secretaria->id }} selected>{{ $secretaria->nombre }}</option>
                        @else
                        <option value={{ $secretaria->id }}>{{ $secretaria->nombre }}</option>
                        @endif
                        @endforeach
                      </select>

                    </div>
                  </td>
                  <td valign="top">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Generar reporte especifico</button>
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
                  <th class="bg-info">
                    <h3>{{$plandesarrollo->administracion->slogan}}</h3>
                  </th>
                </tr>
                @endforeach

              </tbody>

            </table>
          </div>

        </div>
      </div>
    </div>

    <!-- Bloque de graficas UNO y DOS -->
    <div class="col-md-10 col-md-offset-1">

      <!-- Grafica DOS -->
      <div class="col-md-8">
        <div class="panel panel-default">
          <canvas id="graficaDOS" style="width:100%"></canvas>
        </div>
      </div>

      <!-- Grafica UNO -->
      <div class="col-md-4">

        <center>
          <h1>{{ $totalMetas }}</h1>
          Metas del plan de desarrollo
        </center>

        <hr>

        <center>
          <h1 style="font-size: 48px;"><b>{{ $secretariasTotalMetasAsignadas[$idSecretaria] }}</b></h1>
          Metas a cargo de <b>{{ $nombresSecretarias[$idSecretaria] }} </b>
        </center>

        <hr>

        <div class="panel panel-default">
          <canvas id="graficaUNO" style="width:100%"></canvas>
        </div>
      </div>

      <div class="col-md-12">
        <hr>
      </div>

    </div>

    <!-- Bloque de grafica SEMAFORO barras de progreso -->
    <div class="col-md-10 col-md-offset-1">

      <!-- Grafica en Bootstrap - Avance PLAN DE DESARROLLO con SEMAFORO-->
      <div class="col-md-12">
        <div class="panel panel-default">

          <center>
            <table class="table">
              <tr>
                <td style="width:3%"></td>
                <td style="width:19%">
                  <b>Secretaria/Dependencia</b>
                </td>
                <td style="width:55%">
                  <b>Nivel de cumplimiento Plan Desarrollo 2020 - 2023</b>
                </td>
                <td style="width:15%">
                  <b>N° de Actividades (Metas) a cargo</b>
                </td>
                <td style="width:5%">Semaforo</td>
                <td style="width:3%"></td>
              </tr>

              @foreach ($nombresSecretarias as $key => $nombre)

              <!-- Identifica si es un registro que NO se debe mostras antes de continuar -->
              @if (($nombre != "Ciudadano") AND ($nombre != "Despacho Alcalde") AND ($nombre != "Privada") AND ($nombre != "Toda la administracion") AND ($nombre != "Control Interno"))
              
              <!-- Identifica si es una secretaria seleccionada y la resalta de ser necesario -->
              @if ($key == $idSecretaria)
                <tr style="background-color: #D1D1D1">
              @else
                <tr>
              @endif

                <td></td>
                <td>{{ $nombre }}</td>

                <td>
                  <div class="progress">
                    <div class="progress-bar" style="width:<?= $secretariasPromedioCumplimientoPD[$key] ?>%; background-color: #2A2A2A">{{ $secretariasPromedioCumplimientoPD[$key] }} %</div>
                  </div>
                </td>

                <td>
                  <h5>{{ $secretariasTotalMetasAsignadas[$key] }} Actividades (Metas) </h5>
                </td>

                <td>
                  @if ($secretariasPromedioCumplimientoPD[$key] <= '30')
                    <svg width="50px" height="50px"><circle cx="25" cy="25" r="20" fill="#EA3434" stroke="#EA3434"/></svg>
                  @endif

                  @if (($secretariasPromedioCumplimientoPD[$key] > '30') && ($secretariasPromedioCumplimientoPD[$key] <= '60'))
                    <svg width="50px" height="50px"><circle cx="25" cy="25" r="20" fill="#E67E22" stroke="#E67E22"/></svg>
                  @endif

                  @if (($secretariasPromedioCumplimientoPD[$key] > '60') && ($secretariasPromedioCumplimientoPD[$key] <= '95'))
                    <svg width="50px" height="50px"><circle cx="25" cy="25" r="20" fill="#EFF310" stroke="#EFF310"/></svg>
                  @endif

                  @if ($secretariasPromedioCumplimientoPD[$key] > '95')
                    <svg width="50px" height="50px"><circle cx="25" cy="25" r="20" fill="#80F67A" stroke="#80F67A"/></svg>
                  @endif
                </td>

                <td></td>
              </tr>
              @endif

              @endforeach
            </table>
            <hr>
          </center>

        </div>
      </div>
    </div>




  </section>

  <script type="application/javascript">
    //var color = Chart.helpers.color;

    //GRAFICO N° 1
    var configA = {
      type: 'bar',
      data: {
        labels: ['Actividades (Metas)',
          'Actividades (Metas) a cargo'
        ],
        datasets: [{
          label: 'Actividades (Metas)',
          backgroundColor: 'rgba(230, 126, 34, 1)',
          borderColor: 'rgba(230, 126, 34, 1)',
          borderWidth: 1,
          data: ['{{ $totalMetas }}',
            '{{ $secretariasTotalMetasAsignadas[$idSecretaria] }}',
          ],
        }]
      },
      options: {
        responsive: true,
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Actividades a cargo de la Dependencia'
        },
        animation: {
          animateScale: true,
          animateRotate: true
        }
      }
    };

    //GRAFICO N° 2
    var nombresSecretarias = <?php echo json_encode((array) $nombresSecretarias);  ?>;
    var secretariasTotalMetasAsignadas = <?php echo json_encode((array) $secretariasTotalMetasAsignadas);  ?>;

    var configB = {
      type: 'bar',
      data: {
        labels: [nombresSecretarias[3],
          nombresSecretarias[4],
          nombresSecretarias[5],
          nombresSecretarias[6],
          nombresSecretarias[7],
          nombresSecretarias[8],
          nombresSecretarias[9],
          nombresSecretarias[10],
          nombresSecretarias[11],
          nombresSecretarias[12],
          nombresSecretarias[13],
          nombresSecretarias[14],
          nombresSecretarias[15],
          nombresSecretarias[16],
          nombresSecretarias[17],
          nombresSecretarias[18],
          nombresSecretarias[19],
          nombresSecretarias[20],
          nombresSecretarias[21]
        ],
        datasets: [{
          label: 'Actividades(Metas) a cargo',
          backgroundColor: 'rgba(129, 211, 247, 1)',
          borderColor: 'rgba(129, 211, 247, 1)',
          borderWidth: 1,
          data: [secretariasTotalMetasAsignadas[3],
            secretariasTotalMetasAsignadas[4],
            secretariasTotalMetasAsignadas[5],
            secretariasTotalMetasAsignadas[6],
            secretariasTotalMetasAsignadas[7],
            secretariasTotalMetasAsignadas[8],
            secretariasTotalMetasAsignadas[9],
            secretariasTotalMetasAsignadas[10],
            secretariasTotalMetasAsignadas[11],
            secretariasTotalMetasAsignadas[12],
            secretariasTotalMetasAsignadas[13],
            secretariasTotalMetasAsignadas[14],
            secretariasTotalMetasAsignadas[15],
            secretariasTotalMetasAsignadas[16],
            secretariasTotalMetasAsignadas[17],
            secretariasTotalMetasAsignadas[18],
            secretariasTotalMetasAsignadas[19],
            secretariasTotalMetasAsignadas[20],
            secretariasTotalMetasAsignadas[21]
          ],
        }]
      },
      options: {
        responsive: true,
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Plan de desarrollo distribuido por Secretarias/Dependencias'
        },
        animation: {
          animateScale: true,
          animateRotate: true
        }
      }
    };


    //DIBUJO DE LOS GRAFICOS
    window.onload = function() {
      var ctx = document.getElementById('graficaUNO').getContext('2d');
      window.myBar = new Chart(ctx, configA);

      var ctx = document.getElementById('graficaDOS').getContext('2d');
      window.myBar = new Chart(ctx, configB);
    }
  </script>



  @endsection