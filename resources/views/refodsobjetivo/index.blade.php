@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Objetivos Desarrollo Sostenible ODS</h3></div>
          <div class="pull-right"></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th class="bg-info">ODS</th>
               <th class="bg-info">Objetivo</th>
               <!-- <th>Descripcion</th> -->
             </thead>
             <tbody>
              @if($refOdsObjetivo->count())  
              @foreach($refOdsObjetivo as $ods)  
              <tr>
                <td><img src='{{ asset("images/$ods->logo") }}' style='width:50px;height:50px;'>
                </td>
                <td>{{$ods->nombre}}</td>
                <!-- <td>{{$ods->descripcion}}</td> -->
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