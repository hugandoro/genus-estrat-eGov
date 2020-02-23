@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          @foreach($planDesarrollo as $plandesarrollo) 
            <div class="pull-left"><h3>Nuev@ {{$plandesarrollo->nombre_nivel2}}</h3></div>
          @endforeach 
          <div class="pull-right"></div>
          <div class="table-container">

            <!-- FORMULARIO -->
            <form method="POST" action="{{ route('plandesarrollonivel2.store') }}" role="form" enctype="multipart/form-data">
 
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="nivel1_id" value="{{ $idNivel1 }}">

              @include('plandesarrollonivel2.formulario.frm')
                                                                      
            </form>
            <!-- Fin del formulario -->

          </div>
        </div>
      </div>
    </div>
  </section>

@endsection