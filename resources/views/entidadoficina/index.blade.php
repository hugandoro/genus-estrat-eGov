@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Dependencias</h3></div>
          <div class="pull-right"><a class="btn btn-success" href="{{ route('entidadoficina.create') }}" ><span class="glyphicon glyphicon-plus"></span>  Crear nuevo</a></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <tbody>
              <tr>
                <th class="bg-info">Tipo</th>
                <th class="bg-info">Nombre</th>
                <th class="bg-info">Responsable</th>
                <th class="bg-info">Opciones</th>
              </tr> 

              @if($entidadOficina->count())  
              @foreach($entidadOficina as $oficina) 
              <tr>
                <td style="width:10%">{{$oficina->tipoOficina->nombre}}</td>
                <td style="width:40%">{{$oficina->nombre}}</td>
                <td style="width:20%">{{$oficina->responsable}}</td>
                <!-- Ocpiones de EDICION y ELIMINAR -->
                <td style="width:30%">
                  <form action="{{ route('entidadoficina.destroy',$oficina->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a href="{{ route('entidadoficina.edit',$oficina->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Editar</a>
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