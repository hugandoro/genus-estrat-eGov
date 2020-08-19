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
            <form role="form" enctype="multipart/form-data">
 
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
             
              @include('tarea.formulario.frmShow')
                                                                      
            </form>
            <!-- Fin del formulario -->

          </div>
        </div>
      </div>
    </div>
  </section>

@endsection