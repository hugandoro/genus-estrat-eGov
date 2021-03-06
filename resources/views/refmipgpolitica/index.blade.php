@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Modelo Integradio de Planeacion y Gestion MIPG</h3></div>
          <div class="pull-right"></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th class="bg-info"></th>
               <th class="bg-info">Politica</th>
               <th class="bg-info">Dimension</th>
               <th class="bg-info">Opciones</th>
               <!-- <th>Descripcion</th> -->
             </thead>
             <tbody>
              @if($refMipgPolitica->count())  
              @foreach($refMipgPolitica as $mipg)  
              <tr>
                <td><img src='{{ asset("images/$mipg->logo") }}' style='width:50px;height:50px;'>
                </td>
                <td>{{$mipg->nombre}}</td>
                <td>{{$mipg->dimension}}</td>
                <td><a class="btn btn-info" href="{{ route('mipg.show',$mipg->id) }}" ><span class="glyphicon glyphicon-folder-open"></span>  Ampliar</a></td>
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