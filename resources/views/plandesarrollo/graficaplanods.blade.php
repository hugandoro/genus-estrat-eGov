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

    <div class="col-md-12">
      <center><img class="card-img-top" src="{{ asset("images/iconos/icono_ods.png") }}" alt="Estrategov" width="20%"></center>
    </div>

  </div>
</div>

<script>
//GRAFICO N° 1
    var nivel4ODS = <?php echo json_encode((array) $nivel4ODS);  ?>;

		var color = Chart.helpers.color;
		var configD = {
			labels: [ 'ODS 1', 
                'ODS 2',
                'ODS 3',
                'ODS 4',
                'ODS 5',
                'ODS 6',
                'ODS 7',
                'ODS 8',
                'ODS 9',
                'ODS 10',
                'ODS 11',
                'ODS 12',
                'ODS 13',
                'ODS 14',
                'ODS 15',
                'ODS 16',
                'ODS 17'
              ],
			datasets: [{
				label: 'Actividades convergentes',
				backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
				borderColor: window.chartColors.green,
				borderWidth: 1,
				data: [
                nivel4ODS[1], 
                nivel4ODS[2], 
                nivel4ODS[3], 
                nivel4ODS[4], 
                nivel4ODS[5], 
                nivel4ODS[6], 
                nivel4ODS[7],
                nivel4ODS[8], 
                nivel4ODS[9], 
                nivel4ODS[10], 
                nivel4ODS[11], 
                nivel4ODS[12], 
                nivel4ODS[13], 
                nivel4ODS[14],
                nivel4ODS[15], 
                nivel4ODS[16], 
                nivel4ODS[17]
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
					text: 'N° de ACTIVIDADES que convergen por cada ODS'
				}
			}
    });
  }
</script>

@endsection