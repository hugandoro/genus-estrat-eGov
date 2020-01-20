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
                <table id="mytable" class="table  table-bordred">
                  <tbody>
                   <tr class="bg-secondary">
                    <th style="width:30%"><h6>{{$plandesarrollo->nombre_nivel1}}</h6></th>
                    <td style="width:10%"><h6>N° {{$planDesarrolloNivel1->numeral}}</h6></td>
                    <td style="width:60%"><h6>{{$planDesarrolloNivel1->nombre}}</h6></td>
                   </tr>

                   <tr class="bg-secondary">
                    <th><h6>{{$plandesarrollo->nombre_nivel2}}</h6></th>
                    <td><h6>N° {{$planDesarrolloNivel2->numeral}}</h6></td>
                    <td><h6>{{$planDesarrolloNivel2->nombre}}</h6></td>
                   </tr>

                   <tr class="bg-success">
                    <th><h4>{{$plandesarrollo->nombre_nivel3}}</h4></th>
                    <td></td>
                    <td></td>
                   </tr>
                  </tbody>
                </table>
              </tr>

              <tr>
                <td>
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>N°</th>
                      <th>Titulo</th>
                      <th>Descripcion</th>
                      <th>Acciones</th>
                     </tr>

                     @if($planDesarrolloNivel3->count())  
                     @foreach($planDesarrolloNivel3 as $pdN3) 
                     <tr>
                      <td>{{$planDesarrolloNivel1->numeral}}.{{$planDesarrolloNivel2->numeral}}.{{$pdN3->numeral}}</td>
                      <td>{{$pdN3->nombre}}</td>
                      <td>{{$pdN3->descripcion}}</td>
                      <td><a class="btn btn-primary btn-xs" href="{{action('PlanDesarrolloNivel3Controller@listar', ['idA'=>$planDesarrolloNivel1->id, 'idB'=>$planDesarrolloNivel2->id, 'idC'=>$pdN3->id])}}" ><span class="glyphicon glyphicon-list"></span></a></td>
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