@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Organigrama</h3></div>
          <div class="pull-right"></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <tbody>
              <tr>
                <th class="bg-info">Tipo</th>
                <th class="bg-info">Nombre</th>
                <th class="bg-info">Responsable</th>
                <th class="bg-info">Metas a cargo</th>
              </tr> 

              @if($entidadOficina->count())  
              @foreach($entidadOficina as $oficina) 
              <tr>
                <td>{{$oficina->tipoOficina->nombre}}</td>
                <td>{{$oficina->nombre}}</td>
                <td>{{$oficina->responsable}}</td>
                <td>0</td>
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