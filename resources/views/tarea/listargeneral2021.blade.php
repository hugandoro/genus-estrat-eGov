@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-10 col-md-offset-1">
    <!-- <div class="col-md-8 col-md-offset-2"> -->

      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Plan de Desarrollo | <b>Cronologico tareas reportadas en plataforma | 2021</b></h3></div>
          <div class="pull-right">

          </div>

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
                  <h4><b>{{ $totalTareas }}</b> | Tareas registradas en el sistema
                    @if ((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')))
                      | <a href="{{ url('/tareaslistargeneralexcel2021') }}"><img src="{{ asset("images/iconos/excel.png") }}" alt="Estrategov" width="60px"></a>
                    @endif
                  </h4>
                </td>
              </tr>

              <tr>
                <td>
                  <!-- Datos generales -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                      <tr>
                        <th style="width:5%;">Id</th>
                        <th style="width:10%;">Dependencia</th>
                        <th style="width:5%;">Actividad</th>
                        <th style="width:10%;">Vigencia</th>
                        <th style="width:30%;">Accion inscrita</th>
                        <th style="width:10%;">Fecha</th>
                        <th style="width:25%;">Tarea reportada</th>
                        <th style="width:5%;">Opciones</th>
                      </tr>

                      <!-- Listado de las tareas reportadas -->
                      @foreach ($tarea as $registro)
                        <tr>
                          <td>{{$registro->id}}</td>
                          <td>{{$registro->accion->planIndicativo->indicador->Nivel4->entidadOficina->nombre}}</td>
                          <td>
                            <a href="{{ url('/planaccionlistarreporte?filtroactividad=' . $registro->accion->planIndicativo->indicador->Nivel4->id) }}">
                              {{$registro->accion->planIndicativo->indicador->Nivel4->numeral}}
                            </a>
                          </td>
                          <td>{{$registro->accion->planIndicativo->vigencia->nombre}}</td>
                          <td>{{$registro->accion->descripcion}}</td>
                          <td>{{$registro->fecha_realizacion}}</td>
                          <td>{{$registro->descripcion}}</td>
                          <td><a href="{{ route('tarea.show',$registro->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-zoom-in"></span></a></td>
                        </tr>
                      @endforeach
                      <!-- Fin listado tareas reportadas -->
  
                     @if (count($tarea))
                          {{ $pagination }}
                      @endif

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