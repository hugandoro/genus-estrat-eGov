@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          @foreach($planDesarrollo as $plandesarrollo) 
            <div class="pull-left"><h3>Nuev@ {{$plandesarrollo->nombre_nivel4}}</h3></div>
          @endforeach 
          <div class="pull-right"></div>
          <div class="table-container">

            <!-- FORMULARIO -->
            <form method="POST" action="{{ route('plandesarrollonivel4.update',$planDesarrolloNivel4->id) }}" role="form" enctype="multipart/form-data">
 
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="nivel1_id" value="{{ $planDesarrolloNivel2->nivel1_id }}">
              <input type="hidden" name="nivel2_id" value="{{ $planDesarrolloNivel3->nivel2_id }}">
              <input type="hidden" name="nivel3_id" value="{{ $planDesarrolloNivel4->nivel3_id }}">
             
              @include('plandesarrollonivel4.formulario.frm')
                                                                      
            </form>
            <!-- Fin del formulario -->

          </div>
        </div>
      </div>
    </div>
  </section>

@endsection