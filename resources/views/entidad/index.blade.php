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
                <th class="bg-info">Tipo</th>
                <th class="bg-info">Categoria</th>
                <th class="bg-info">Sector</th>
                <th class="bg-info">Municipio</th>
              </tr> 
              <tr>
                <td>{{$entidad->orden->nombre}}</td>
                <td>{{$entidad->tipo->nombre}}</td>
                <td>{{$entidad->categoria->nombre}}</td>
                <td>{{$entidad->sector->nombre}}</td>
                <td>{{$entidad->municipio->nombre}}</td>
              </tr>
              
              <tr>
                <th class="bg-info">Nombre</th>
                <th class="bg-info">Direccion</th>
                <th class="bg-info">Telefono</th>
                <th class="bg-info" colspan="2">Email</th>
              <tr>
              <tr>
                <td>{{$entidad->nombre}}</td>
                <td>{{$entidad->direccion}}</td>
                <td>{{$entidad->telefono}}</td>
                <td colspan="2">{{$entidad->email}}</td>
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