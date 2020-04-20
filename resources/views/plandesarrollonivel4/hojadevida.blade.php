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
                      <div class="pull-left"><h4>{{$plandesarrollo->nombre_nivel4}}</h4></div>
                      <div class="pull-right"></div>
                    </th>
                   </tr>
                  </tbody>
                </table>
              </tr>

              <tr>
                <td>
                  <!-- Datos generales -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>N°</th>
                      <th>Titulo</th>
                      <th>Objetivo</th>
                      <th>Responsable</th>
                     </tr>

                     <tr>
                      <td style="width:16%">{{$planDesarrolloNivel1->numeral}}.{{$planDesarrolloNivel2->numeral}}.{{$planDesarrolloNivel3->numeral}}.{{$planDesarrolloNivel4->numeral}}</td>
                      <td style="width:30%">{{$planDesarrolloNivel4->nombre}}</td>
                      <td style="width:32%">{{$planDesarrolloNivel4->objetivo}}</td>
                      <td style="width:22%">{{$planDesarrolloNivel4->entidadOficina->nombre}}</td>
                     </tr>

                    </tbody>
                  </table>

                  <hr><hr>
                  <b>Indicador de producto</b><br><br>
                  <!-- Datos del indicador -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <!-- Nombre del indicador --> <th>Nombre indicador</th>
                      <!-- Unidad de medida --> <th>Unidad de medida</th>
                      <!-- Linea base inicial --> <th>Linea base</th>
                      <!-- Año de la linea base --> <th>Año linea base</th>
                      <!-- Meta a terminar en 2023 --> <th>Meta a 2023</th>
                      <!-- Meta a realizar en los 4 años --> <th>Meta cuatrenio</th>
                      <!-- Medicion (Numero - Porcentaje) --> <th>Medida</th>
                      <!-- Tipo de medicion (Reduccion - Incremente - etc) --> <th>Tipo</th>
                      <!-- Opciones del indicador --> <th>Opciones</th>
                     </tr>

                     <tr>
                      <td style="width:16%">xxxx</td>
                      <td style="width:10%">Kilometros</td>
                      <td style="width:10%">100</td>
                      <td style="width:10%">2019</td>
                      <td style="width:10%">200</td>
                      <td style="width:10%">100</td>
                      <td style="width:12%">Numerico</td>
                      <td style="width:12%">Incremento</td>
                      <td style="width:10%">
                        <a href="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span>  Editar</a>
                      </td>
                     </tr>
                    </tbody>
                  </table>

                  <hr><hr>
                  <b>Convergencia - Objetivos de desarrollo sostenible</b><br><br>
                  <!-- Vinculo a ODS -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>ODS</th>
                      <th>Objetivo</th>
                      <th>Opciones<div class="pull-right"><a href="" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>  Vincular</a><div></th>
                     </tr>

                     <tr>
                      <td style="width:16%">ODS N° 1</td>
                      <td style="width:50%">Texto descriptivo del ODS</td>
                      <td style="width:34%">
                        <a href="" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>  Desvincular</a>
                      </td>
                     </tr>
                    </tbody>
                  </table>

                  <hr><hr>
                  <b>Convergencia - Plan de desarrollo nacional</b><br><br>
                  <!-- Vinculo a Plan Desarrollo Nacional -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Opciones<div class="pull-right"><a href="" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>  Vincular</a><div></th>
                     </tr>

                     <tr>
                      <td style="width:16%">1.1</td>
                      <td style="width:20%">PACTO POR LA LEGALIDAD</td>
                      <td style="width:30%">Texto que lo describe</td>
                      <td style="width:34%">
                        <a href="" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>  Desvincular</a>
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