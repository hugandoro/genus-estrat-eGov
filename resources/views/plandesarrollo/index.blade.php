@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Plan de Desarrollo</h3></div>
          <div class="pull-right"></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <tbody>
              @if($planDesarrollo->count())  
              @foreach($planDesarrollo as $plandesarrollo) 
              <tr>
                <th class="bg-info"><h2>{{$plandesarrollo->administracion->slogan}}</h2></th>
              </tr>

              <tr>
                <th class="bg-info"><h4>{{$plandesarrollo->nombre_nivel1}}</h4></th>
              </tr>

              <tr>
                <td>
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     @if($planDesarrolloNivel1->count())  
                     @foreach($planDesarrolloNivel1 as $pdN1) 
                     <tr>
                      <td>N° {{$pdN1->numeral}}</td>
                      <td>{{$pdN1->nombre}}</td>
                      <td>{{$pdN1->descripcion}}</td>
                      <td><a class="btn btn-primary btn-xs" href="{{action('PlanDesarrolloNivel1Controller@listar', $pdN1->id)}}" ><span class="glyphicon glyphicon-list"></span></a></td>
                     </tr>
                     @endforeach 
                     @endif
                    </tbody>
                  </table>
                </td>
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