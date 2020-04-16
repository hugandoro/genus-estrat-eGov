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
                    <th style="width:30%"><a href="{{ route('plandesarrollo.index') }}"><h6>{{$plandesarrollo->nombre_nivel1}}</h6></a></th>
                    <td style="width:10%"><h6>N° {{$planDesarrolloNivel1->numeral}}</h6></td>
                    <td style="width:60%"><h6>{{$planDesarrolloNivel1->nombre}}</h6></td>
                   </tr>

                   <tr class="bg-secondary">
                    <th><a href="{{ action('PlanDesarrolloNivel1Controller@listar',$planDesarrolloNivel2->nivel1_id) }}"><h6>{{$plandesarrollo->nombre_nivel2}}</h6></a></th>
                    <td><h6>N° {{$planDesarrolloNivel2->numeral}}</h6></td>
                    <td><h6>{{$planDesarrolloNivel2->nombre}}</h6></td>
                   </tr>

                   <tr class="bg-secondary">
                    <th><a href="{{ action('PlanDesarrolloNivel2Controller@listar',['idA' => $planDesarrolloNivel2->nivel1_id, 'idB' => $planDesarrolloNivel3->nivel2_id]) }}"><h6>{{$plandesarrollo->nombre_nivel3}}</h6></a></th>
                    <td><h6>N° {{$planDesarrolloNivel3->numeral}}</h6></td>
                    <td><h6>{{$planDesarrolloNivel3->nombre}}</h6></td>
                   </tr>

                   <tr class="bg-secondary">
                    <th><a href="{{ action('PlanDesarrolloNivel3Controller@listar',['idA' => $planDesarrolloNivel2->nivel1_id, 'idB' => $planDesarrolloNivel3->nivel2_id, 'idC' => $planDesarrolloNivel4->nivel3_id]) }}"><h6>Volver a listar registros</h6></a></th>
                    <td><h6>-</h6></td>
                    <td><h6>-</h6></td>
                   </tr>

                   <tr class="bg-success">
                    <th colspan="3">
                      <div class="pull-left"><h4>Hoja de Vida de la <b>{{$plandesarrollo->nombre_nivel4}}</b></h4></div>
                      <div class="pull-right"></div>
                    </th>
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
                      <th>Objetivo</th>
                      <th>Responsable</th>
                      <th>Opciones</th>
                     </tr>

                     <tr>
                      <td style="width:10%">{{$planDesarrolloNivel1->numeral}}.{{$planDesarrolloNivel2->numeral}}.{{$planDesarrolloNivel3->numeral}}.{{$planDesarrolloNivel4->numeral}}</td>
                      <td style="width:20%">{{$planDesarrolloNivel4->nombre}}</td>
                      <td style="width:20%">{{$planDesarrolloNivel4->objetivo}}</td>
                      <td style="width:15%">{{$planDesarrolloNivel4->entidadOficina->nombre}}</td>
                      <td style="width:35%">
                      </td>
                     </tr>

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