@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Modificar indicadores de medicion</h3></div>
          <div class="pull-right"></div>
          <div class="table-container">

            <!-- FORMULARIO -->
            <form method="POST" action="{{ route('indicador.update',$medicionIndicador->id) }}" role="form" enctype="multipart/form-data">
 
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              
              <!-- Pasa por campo oculto los 4 ID de los niveles del arbol del plan para armar ruta de regreso posteriormente -->
              <input type="hidden" name="nivel1_id" value="{{ $planDesarrolloNivel2->nivel1_id }}">
              <input type="hidden" name="nivel2_id" value="{{ $planDesarrolloNivel3->nivel2_id }}">
              <input type="hidden" name="nivel3_id" value="{{ $planDesarrolloNivel4->nivel3_id }}">
              <input type="hidden" name="nivel4_id" value="{{ $medicionIndicador->nivel4_id }}">
             
              @include('indicador.formulario.frm')
                                                                      
            </form>
            <!-- Fin del formulario -->

          </div>
        </div>
      </div>
    </div>
  </section>

@endsection