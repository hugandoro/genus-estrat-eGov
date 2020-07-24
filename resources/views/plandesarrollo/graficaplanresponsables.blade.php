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
    var nombresSecretarias = <?php echo json_encode((array) $nombresSecretarias);  ?>;
    var nivel4Secretaria = <?php echo json_encode((array) $nivel4Secretaria);  ?>;

		var color = Chart.helpers.color;
		var configD = {
			labels: [ nombresSecretarias[1], 
                nombresSecretarias[2], 
                nombresSecretarias[3], 
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
				label: 'Actividades a cargo',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
                nivel4Secretaria[1], 
                nivel4Secretaria[2], 
                nivel4Secretaria[3], 
                nivel4Secretaria[4], 
                nivel4Secretaria[5], 
                nivel4Secretaria[6], 
                nivel4Secretaria[7],
                nivel4Secretaria[8], 
                nivel4Secretaria[9], 
                nivel4Secretaria[10], 
                nivel4Secretaria[11], 
                nivel4Secretaria[12], 
                nivel4Secretaria[13], 
                nivel4Secretaria[14],
                nivel4Secretaria[15], 
                nivel4Secretaria[16], 
                nivel4Secretaria[17], 
                nivel4Secretaria[18], 
                nivel4Secretaria[19], 
                nivel4Secretaria[20], 
                nivel4Secretaria[21]
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
					text: 'N° de ACTIVIDADES por SECRETARIAS y DEPENDENCIAS'
				}
			}
    });
  }
</script>

@endsection