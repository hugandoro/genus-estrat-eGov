@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <!-- Grafica N° 7 - Avance PLAN DE DESARROLLO -->
    <div class="col-md-12">
      <div class="panel panel-default">

        <!-- INICIO Establecer fecha de corte para el informe -->
        <form method="GET" action="{{ url('/graficaavanceplandeaccion') }}" role="form" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="tipo" value="2">
          <table>
            <tr>
              <td>
                <div class="form-group">
                  <input class="form-control" placeholder="Fecha de corte..." name="fecha_corte" type="date" id="fecha_corte" required> 
                </div>
              </td>

              <td valign="top">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Filtrar</button>
              <td>
            </tr>
          </table>
        </form>
        <!-- FIN Establecer fecha de corte para el informe -->

        <canvas id="chart-area7" style="width:100%"></canvas>

        <center>
          <hr>
          <table class="table">
            <tr>
              <td style="width:10%"></td>
              <td style="width:40%">
                <b>Secretaria/Dependencia</b>
              </td>
              <td style="width:20%">
                <b>N° de actividades (Metas) a cargo</b>
              </td>
              <td style="width:20%">
                <b>% Cumplimiento</b>
              </td>
              <td style="width:10%"></td>
            </tr>
  
            @foreach ($nombresSecretarias as $key => $nombre)
              <tr>
                <td></td>
                <td>{{ $nombre }}</td>
                <td><h4>{{ $vectorAcumNivel4General[$key] }} metas</h4></td> 
                <td><h2>{{ $vectorPorcentajePlanDesarrollo[$key] }} % </h2></td> 
                <td></td>
              </tr>
            @endforeach
          </table>
          <hr>
          </center>

      </div>
    </div>

  </div>
</div>

<script>
//GRAFICO N° 7
    var nombresSecretarias = <?php echo json_encode((array) $nombresSecretarias);  ?>;
    var vectorPorcentajePlanDesarrollo = <?php echo json_encode((array) $vectorPorcentajePlanDesarrollo);  ?>;

    //Se debe CORREGIR que se elimina manualmente los primeros 2 registros que no tienen asignacion de actividades ( Despacho y Privada )
		var color = Chart.helpers.color;
		var configD = {
			labels: [ nombresSecretarias[3], 
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
				label: '% Cumplimiento',
				backgroundColor: color(window.chartColors.green).alpha(0.8).rgbString(),
				borderColor: window.chartColors.green,
				borderWidth: 1,
				data: [ vectorPorcentajePlanDesarrollo[3], 
                vectorPorcentajePlanDesarrollo[4], 
                vectorPorcentajePlanDesarrollo[5], 
                vectorPorcentajePlanDesarrollo[6], 
                vectorPorcentajePlanDesarrollo[7],
                vectorPorcentajePlanDesarrollo[8], 
                vectorPorcentajePlanDesarrollo[9], 
                vectorPorcentajePlanDesarrollo[10], 
                vectorPorcentajePlanDesarrollo[11], 
                vectorPorcentajePlanDesarrollo[12], 
                vectorPorcentajePlanDesarrollo[13], 
                vectorPorcentajePlanDesarrollo[14],
                vectorPorcentajePlanDesarrollo[15], 
                vectorPorcentajePlanDesarrollo[16], 
                vectorPorcentajePlanDesarrollo[17], 
                vectorPorcentajePlanDesarrollo[18], 
                vectorPorcentajePlanDesarrollo[19], 
                vectorPorcentajePlanDesarrollo[20], 
                vectorPorcentajePlanDesarrollo[21]
              ],
			}]
		};


  //DIBUJO DE LOS GRAFICOS
  window.onload = function() {
    var ctx = document.getElementById('chart-area7').getContext('2d');
    window.myBar  = new Chart(ctx, {
			type: 'bar',
			data: configD,
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Cumplimiento PLAN DESARROLLO - Secretaria/Dependencia'
				}
			}
    });
  }
</script>

@endsection