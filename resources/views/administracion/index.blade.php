@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Administracion vigente</h3></div>
          <div class="pull-right"></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <tbody>
              @if($administracion->count())  
              @foreach($administracion as $admin)  
              <tr>
                <th class="bg-info">Logotipo</th>
                <td><img src='{{ asset("images/$admin->logo") }}' style='width:100px;height:100px;'></td>
              </tr>

              <tr>
                <th class="bg-info">Representante legal</th>
                <td>{{$admin->nombre_representante}}</td>
              </tr>

              <tr>
                <th class="bg-info">Slogan</th>
                <td>{{$admin->slogan}}</td>
              </tr>

              <tr>
                <th class="bg-info">Vigencia inicial</th>
                <td>{{$admin->vigenciaInicial->nombre}}</td>
              </tr>

              <tr>
                <th class="bg-info">Vigencia final</th>
                <td>{{$admin->vigenciaFinal->nombre}}</td>
              </tr>

              <tr>
                <th class="bg-info">Opciones</th>
                <td>
                  @if(Auth::user()->hasRole('super'))
                    <a href="{{ route('administracion.edit',$admin->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Editar</a>
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