@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <!-- Grafica N° 1 - Actividades agrupadas por SECRETARIAS -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <canvas id="chart-area1" style="width:100%"></canvas>
      </div>
    </div>

  </div>
</div>

<script>
//GRAFICO N° 1
    var nivel4MUNICIPAL = <?php echo json_encode((array) $nivel4MUNICIPAL);  ?>;
    var nombresPOLITICAS = <?php echo json_encode((array) $nombresPOLITICAS);  ?>;

		var color = Chart.helpers.color;
		var configD = {
			labels: [ nombresPOLITICAS[1], 
                nombresPOLITICAS[2], 
                nombresPOLITICAS[3], 
                nombresPOLITICAS[4], 
                nombresPOLITICAS[5], 
                nombresPOLITICAS[6],
                nombresPOLITICAS[7], 
                nombresPOLITICAS[8]
              ],
			datasets: [{
				label: 'Actividades convergentes',
				backgroundColor: color(window.chartColors.yellow).alpha(0.5).rgbString(),
				borderColor: window.chartColors.yellow,
				borderWidth: 1,
				data: [
                nivel4MUNICIPAL[1], 
                nivel4MUNICIPAL[2], 
                nivel4MUNICIPAL[3], 
                nivel4MUNICIPAL[4], 
                nivel4MUNICIPAL[5], 
                nivel4MUNICIPAL[6],
                nivel4MUNICIPAL[7], 
                nivel4MUNICIPAL[8]
              ],
			}]
		};


  //DIBUJO DE LOS GRAFICOS
  window.onload = function() {
    var ctx = document.getElementById('chart-area1').getContext('2d');
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
					text: 'N° de ACTIVIDADES que convergen por Politica Publica Municipal'
				}
			}
    });
  }
</script>

@endsection