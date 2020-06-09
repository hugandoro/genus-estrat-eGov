@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Entidad o Empresa</h3></div>
          <div class="pull-right"></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <tbody>
              @if($entidad->count())  
              @foreach($entidad as $entidad) 
              <tr>
                <th class="bg-info">Orden</th>
                <td>{{$entidad->orden->nombre}}</td>
              </tr>

              <tr>
                <th class="bg-info">Tipo</th>
                <td>{{$entidad->tipo->nombre}}</td>
              </tr>

              <tr>
                <th class="bg-info">Categoria</th>
                <td>{{$entidad->categoria->nombre}}</td>
              </tr>

              <tr>
                <th class="bg-info">Sector</th>
                <td>{{$entidad->sector->nombre}}</td>
              </tr>

              <tr>
                <th class="bg-info">Municipio</th>
                <td>{{$entidad->municipio->nombre}}</td>
              </tr> 

              <tr>
                <th class="bg-info">Nombre</th>
                <td>{{$entidad->nombre}}</td>
              </tr>

              <tr>
                <th class="bg-info">Direccion</th>
                <td>{{$entidad->direccion}}</td>
              </tr>

              <tr>
                <th class="bg-info">Telefono</th>
                <td>{{$entidad->telefono}}</td>
              </tr>

              <tr>
                <th class="bg-info">Email</th>
                <td>{{$entidad->email}}</td>
              </tr>

              <tr>
                <th class="bg-info">Opciones</th>
                <td>
                  @if(Auth::user()->hasRole('super'))
                    <a href="{{ route('entidad.edit',$entidad->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Editar</a>
                  @endif
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