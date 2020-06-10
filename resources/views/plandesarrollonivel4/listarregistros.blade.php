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

              @foreach($planDesarrollo as $plandesarrollo) 
                <tr>
                  <th class="bg-info"><h3>{{$plandesarrollo->administracion->slogan}}</h3></th>
                </tr>
              @endforeach 

              <tr>
                <td>
                  <!-- Datos generales -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      @foreach($planDesarrollo as $plandesarrollo) 
                        <th>Codigo</th>
                        <th>{{$plandesarrollo->nombre_nivel1}}</th>
                        <th>{{$plandesarrollo->nombre_nivel2}}</th>
                        <th>{{$plandesarrollo->nombre_nivel3}}</th>
                        <th>{{$plandesarrollo->nombre_nivel4}}</th>
                        <th>Responsable</th>
                        <th>Opciones</th>
                      @endforeach 
                     </tr>

                     @foreach($planDesarrolloNivel4 as $nivel4) 
                      <tr>
                        <td style="width:8%">{{$nivel4->nivel3->nivel2->nivel1->numeral}}.{{$nivel4->nivel3->nivel2->numeral}}.{{$nivel4->nivel3->numeral}}.{{$nivel4->numeral}}</td>
                        <td style="width:12%">{{$nivel4->nivel3->nivel2->nivel1->nombre}}</td>
                        <td style="width:15%">{{$nivel4->nivel3->nivel2->nombre}}</td>
                        <td style="width:15%">{{$nivel4->nivel3->nombre}}</td>
                        <td style="width:25%">{{$nivel4->nombre}}</td>
                        <td style="width:15%">{{$nivel4->entidadOficina->nombre}}</td>
                        <td style="width:10%">
                          <a href="{{ action('PlanDesarrolloNivel4Controller@listarRegistrosHojaDeVida', ['idA'=>$nivel4->nivel3->nivel2->nivel1->id, 'idB'=>$nivel4->nivel3->nivel2->id, 'idC'=>$nivel4->nivel3->id, 'idD'=>$nivel4->id]) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-list-alt"></span>  Hoja de vida</a>
                        </td>
                      </tr>
                     @endforeach 


                    </tbody>
                  </table>
                </td>
              </tr>

            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection