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
                <th class="bg-success">
                  <div class="pull-left"><h4>{{$plandesarrollo->nombre_nivel1}}</h4></div>
                  <div class="pull-right"><a class="btn btn-success" href="{{ route('plandesarrollonivel1.create') }}" ><span class="glyphicon glyphicon-plus"></span>  Crear nuevo</a></div>
                </th>
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
                     
                     @if($planDesarrolloNivel1->count())  
                     @foreach($planDesarrolloNivel1 as $pdN1) 
                     <tr>
                      <td style="width:10%">{{$pdN1->numeral}}</td>
                      <td style="width:20%">{{$pdN1->nombre}}</td>
                      <td style="width:35%">{{$pdN1->objetivo}}</td>
                      <td style="width:35%">
                        <!-- Ocpiones de EDICION y ELIMINAR -->
                        <form action="{{ route('plandesarrollonivel1.destroy',$pdN1->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a href="{{ action('PlanDesarrolloNivel1Controller@listar', $pdN1->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-folder-open"></span>  Listar</a>
                          <a href="{{ route('plandesarrollonivel1.edit',$pdN1->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Editar</a>
                          <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>  Eliminar</button>
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