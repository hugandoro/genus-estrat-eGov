@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left">
            <h3>Inscripcion de ACCIONES para PLAN DE ACCION 2023</h3>
            <hr>
            <h2>Actividad N° <b>{{ $_GET["idNivel4"] }}</b></h2>
            <h4>{{ $_GET["textoNivel4"] }}</h4>
            <hr>
          </div>
          <div class="pull-right"></div>
          <div class="table-container">

            <!-- FORMULARIO -->
            <form method="POST" action="{{ route('acciones.store') }}" role="form" enctype="multipart/form-data">
 
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="indicativo_id" value="{{ $_GET["idIndicativo"] }}">
              <input type="hidden" name="nivel4_id" value="{{ $_GET["idNivel4"] }}">
             
              @include('planaccion.formulario.frm')
                                                                      
            </form>
            <!-- Fin del formulario -->

          </div>
        </div>
      </div>
    </div>
  </section>

@endsection