@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <!-- Grafica N° 7 - Avance PLAN DE DESARROLLO -->
    <div class="col-md-12">
      <div class="panel panel-default">

        <center>
          <table class="table">
            <tr>
              <td style="width:3%"></td>
              <td style="width:19%">
                <b>Secretaria/Dependencia</b>
              </td>
              <td style="width:5%"></td>
              <td style="width:55%">
                <b>Nivel de cumplimiento Plan Desarrollo 2020 - 2023</b>
              </td>
              <td style="width:15%">
                <b>N° de Actividades (Metas) a cargo</b>
              </td>
              <td style="width:3%"></td>
            </tr>
  
            @foreach ($nombresSecretarias as $key => $nombre)

              @if (($nombre != "Ciudadano") AND ($nombre != "Despacho Alcalde") AND ($nombre != "Privada"))
              <tr>
                <td></td>
                <td>{{ $nombre }}</td>
                <td><picture><img class='img-responsive' src="{{ asset('images/iconos_2/defecto.png') }}" width="100%"></picture></td>
                
                <td>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped" style="width:<?=$secretariasPromedioCumplimientoPD[$key]?>%;">{{ $secretariasPromedioCumplimientoPD[$key] }} %</div>
                </div>
                </td> 

                <td><h5>{{ $secretariasTotalMetasAsignadas[$key] }} Actividades (Metas) </h5></td> 
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
</div>


@endsection