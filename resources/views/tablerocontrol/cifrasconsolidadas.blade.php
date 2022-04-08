@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-10 col-md-offset-1">
      <!-- <div class="col-md-8 col-md-offset-2"> -->

      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left">
            <h3>Plan de Desarrollo | <b>Tablero de control | Cifras consolidadas</b></h3>
          </div>
          <div class="pull-right">

            <!-- Formulario para filtro de consulta por SECRETARIAS -->
            <form method="GET" action="{{ url('/tablerocifrasconsolidadas') }}" role="form" enctype="multipart/form-data">
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

    <div class="col-md-10 col-md-offset-1">
      <div class="col-md-2">
        <center>
          <h1>{{ $totalMetas }}</h1>
          Metas del plan de desarrollo
        </center>
      </div>

      <div class="col-md-2">
        <center>
          <h1>183</h1>
          Metas del territorio | Social
        </center>
      </div>

      <div class="col-md-2">
        <center>
          <h1>79</h1>
          Metas del territorio | Competitivo
        </center>
      </div>

      <div class="col-md-2">
        <center>
          <h1>128</h1>
          Metas del territorio | Ambiental
        </center>
      </div>

      <div class="col-md-2">
        <center>
          <h1>58</h1>
          Metas del territorio | Gerencia Pública
        </center>
      </div>

      <div class="col-md-2">
        <center>
          <h1 style="font-size: 60px;"><b>{{ $totalMetasSecretaria }}</b></h1>
          Metas a cargo de la Secretaria/Dependencia
        </center>
      </div>

      <div class="col-md-12">
        <hr>
      </div>

      <div class="col-md-5">
        <div class="panel panel-default">
          <canvas id="graficaUNO" style="width:100%"></canvas>
        </div>
      </div>

      <div class="col-md-2">
      </div>

      <div class="col-md-5">
        <div class="panel panel-default">
          <canvas id="graficaDOS" style="width:100%"></canvas>
        </div>
      </div>

    </div>

  </section>

  <script type="application/javascript">
    //var color = Chart.helpers.color;

    //GRAFICO N° 1
    var randomScalingFactor = function() {
      return Math.round(Math.random() * 100);
    };

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
          data: [ '{{ $totalMetas }}',
                  '{{ $totalMetasSecretaria }}',
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
    var randomScalingFactor = function() {
      return Math.round(Math.random() * 100);
    };

    var configB = {
      type: 'bar',
      data: {
        labels: ['Tareas reportadas',
          'Tareas reportadas por la Secretaria'
        ],
        datasets: [{
          label: 'Tareas',
          backgroundColor: 'rgba(142, 68, 173, 1)',
          borderColor: 'rgba(142, 68, 173, 1)',
          borderWidth: 1,
          data: ['{{ $totalTareas }}',
            200,
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
          text: 'Total de Tareas acumuladas reportadas por la Dependencia desde 2020'
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