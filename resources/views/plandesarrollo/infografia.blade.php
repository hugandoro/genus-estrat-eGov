@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">

      <!-- Grafica N° 1 - Territorios -->
      <canvas id="chart-area" style="width:100%"></canvas>

      <script>
        var randomScalingFactor = function() {
          return Math.round(Math.random() * 100);
        };
    
        var config = {
          type: 'doughnut',
          data: {
            datasets: [{
              data: [
                40,
                30,
                20,
                10,
              ],
              backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.yellow,
                window.chartColors.green,
              ],
              label: 'Dataset 1'
            }],
            labels: [
              '{{ $nombreANivel1 }}',
              '{{ $nombreBNivel1 }}',
              '{{ $nombreCNivel1 }}',
              '{{ $nombreDNivel1 }}'
            ]
          },
          options: {
            responsive: true,
            legend: {
              position: 'top',
            },
            title: {
              display: true,
              text: 'Plan de Desarrollo - Carga porcentual por {{ $tituloNivel1 }}'
            },
            animation: {
              animateScale: true,
              animateRotate: true
            }
          }
        };
    
        window.onload = function() {
          var ctx = document.getElementById('chart-area').getContext('2d');
          window.myDoughnut = new Chart(ctx, config);
        };
    
      </script>
      <!-- FIN Grafica N° 1 - Territorios -->

    </div>
  </div>
</section>

@endsection