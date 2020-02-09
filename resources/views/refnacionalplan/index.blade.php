@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Plan de desarrollo NACIONAL</h3></div>
          <div class="pull-right"></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th class="bg-info">Codigo</th>
               <th class="bg-info">Nombre</th>
               <th class="bg-info">Descripcion</th>
             </thead>
             <tbody>
              @if($refNacionalPlan->count())  
              @foreach($refNacionalPlan as $plan)  
              <tr>
                <td style="width:10%">{{$plan->codigo}}</td>
                <td style="width:30%">{{$plan->nombre}}</td>
                <td style="width:60%">{{$plan->descripcion}}</td>
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