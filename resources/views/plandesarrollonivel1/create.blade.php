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
            <form method="POST" action="{{ route('plandesarrollonivel1.store') }}" role="form" enctype="multipart/form-data">
 
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="plan_desarrollo_id" value="{{ config('app.plan_desarrollo') }}">
             
              @include('plandesarrollonivel1.formulario.frm')
                                                                      
            </form>
            <!-- Fin del formulario -->

          </div>
        </div>
      </div>
    </div>
  </section>

@endsection