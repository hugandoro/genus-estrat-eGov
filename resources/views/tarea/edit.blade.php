@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Registro de TAREAS realizadas</h3></div>
          <div class="pull-right"></div>
          <div class="table-container">

            <!-- FORMULARIO -->
            <form method="POST" action="{{ route('tarea.update',$tarea->id) }}" role="form" enctype="multipart/form-data">
 
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
             
              <!-- Calcula la diferencia de horas entre Fecha de Reporte y Fecha actual -->
              @php 
                $fechaCreado = $tarea->created_at;
                $fechaActual = new DateTime(); 
              @endphp
              
              <!-- Valida si supera el filtro de las 24 horas permitidas para editar -->
              @if ($fechaActual->diff($fechaCreado)->days <= 1 )
                @include('tarea.formulario.frm')
              @endif
                                                                      
            </form>
            <!-- Fin del formulario -->

          </div>
        </div>
      </div>
    </div>
  </section>

@endsection