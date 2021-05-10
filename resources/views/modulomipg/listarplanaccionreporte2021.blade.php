@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    @if(Session::has('messageA'))
    <p class="alert alert-danger" style="font-size:20px;font-weight: bold;text-align: center;">{{ Session::get('messageA') }}</p>
    @endif

    @if(Session::has('messageB'))
    <p class="alert alert-success" style="font-size:20px;font-weight: bold;text-align: center;">{{ Session::get('messageB') }}</p>
    @endif

    <div class="col-md-10 col-md-offset-1">
      <!-- <div class="col-md-8 col-md-offset-2"> -->

      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-right">
            <picture><img class='img-responsive' src="{{ asset('images/logo_mipg_dqs.jpeg') }}" width="160px"></picture>
          </div>
          <div class="pull-left">
            <h3>Modelo integrado planeación y gestión MIPG | <b>Plan de Acción 2021 - Reporte de tareas</b></h3>
          </div>
          <div class="pull-left">

            <!-- Formulario para filtro de consulta por SECRETARIAS -->
            <form method="GET" action="{{ url('/mipgplanaccionlistar2021') }}" role="form" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <table>
                <tr>
                  <td>
                    <div class="form-group">

                  <td>
                    <select class="form-control form-control-sm" name="filtroSecretaria">
                      <option value='9999' selected>Todas las dependencias</option>
                      @foreach($entidadOficina as $secretaria)
                      @if((isset($_GET['filtroSecretaria'])) && ($secretaria->id == $_GET['filtroSecretaria']))
                      <option value={{ $secretaria->id }} selected>{{ $secretaria->nombre }}</option>
                      @else
                      <option value={{ $secretaria->id }}>{{ $secretaria->nombre }}</option>
                      @endif
                      @endforeach
                    </select>
                  </td>

                  <td> >> </td>

                  <td>
                    <select class="form-control form-control-sm" name="filtroDimension">
                      <option value='9999' selected>Todas las dimensiones</option>
                      @foreach($moduloMipgNivel1 as $MIPGn1)
                      @if((isset($_GET['filtroDimension'])) && ($MIPGn1->id == $_GET['filtroDimension']))
                      <option value={{ $MIPGn1->id }} selected>{{ $MIPGn1->dimension }}</option>
                      @else
                      <option value={{ $MIPGn1->id }}>{{ $MIPGn1->dimension }}</option>
                      @endif
                      @endforeach
                    </select>
                  </td>

                  <td> >> </td>

                  <td>
                    <select class="form-control form-control-sm" name="filtropolitica">
                      <option value='9999' selected>Todas las politicas</option>
                      @foreach($moduloMipgNivel2 as $MIPGn2)
                      @if((isset($_GET['filtropolitica'])) && ($MIPGn2->id == $_GET['filtropolitica']))
                      <option value={{ $MIPGn2->id }} selected>{{ $MIPGn2->politica }}</option>
                      @else
                      <option value={{ $MIPGn2->id }}>{{ $MIPGn2->politica }}</option>
                      @endif
                      @endforeach
                    </select>
                  </td>

                  <td> >> </td>

                  <td>
                    @if(isset($_GET['filtropalabras']))
                    <input class="form-control form-control-sm" placeholder="Palabras clave..." name="filtropalabras" type="text" id="filtropalabras" value={{ $_GET['filtropalabras'] }}>
                    @else
                    <input class="form-control form-control-sm" placeholder="Palabras clave..." name="filtropalabras" type="text" id="filtropalabras">
                    @endif
                  </td>

          </div>
          </td>
          <td valign="top">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Filtrar</button>
          <td>
            </tr>
            </table>
            </form>
            <!-- Fin del formulario de filtros -->


        </div>
        <div class="table-container">
          <table id="mytable" class="table table-bordred table-striped">
            <tbody>

              <tr>
                <td>
                  <!-- Datos generales -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>

                      <tr>
                        <th>Codigo</th>
                        <th>Dimension</th>
                        <th>Politica</th>
                        <th>Accion</th>
                        <th>Objetivo</th>
                        <th>Unidad medida</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>Responsable</th>
                        <th></th>
                      </tr>

                      @foreach($moduloMipgNivel4 as $Nivel4)
                      <tr>
                        <td style="width:5%">{{$Nivel4->nivel3->nivel2->nivel1->numeral}}.{{$Nivel4->nivel3->nivel2->numeral}}.{{$Nivel4->nivel3->numeral}}.{{$Nivel4->numeral}}</td>
                        <td style="width:10%">{{$Nivel4->nivel3->nivel2->nivel1->dimension}}</td>
                        <td style="width:10%">{{$Nivel4->nivel3->nivel2->politica}}</td>
                        <td style="width:30%">{{$Nivel4->accion}}</td>
                        <td style="width:5%">{{$Nivel4->objetivo}}</td>
                        <td style="width:15%">{{$Nivel4->unidad_medida}}</td>
                        <td style="width:5%"></td>
                        <td style="width:5%"></td>
                        <td style="width:15%;font-size:10px;">{{$Nivel4->entidadOficina->nombre}}</td>

                        <!-- Valida si es un usuario (SUPERADMINISTRADOR) o si es un usuario (EDITOR asignado a la DEPENDENCIA) responable de esa actividad Nivel 4 -->
                        @if( (Auth::user()->hasRole('super')) || (Auth::user()->hasRole('editorMipg') && (Auth::user()->oficina_id) == $Nivel4->oficina_id) )
                        <td><a class="btn btn-success" href="{{ url('mipgtarea/create?idAccion='.$Nivel4->id.'&kpi='.$Nivel4->unidad_medida.'&kpiObjetivo='.$Nivel4->objetivo) }}"><span class="glyphicon glyphicon-plus"></span> Reportar</a></td>
                        @endif
                        <!-- Fin de la validacion de permisos para reportar -->

                      </tr>


                      <!-- Registros de las TAREAS reportadas -->
                      <tr>
                        <td></td>
                        <td style="width:95%;" colspan="8">
                          <table id="mytable" class="table table-bordered table-dark" style="background: #ffffff;">
                            <tr>
                              <th style="width:15%;background: #FFBEA6;">Fecha</th>
                              <th style="width:50%;background: #FFBEA6;">Tarea realizada</th>
                              <th style="width:15%;background: #FFBEA6;">Impacto al KPI OBJETIVO</th>
                              <th style="width:20%;background: #FFBEA6;">Opciones</th>
                            </tr>

                            @foreach ($tarea as $registro)
                            @if($registro->nivel4_id == $Nivel4->id)

                            <tr>
                              <td style="width:15%;">{{$registro->fecha_realizacion}}</td>
                              <td style="width:50%;">{{$registro->descripcion}}</td>
                              <td style="width:15%;">{{$registro->impacto_kpi}}</td>
                              <td style="width:20%;">

                                <a href="{{ route('mipgtarea.show',$registro->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-zoom-in"></span></a>

                                <!-- Ocpiones de EDICION y ELIMINAR -->
                                <!-- Valida si es un usuario (SUPERADMINISTRADOR O ADMINISTRADOR) o si es un usuario (EDITOR asignado a la DEPENDENCIA) responable de esa actividad Nivel 4 -->
                                @if( (Auth::user()->hasRole('super')) || (Auth::user()->hasRole('editorMipg') && (Auth::user()->oficina_id) == $Nivel4->oficina_id) )

                                  <!-- Calcula la diferencia de horas entre Fecha de Reporte y Fecha actual -->
                                  @php
                                    $fechaCreado = $registro->created_at;
                                    $fechaActual = new DateTime();
                                  @endphp

                                  <!-- Valida si supera el filtro de las 24 horas permitidas para editar -->
                                  <!-- Tambien se incluye filtro en la vista "edit.blade.php" -->
                                  @if ($fechaActual->diff($fechaCreado)->days <= 1 ) <form action="{{ route('mipgtarea.destroy',$registro->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <a href="{{ route('mipgtarea.edit',$registro->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>
                                  @else
                                      <form action="{{ route('mipgtarea.destroy',$registro->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      </form>
                                  @endif

                                @endif
                                <!-- Fin de los botones de opciones -->

                              </td>
                            </tr>

                            @endif
                            @endforeach
                            <!-- Fin listado tareas reportadas -->


                          </table>
                        </td>
                      </tr>

                      @endforeach

                      @if (count($moduloMipgNivel4))
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