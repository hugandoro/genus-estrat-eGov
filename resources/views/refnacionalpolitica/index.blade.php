@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Politicas publicas NACIONALES</h3></div>

          @if(Auth::user()->hasRole('super'))
            <div class="pull-right"><a class="btn btn-success" href="{{ route('ppnacional.create') }}" ><span class="glyphicon glyphicon-plus"></span>  Crear nuevo</a></div>
          @endif

          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th class="bg-info">Nombre</th>
               <th class="bg-info">Descripcion</th>
               <th class="bg-info">Opciones</th>
             </thead>
             <tbody>
              @if($refNacionalPolitica->count())  
              @foreach($refNacionalPolitica as $politica)  
              <tr>
                <td style="width:20%">{{$politica->nombre}}</td>
                <td style="width:50%">{{$politica->descripcion}}</td>

                <!-- Ocpiones de EDICION y ELIMINAR -->
                <td style="width:30%">
                  @if(Auth::user()->hasRole('super'))
                    <form action="{{ route('ppnacional.destroy',$politica->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <a href="{{ route('ppnacional.edit',$politica->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Editar</a>
                      <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>  Eliminar</button>
                    </form>
                  @endif
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