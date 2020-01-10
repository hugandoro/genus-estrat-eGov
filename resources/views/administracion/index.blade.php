@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Administracion vigente</h3></div>
          <div class="pull-right"></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Representante legal</th>
               <th>Vigencia inicial</th>
               <th>Vigencia final</th>
               <th>Slogan</th>
             </thead>
             <tbody>
              @if($administracion->count())  
              @foreach($administracion as $admin)  
              <tr>
                <td>{{$admin->nombre_representante}}</td>
                <td>{{$admin->vigenciaInicial->nombre}}</td>
                <td>{{$admin->vigenciaFinal->nombre}}</td>
                <td>{{$admin->slogan}}</td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection