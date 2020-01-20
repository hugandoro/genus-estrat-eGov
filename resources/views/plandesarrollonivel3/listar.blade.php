@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Plan de Desarrollo</h3></div>
          <div class="pull-right"></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <tbody>
              @if($planDesarrollo->count())  
              @foreach($planDesarrollo as $plandesarrollo) 
              <tr>
                <th class="bg-info"><h2>{{$plandesarrollo->administracion->slogan}}</h2></th>
              </tr>

              <tr>
                <th class="bg-info"><h4>{{$plandesarrollo->nombre_nivel1}} || {{$plandesarrollo->nombre_nivel2}} || {{$plandesarrollo->nombre_nivel3}} || {{$plandesarrollo->nombre_nivel4}}</h4></th>
              </tr>

              <tr>
                <td>
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     @if($planDesarrolloNivel4->count())  
                     @foreach($planDesarrolloNivel4 as $pdN4) 
                     <tr>
                      <td>N° {{$pdN4->numeral}}</td>
                      <td>{{$pdN4->nombre}}</td>
                      <td>{{$pdN4->descripcion}}</td>
                      <td>{{$pdN4->linea_base}}</td>
                      <td>{{$pdN4->objetivo}}</td>
                      <td>{{$pdN4->unidad_medida}}</td>
                      <td><a class="btn btn-primary btn-xs" href="#" ><span class="glyphicon glyphicon-list"></span></a></td>
                     </tr>
                     @endforeach 
                     @endif
                    </tbody>
                  </table>
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