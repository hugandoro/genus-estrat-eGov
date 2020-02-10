@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          @foreach($planDesarrollo as $plandesarrollo) 
            <div class="pull-left"><h3>Nuev@ {{$plandesarrollo->nombre_nivel1}}</h3></div>
          @endforeach 
          <div class="pull-right"></div>
          <div class="table-container">

            <!-- FORMULARIO -->
            <form method="POST" action="{{ route('plandesarrollonivel1.update',$planDesarrolloNivel1->id) }}" role="form" enctype="multipart/form-data">
 
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
             
              @include('plandesarrollonivel1.formulario.frm')
                                                                      
            </form>
            <!-- Fin del formulario -->

          </div>
        </div>
      </div>
    </div>
  </section>

@endsection