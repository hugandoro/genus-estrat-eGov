@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Politicas publicas NACIONALES</h3></div>
          <div class="pull-right"></div>
          <div class="table-container">

            <!-- FORMULARIO -->
            <form method="POST" action="{{ route('ppnacional.store') }}" role="form" enctype="multipart/form-data">
 
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="estado_id" value="{{ config('app.estado') }}">
             
              @include('refnacionalpolitica.formulario.frm')
                                                                      
            </form>
            <!-- Fin del formulario -->

          </div>
        </div>
      </div>
    </div>
  </section>

@endsection