@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <!-- Grafica N° 1 - Actividades agrupadas por Nivel 1 -->
    <div class="col-md-6">
      <div class="panel panel-default">
        <canvas id="chart-area1" style="width:100%"></canvas>
      </div>
    </div>

    <!-- Grafica N° 2 - Actividades agrupadas por Nivel 1 -->
    <div class="col-md-6">
      <div class="panel panel-default">
        <canvas id="chart-area2" style="width:100%"></canvas>
      </div>
    </div>

    <!-- Grafica N° 3 - Actividades agrupadas por Nivel 1 -->
    <div class="col-md-6">
      <div class="panel panel-default">
        <canvas id="chart-area3" style="width:100%"></canvas>
      </div>
    </div>

    <!-- LOGOTIPO -->
    <div class="col-md-6">
      <div class="panel panel-default" style="width:100%, heigth:100%">
        <center>
          <picture><img class='img-responsive' src="{{ asset('images/logo_miniatura_administracion.png') }}" width="211px"></picture>

          <h4>Planeada | Ordenada | Dinamica</h4>
          <h5>2020 - 2023</h5>
        </center>
      </div>
    </div>

  </div>
</div>

<script>

  //GRAFICO N° 1
  var randomScalingFactor = function() {
    return Math.round(Math.random() * 100);
  };

  var configA = {
    type: 'pie', //'pie' para grafico tipo torta
    data: {
      datasets: [{
        data: [
          '{{ $nivel2ANivel1 }}',
          '{{ $nivel2BNivel1 }}',
          '{{ $nivel2CNivel1 }}',
          '{{ $nivel2DNivel1 }}'
        ],
        backgroundColor: [
          window.chartColors.red,
          window.chartColors.orange,
          window.chartColors.green,
          window.chartColors.blue,
        ],
        label: 'Actividades'
      }],
      labels: [
        '{{ $nombreANivel1 }} | {{ $nivel2ANivel1 }} programas',
        '{{ $nombreBNivel1 }} | {{ $nivel2BNivel1 }} programas',
        '{{ $nombreCNivel1 }} | {{ $nivel2CNivel1 }} programas',
        '{{ $nombreDNivel1 }} | {{ $nivel2DNivel1 }} programas'
      ]
    },
    options: {
      responsive: true,
      //circumference : Math.PI, //Eliminar para Circunferencia completa
      //rotation : -Math.PI, //Eliminar para Circunferencia completa
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'N° de PROGRAMAS por {{ $tituloNivel1 }}'
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
    type: 'pie', //'pie' para grafico tipo torta
    data: {
      datasets: [{
        data: [
          '{{ $nivel3ANivel1 }}',
          '{{ $nivel3BNivel1 }}',
          '{{ $nivel3CNivel1 }}',
          '{{ $nivel3DNivel1 }}'
        ],
        backgroundColor: [
          window.chartColors.red,
          window.chartColors.orange,
          window.chartColors.green,
          window.chartColors.blue,
        ],
        label: 'Actividades'
      }],
      labels: [
        '{{ $nombreANivel1 }} | {{ $nivel3ANivel1 }} proyectos',
        '{{ $nombreBNivel1 }} | {{ $nivel3BNivel1 }} proyectos',
        '{{ $nombreCNivel1 }} | {{ $nivel3CNivel1 }} proyectos',
        '{{ $nombreDNivel1 }} | {{ $nivel3DNivel1 }} proyectos'
      ]
    },
    options: {
      responsive: true,
      //circumference : Math.PI, //Eliminar para Circunferencia completa
      //rotation : -Math.PI, //Eliminar para Circunferencia completa
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'N° de PROYECTOS por {{ $tituloNivel1 }}'
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    }
  };

 //GRAFICO N° 3
 var randomScalingFactor = function() {
    return Math.round(Math.random() * 100);
  };

  var configC = {
    type: 'pie', //'pie' para grafico tipo torta
    data: {
      datasets: [{
        data: [
          '{{ $nivel4ANivel1 }}',
          '{{ $nivel4BNivel1 }}',
          '{{ $nivel4CNivel1 }}',
          '{{ $nivel4DNivel1 }}'
        ],
        backgroundColor: [
          window.chartColors.red,
          window.chartColors.orange,
          window.chartColors.green,
          window.chartColors.blue,
        ],
        label: 'Actividades'
      }],
      labels: [
        '{{ $nombreANivel1 }} | {{ $nivel4ANivel1 }} actividades',
        '{{ $nombreBNivel1 }} | {{ $nivel4BNivel1 }} actividades',
        '{{ $nombreCNivel1 }} | {{ $nivel4CNivel1 }} actividades',
        '{{ $nombreDNivel1 }} | {{ $nivel4DNivel1 }} actividades'

      ]
    },
    options: {
      responsive: true,
      //circumference : Math.PI, //Eliminar para Circunferencia completa
      //rotation : -Math.PI, //Eliminar para Circunferencia completa
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'N° de ACTIVIDADES por {{ $tituloNivel1 }}'
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    }
  };

  //DIBUJO DE LOS GRAFICOS
  window.onload = function() {
    var ctx = document.getElementById('chart-area1').getContext('2d');
    window.myDoughnut = new Chart(ctx, configA);

    var ctx = document.getElementById('chart-area2').getContext('2d');
    window.myDoughnut = new Chart(ctx, configB);

    var ctx = document.getElementById('chart-area3').getContext('2d');
    window.myDoughnut = new Chart(ctx, configC);
  }
</script>

@endsection