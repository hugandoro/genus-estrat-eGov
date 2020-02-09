@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>{{$refOdsObjetivo->nombre}}</h3></div>
          <div class="pull-right"></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">

             <tbody>
              <tr>
                <td><img src='{{ asset("images/$refOdsObjetivo->logo") }}' style='width:200px;height:200px;'></td>
                <!-- No se escapea este registro toda vez que el contenido viene por defecto y el usuario nunca las edita -->
                <td>{!!$refOdsObjetivo->descripcion!!}</td>
              </tr>

              <tr>
                <td></td>
                <td><a class="btn btn-info" href="{{ route('ods.index') }}" ><span class="glyphicon glyphicon-th-list"></span>  Regresar</a></td>
              </td>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection