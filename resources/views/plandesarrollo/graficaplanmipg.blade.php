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
    var nivel4MIPG = <?php echo json_encode((array) $nivel4MIPG);  ?>;
    var nombresMIPG = <?php echo json_encode((array) $nombresMIPG);  ?>;

		var color = Chart.helpers.color;
		var configD = {
			labels: [ nombresMIPG[1],
                nombresMIPG[2],
                nombresMIPG[3],
                nombresMIPG[4],
                nombresMIPG[5],
                nombresMIPG[6],
                nombresMIPG[7],
                nombresMIPG[8],
                nombresMIPG[9],
                nombresMIPG[10],
                nombresMIPG[11],
                nombresMIPG[12],
                nombresMIPG[13],
                nombresMIPG[14],
                nombresMIPG[15],
                nombresMIPG[16],
                nombresMIPG[17],
                nombresMIPG[18]
              ],
			datasets: [{
				label: 'Actividades convergentes',
				backgroundColor: color(window.chartColors.black).alpha(0.5).rgbString(),
				borderColor: window.chartColors.black,
				borderWidth: 1,
				data: [
                nivel4MIPG[1], 
                nivel4MIPG[2], 
                nivel4MIPG[3], 
                nivel4MIPG[4], 
                nivel4MIPG[5], 
                nivel4MIPG[6], 
                nivel4MIPG[7],
                nivel4MIPG[8], 
                nivel4MIPG[9], 
                nivel4MIPG[10], 
                nivel4MIPG[11], 
                nivel4MIPG[12], 
                nivel4MIPG[13], 
                nivel4MIPG[14],
                nivel4MIPG[15], 
                nivel4MIPG[16],
                nivel4MIPG[17], 
                nivel4MIPG[18]
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
					text: 'N° de ACTIVIDADES que convergen por cada Politica MIPG'
				}
			}
    });
  }
</script>

@endsection