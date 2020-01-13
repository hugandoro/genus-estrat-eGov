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
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th class="bg-info">Nombre</th>
               <th class="bg-info">Descripcion</th>
             </thead>
             <tbody>
              @if($refNacionalPolitica->count())  
              @foreach($refNacionalPolitica as $politica)  
              <tr>
                <td>{{$politica->nombre}}</td>
                <td>{{$politica->descripcion}}</td>
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