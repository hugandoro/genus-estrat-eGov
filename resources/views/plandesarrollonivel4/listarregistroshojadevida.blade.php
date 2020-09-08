@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3><b>Plan de Desarrollo</b></h3></div>
          <div class="pull-right"></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <tbody>
              @if($planDesarrollo->count())  
              @foreach($planDesarrollo as $plandesarrollo) 
              <tr>
                <th class="bg-info"><h3>{{$plandesarrollo->administracion->slogan}}</h3></th>
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
                    <th><a href="{{ action('PlanDesarrolloNivel3Controller@listar',['idA' => $planDesarrolloNivel2->nivel1_id, 'idB' => $planDesarrolloNivel3->nivel2_id, 'idC' => $planDesarrolloNivel4->nivel3_id]) }}"><h6>Listar TODAS los {{$plandesarrollo->nombre_nivel4}} que conforman el {{$plandesarrollo->nombre_nivel3}}</h6></a></th>
                    <td><h6>-</h6></td>
                    <td><h6>-</h6></td>
                   </tr>

                   <tr class="bg-success">
                    <th colspan="3">
                      <div class="pull-left"><h4>{{$plandesarrollo->nombre_nivel4}}</h4></div>
                      <div class="pull-right"><a class="btn btn-warning" href="{{ URL::previous() }}"><span class="glyphicon glyphicon-share-alt"></span>  Volver</a></div>
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
                      <th>Responsable</th>
                     </tr>

                     <tr>
                      <td style="width:16%;font-size:30px;">{{$planDesarrolloNivel1->numeral}}.{{$planDesarrolloNivel2->numeral}}.{{$planDesarrolloNivel3->numeral}}.{{$planDesarrolloNivel4->numeral}}</td>
                      <td style="width:62%">{{$planDesarrolloNivel4->nombre}}</td>
                      <td style="width:22%">{{$planDesarrolloNivel4->entidadOficina->nombre}}</td>
                     </tr>

                    </tbody>
                  </table>

                  <hr>
                  <div class="bg-info">Indicador de producto</div><br>
                  <!-- Datos del indicador -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>Nombre</th><!-- Nombre del indicador --> 
                      <th>Unidad</th><!-- Unidad de medida --> 
                      <th>Base</th><!-- Linea base inicial --> 
                      <th>Año</th><!-- Año de la linea base --> 
                      <th>2023</th><!-- Meta a terminar en 2023 --> 
                      <th>Cuatrienio</th><!-- Meta a realizar en los 4 años --> 
                      <th>Medida</th><!-- Medicion (Numero - Porcentaje) --> 
                      <th>Tipo</th><!-- Tipo de medicion (Reduccion - Incremente - etc) --> 
                     </tr>

                     @foreach($indicador as $indicador) 
                      <tr>
                       <td style="width:26%">{{$indicador->nombre}}</td>
                       <td style="width:10%">{{$indicador->unidadMedida->nombre}}</td>

                       @if($indicador->Medida->id == 2)
                        <td style="width:10%">{{$indicador->linea_base * 100}} %</td> <!-- Linea base porcentual - Multiplica por 100 -->
                       @else
                        <td style="width:10%">{{$indicador->linea_base}}</td> <!-- Linea base numerica o en puntos-->
                       @endif

                       <td style="width:10%">{{$indicador->vigenciaBase->nombre}}</td>

                       @if($indicador->Medida->id == 2)
                        <td style="width:10%">{{$indicador->meta * 100}} %</td> <!-- Meta porcentual - Multiplica por 100 -->
                       @else
                        <td style="width:10%">{{$indicador->meta}}</td> <!-- Meta numerica o en puntos -->
                       @endif

                       @if(($indicador->Medida->id == 2) && ($indicador->Tipo->id == 3)) <!-- Objetivo porcentual y es de tipo mantenimiento - Igual a linea base y multiplica por 100 -->
                        <td style="width:10%">{{$indicador->linea_base * 100}} %</td>
                       @elseif(($indicador->Medida->id == 2) && ($indicador->Tipo->id != 3)) <!-- Objetivo porcentual y es tipo diferente a mantenimiento - Multiplica por 100 -->
                        <td style="width:10%">{{$indicador->objetivo * 100}} %</td>
                       @elseif(($indicador->Medida->id != 2) && ($indicador->Tipo->id == 3)) <!-- Objetivo diferente a porcentual y es de tipo mantenimiento - Igual a linea base-->
                        <td style="width:10%">{{$indicador->linea_base}}</td>
                       @elseif(($indicador->Medida->id != 2) && ($indicador->Tipo->id != 3)) <!-- Objetivo diferente a porcentual y es diferente a mantenimiento - Igual a objetivo-->
                        <td style="width:10%">{{$indicador->objetivo}}</td>
                       @endif

                       <td style="width:12%">{{$indicador->Medida->nombre}}</td>
                       <td style="width:12%">{{$indicador->Tipo->nombre}}</td>
                      </tr>
                     @endforeach 

                    </tbody>
                  </table>

                  <hr>
                  <div class="bg-info">Convergencia - Objetivos de desarrollo sostenible ODS</div><br>
                   <!-- Seccion para mostrar los ODS ya vinculados -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>ODS</th>
                      <th>Objetivo</th>
                     </tr>

                     @foreach($odsNivel4 as $odsNivel4) 
                      <tr>
                        <td style="width:10%">
                          <img src="{{ asset('images/'. $odsNivel4->odsInformacion->logo) }}" style='width:30px;height:30px;'></td>
                        <td style="width:90%;font-size:10px;">{{ $odsNivel4->odsInformacion->nombre }}</td>
                      </tr>
                     @endforeach

                    </tbody>
                  </table>

                  <hr>
                  <div class="bg-info">Convergencia - Plan de Desarrollo Nacional</div><br>
                   <!-- Seccion para mostrar componentes del PLAN NACIONAL DE DESARROLLO ya vinculados -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                     </tr>

                     @foreach($nacionalplanNivel4 as $planNivel4) 
                      <tr>
                        <td style="width:10%">{{ $planNivel4->nacionalplanInformacion->codigo }}</td>
                        <td style="width:34%;font-size:10px;">{{ $planNivel4->nacionalplanInformacion->nombre }}</td>
                        <td style="width:56%;font-size:10px;">{{ $planNivel4->nacionalplanInformacion->descripcion }}</td>
                      </tr>
                     @endforeach

                    </tbody>
                  </table>

                  <hr>
                  <div class="bg-info">Convergencia - Politicas Públicas Municipales</div><br>
                   <!-- Seccion para mostrar las POLITICAS PUBLICAS MUNICIPALES ya vinculadas -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                     </tr>

                     @foreach($municipalpoliticaNivel4 as $politicaNivel4) 
                      <tr>
                        <td style="width:10%">{{ $politicaNivel4->municipalpoliticaInformacion->id }}</td>
                        <td style="width:34%;font-size:10px;">{{ $politicaNivel4->municipalpoliticaInformacion->nombre }}</td>
                        <td style="width:56%;font-size:10px;">{{ $politicaNivel4->municipalpoliticaInformacion->descripcion }}</td>
                      </tr>
                     @endforeach

                    </tbody>
                  </table>

                  <hr>
                  <div class="bg-info">Convergencia - Modelo Integrado de Planeación y Gestión MIPG</div><br>
                   <!-- Seccion para mostrar las POLITICAS MIPG ya vinculadas -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>MIPG</th>
                      <th>Dimension</th>
                      <th>Politica</th>
                     </tr>

                     @foreach($mipgNivel4 as $mipgNivel4) 
                      <tr>
                        <td style="width:10%">
                          <img src="{{ asset('images/'. $mipgNivel4->mipgInformacion->logo) }}" style='width:30px;height:30px;'></td>
                        <td style="width:34%;font-size:10px;">{{ $mipgNivel4->mipgInformacion->dimension }}</td>
                        <td style="width:56%;font-size:10px;">{{ $mipgNivel4->mipgInformacion->nombre }}</td>
                      </tr>
                     @endforeach

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