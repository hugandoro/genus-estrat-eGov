@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <!-- Grafica N° 6 - Avance PLAN DE ACCION (Vigencia) -->
    <div class="col-md-12">
      <div class="panel panel-default">

        <!-- INICIO Establecer fecha de corte para el informe -->
        <form method="GET" action="{{ url('/graficaavanceplandeaccion2021') }}" role="form" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="tipo" value="1">
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

        <canvas id="chart-area6" style="width:100%"></canvas>

        <center>
        <hr>
        <table class="table">
          <tr>
            <td style="width:10%"></td>
            <td style="width:40%">
              <b>Secretaria/Dependencia</b>
            </td>
            <td style="width:20%">
              <b>N° de acciones inscritas | Vigencia 2021</b>
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
              <td><h4>{{ $vectorAcumAccionesGeneral[$key] }} acciones</h4></td> 
              <td><h2>{{ $vectorPorcentajePlanAccion[$key] }} % </h2></td> 
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
//GRAFICO N° 6
    var nombresSecretarias = <?php echo json_encode((array) $nombresSecretarias);  ?>;
    var vectorPorcentajePlanAccion = <?php echo json_encode((array) $vectorPorcentajePlanAccion);  ?>;
    var fechaCorte = <?php echo json_encode($fechaCorte); ?>;

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
				backgroundColor: 'rgba(89, 165, 127, 1)',
				borderColor: 'rgba(89, 165, 127, 1)',
				borderWidth: 1,
				data: [ vectorPorcentajePlanAccion[3], 
                vectorPorcentajePlanAccion[4], 
                vectorPorcentajePlanAccion[5], 
                vectorPorcentajePlanAccion[6], 
                vectorPorcentajePlanAccion[7],
                vectorPorcentajePlanAccion[8], 
                vectorPorcentajePlanAccion[9], 
                vectorPorcentajePlanAccion[10], 
                vectorPorcentajePlanAccion[11], 
                vectorPorcentajePlanAccion[12], 
                vectorPorcentajePlanAccion[13], 
                vectorPorcentajePlanAccion[14],
                vectorPorcentajePlanAccion[15], 
                vectorPorcentajePlanAccion[16], 
                vectorPorcentajePlanAccion[17], 
                vectorPorcentajePlanAccion[18], 
                vectorPorcentajePlanAccion[19], 
                vectorPorcentajePlanAccion[20], 
                vectorPorcentajePlanAccion[21]
              ],
			}]
		};


  //DIBUJO DE LOS GRAFICOS
  window.onload = function() {
    var ctx = document.getElementById('chart-area6').getContext('2d');
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
					text: 'Cumplimiento PLAN DE ACCION (Vigencia 2021) - Secretaria/Dependencia - Fecha de corte ' + fechaCorte
				}
			}
    });
  }
</script>

@endsection