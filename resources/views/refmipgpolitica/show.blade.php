@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>{{$refMipgPolitica->nombre}}</h3></div>
          <div class="pull-right"></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">

             <tbody>
              <tr>
                <td><img src='{{ asset("images/$refMipgPolitica->logo") }}' style='width:200px;height:200px;'></td>
                <!-- No se escapea este registro toda vez que el contenido viene por defecto y el usuario nunca las edita -->
                <td>Politica perteneciente a la dimensión de {!!$refMipgPolitica->dimension!!}</td>
                <td>{!!$refMipgPolitica->descripcion!!}</td>
                <td>Para mas información te invitamos a consultar la página de la función publica visitando el siguiente <a href="https://www.funcionpublica.gov.co/web/mipg/como-opera-mipg">link de acceso</a></td>
              </tr>

              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><a class="btn btn-info" href="{{ route('mipg.index') }}" ><span class="glyphicon glyphicon-th-list"></span>  Regresar</a></td>
              </td>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection