@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Politicas publicas MUNICIPALES</h3></div>
          <div class="pull-right"><a class="btn btn-success" href="{{ route('ppmunicipal.create') }}" ><span class="glyphicon glyphicon-plus"></span>  Crear nuevo</a></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th class="bg-info">Nombre</th>
               <th class="bg-info">Descripcion</th>
               <th class="bg-info">Opciones</th>
             </thead>
             <tbody>
              @if($refMunicipalPolitica->count())  
              @foreach($refMunicipalPolitica as $politica)  
              <tr>
                <td>{{$politica->nombre}}</td>
                <td>{{$politica->descripcion}}</td>

                <!-- Ocpiones de EDICION y ELIMINAR -->
                <td>
                  <form action="{{ route('ppmunicipal.destroy',$politica->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a href="{{ route('ppmunicipal.edit',$politica->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Editar</a>
                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>  Eliminar</button>
                  </form>
                </td>
                <!-- Fin de los botones de opciones -->

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