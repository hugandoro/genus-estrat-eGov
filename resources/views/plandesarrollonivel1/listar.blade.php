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

                   <tr class="bg-success">
                    <th colspan="3">
                      <div class="pull-left"><h4>{{$plandesarrollo->nombre_nivel2}}</h4></div>
                      <div class="pull-right"><a class="btn btn-success" href="{{ url('plandesarrollonivel2/create?idNivel1='.$planDesarrolloNivel1->id) }}" ><span class="glyphicon glyphicon-plus"></span>  Crear nuevo</a></div>
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
                      <th>Opciones</th>
                     </tr>

                     @if($planDesarrolloNivel2->count())  
                     @foreach($planDesarrolloNivel2 as $pdN2) 
                     <tr>
                      <td style="width:10%">{{$planDesarrolloNivel1->numeral}}.{{$pdN2->numeral}}</td>
                      <td style="width:20%">{{$pdN2->nombre}}</td>
                      <td style="width:35%">{{$pdN2->objetivo}}</td>
                      <td style="width:35%">
                        <!-- Ocpiones de EDICION y ELIMINAR -->
                        <form action="{{ route('plandesarrollonivel2.destroy',$pdN2->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a href="{{ action('PlanDesarrolloNivel2Controller@listar', ['idA'=>$planDesarrolloNivel1->id, 'idB'=>$pdN2->id]) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-folder-open"></span>  Listar</a>
                          <a href="{{ route('plandesarrollonivel2.edit',$pdN2->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span>  Editar</a>
                          <button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>  Eliminar</button>
                        </form>
                        <!-- Fin de los botones de opciones -->
                      </td>
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