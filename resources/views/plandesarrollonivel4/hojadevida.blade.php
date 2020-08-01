@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3><b>Plan de Desarrollo</b></h3></div>
          <div class="pull-right"></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <tbody>
              @if($planDesarrollo->count())  
              @foreach($planDesarrollo as $plandesarrollo) 
              <tr>
                <th class="bg-info"><h3>{{$plandesarrollo->administracion->slogan}}</h3></th>
              </tr>

              <tr>
                <table id="mytable" class="table  table-bordred">
                  <tbody>
                   <tr class="bg-secondary">
                    <th style="width:30%"><a href="{{ route('plandesarrollo.index') }}"><h6>{{$plandesarrollo->nombre_nivel1}}</h6></a></th>
                    <td style="width:10%"><h6>N° {{$planDesarrolloNivel1->numeral}}</h6></td>
                    <td style="width:60%"><h6>{{$planDesarrolloNivel1->nombre}}</h6></td>
                   </tr>

                   <tr class="bg-secondary">
                    <th><a href="{{ action('PlanDesarrolloNivel1Controller@listar',$planDesarrolloNivel2->nivel1_id) }}"><h6>{{$plandesarrollo->nombre_nivel2}}</h6></a></th>
                    <td><h6>N° {{$planDesarrolloNivel2->numeral}}</h6></td>
                    <td><h6>{{$planDesarrolloNivel2->nombre}}</h6></td>
                   </tr>

                   <tr class="bg-secondary">
                    <th><a href="{{ action('PlanDesarrolloNivel2Controller@listar',['idA' => $planDesarrolloNivel2->nivel1_id, 'idB' => $planDesarrolloNivel3->nivel2_id]) }}"><h6>{{$plandesarrollo->nombre_nivel3}}</h6></a></th>
                    <td><h6>N° {{$planDesarrolloNivel3->numeral}}</h6></td>
                    <td><h6>{{$planDesarrolloNivel3->nombre}}</h6></td>
                   </tr>

                   <tr class="bg-secondary">
                    <th><a href="{{ action('PlanDesarrolloNivel3Controller@listar',['idA' => $planDesarrolloNivel2->nivel1_id, 'idB' => $planDesarrolloNivel3->nivel2_id, 'idC' => $planDesarrolloNivel4->nivel3_id]) }}"><h6>Volver a listar registros</h6></a></th>
                    <td><h6>-</h6></td>
                    <td><h6>-</h6></td>
                   </tr>

                   <tr class="bg-success">
                    <th colspan="3">
                      <div class="pull-left"><h4>{{$plandesarrollo->nombre_nivel4}}</h4></div>
                      <div class="pull-right"></div>
                    </th>
                   </tr>
                  </tbody>
                </table>
              </tr>

              <tr>
                <td>
                  <!-- Datos generales -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>N°</th>
                      <th>Titulo</th>
                      <th>Responsable</th>
                     </tr>

                     <tr>
                      <td style="width:16%;font-size:30px;">{{$planDesarrolloNivel1->numeral}}.{{$planDesarrolloNivel2->numeral}}.{{$planDesarrolloNivel3->numeral}}.{{$planDesarrolloNivel4->numeral}}</td>
                      <td style="width:62%">{{$planDesarrolloNivel4->nombre}}</td>
                      <td style="width:22%">{{$planDesarrolloNivel4->entidadOficina->nombre}}</td>
                     </tr>

                    </tbody>
                  </table>

                  <hr>
                  <div class="bg-info">Indicador de producto</div><br>
                  <!-- Datos del indicador -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>Nombre</th><!-- Nombre del indicador --> 
                      <th>Unidad</th><!-- Unidad de medida --> 
                      <th>Base</th><!-- Linea base inicial --> 
                      <th>Año</th><!-- Año de la linea base --> 
                      <th>2023</th><!-- Meta a terminar en 2023 --> 
                      <th>Cuatrienio</th><!-- Meta a realizar en los 4 años --> 
                      <th>Medida</th><!-- Medicion (Numero - Porcentaje) --> 
                      <th>Tipo</th><!-- Tipo de medicion (Reduccion - Incremente - etc) --> 
                      <th></th><!-- Opciones del indicador --> 
                     </tr>

                     @foreach($indicador as $indicador) 
                      <tr>
                       <td style="width:16%">{{$indicador->nombre}}</td>
                       <td style="width:10%">{{$indicador->unidadMedida->nombre}}</td>
                       <td style="width:10%">{{$indicador->linea_base}}</td>
                       <td style="width:10%">{{$indicador->vigenciaBase->nombre}}</td>
                       <td style="width:10%">{{$indicador->meta}}</td>
                       <td style="width:10%">{{$indicador->objetivo}}</td>
                       <td style="width:12%">{{$indicador->Medida->nombre}}</td>
                       <td style="width:12%">{{$indicador->Tipo->nombre}}</td>
                       <td style="width:10%">
                        @if(Auth::user()->hasRole('super'))
                        <a href="{{ route('indicador.edit',$indicador->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span>  Editar</a>
                        @endif
                       </td>
                      </tr>
                     @endforeach 

                    </tbody>
                  </table>

                  <hr>
                  <div class="bg-info">Convergencia - Objetivos de desarrollo sostenible ODS</div><br>
                  <!-- VINCULAR LOS ODS QUE CONVERGEN -->
                  @if(Auth::user()->hasRole('super'))
                    <div class="pull-right">
                      <form method="POST" action="{{ route('vincularods') }}" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="nivel1_id" value="{{ $planDesarrolloNivel1->id }}">
                        <input type="hidden" name="nivel2_id" value="{{ $planDesarrolloNivel2->id }}">
                        <input type="hidden" name="nivel3_id" value="{{ $planDesarrolloNivel3->id }}">
                        <input type="hidden" name="nivel4_id" value="{{ $planDesarrolloNivel4->id }}">
                        <input type="hidden" name="funcion" value="vincular">
                        <table>
                          <tr>
                            <td>
                              <div class="form-group">
                                <select class="form-control" name="ods_id">
                                  @foreach($refOdsObjetivo as $ods) 
                                    <option value={{ $ods->id }}>{{ $ods->nombre }}</option>
                                  @endforeach
                                </select> 
                              </div>
                            </td>
                            <td valign="top">
                              @if(Auth::user()->hasRole('super'))
                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Vincular</button>
                              @endif
                            <td>
                          </tr>
                        </table>
                      </form>
                    </div>
                  @endif

                   <!-- Seccion para mostrar los ODS ya vinculados -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>ODS</th>
                      <th>Objetivo</th>
                      <th></th>
                     </tr>

                     @foreach($odsNivel4 as $odsNivel4) 
                      <tr>
                        <td style="width:10%">
                          <img src="{{ asset('images/'. $odsNivel4->odsInformacion->logo) }}" style='width:30px;height:30px;'></td>
                        <td style="width:76%;font-size:10px;">{{ $odsNivel4->odsInformacion->nombre }}</td>
                        <td style="width:14%">
                          @if(Auth::user()->hasRole('super'))
                            <form method="POST" action="{{ route('vincularods') }}" role="form" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="nivel1_id" value="{{ $planDesarrolloNivel1->id }}">
                              <input type="hidden" name="nivel2_id" value="{{ $planDesarrolloNivel2->id }}">
                              <input type="hidden" name="nivel3_id" value="{{ $planDesarrolloNivel3->id }}">
                              <input type="hidden" name="nivel4_id" value="{{ $planDesarrolloNivel4->id }}">
                              <input type="hidden" name="funcion" value="desvincular">
                              <input type="hidden" name="ods_id" value="{{ $odsNivel4->ods_id }}">
                              <button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>  Desvincular</button>
                            </form>
                          @endif
                        </td>
                      </tr>
                     @endforeach

                    </tbody>
                  </table>

                  <hr>
                  <div class="bg-info">Convergencia - Plan de Desarrollo Nacional</div><br>
                  <!-- VINCULAR EL PLAN NACIONAL DE DESARROLLO -->
                  @if(Auth::user()->hasRole('super'))
                    <div class="pull-right">
                      <form method="POST" action="{{ route('vincularnacionalplan') }}" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="nivel1_id" value="{{ $planDesarrolloNivel1->id }}">
                        <input type="hidden" name="nivel2_id" value="{{ $planDesarrolloNivel2->id }}">
                        <input type="hidden" name="nivel3_id" value="{{ $planDesarrolloNivel3->id }}">
                        <input type="hidden" name="nivel4_id" value="{{ $planDesarrolloNivel4->id }}">
                        <input type="hidden" name="funcion" value="vincular">
                        <table>
                          <tr>
                            <td>
                              <div class="form-group">
                                <select class="form-control" name="nacionalplan_id">
                                  @foreach($refNacionalPlan as $plan) 
                                    <option value={{ $plan->id }}>{{ $plan->codigo }} - {{ $plan->nombre }} - {{ $plan->descripcion }}</option>
                                  @endforeach
                                </select> 
                              </div>
                            </td>
                            <td valign="top">
                              @if(Auth::user()->hasRole('super'))
                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Vincular</button>
                              @endif
                            <td>
                          </tr>
                        </table>
                      </form>
                    </div>
                  @endif

                   <!-- Seccion para mostrar componentes del PLAN NACIONAL DE DESARROLLO ya vinculados -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th></th>
                     </tr>

                     @foreach($nacionalplanNivel4 as $planNivel4) 
                      <tr>
                        <td style="width:10%">{{ $planNivel4->nacionalplanInformacion->codigo }}</td>
                        <td style="width:20%;font-size:10px;">{{ $planNivel4->nacionalplanInformacion->nombre }}</td>
                        <td style="width:56%;font-size:10px;">{{ $planNivel4->nacionalplanInformacion->descripcion }}</td>
                        <td style="width:14%">
                          @if(Auth::user()->hasRole('super'))
                            <form method="POST" action="{{ route('vincularnacionalplan') }}" role="form" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="nivel1_id" value="{{ $planDesarrolloNivel1->id }}">
                              <input type="hidden" name="nivel2_id" value="{{ $planDesarrolloNivel2->id }}">
                              <input type="hidden" name="nivel3_id" value="{{ $planDesarrolloNivel3->id }}">
                              <input type="hidden" name="nivel4_id" value="{{ $planDesarrolloNivel4->id }}">
                              <input type="hidden" name="funcion" value="desvincular">
                              <input type="hidden" name="nacionalplan_id" value="{{ $planNivel4->nacionalplan_id }}">
                              <button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>  Desvincular</button>
                            </form>
                          @endif
                        </td>
                      </tr>
                     @endforeach

                    </tbody>
                  </table>

                  <hr>
                  <div class="bg-info">Convergencia - Politicas Públicas Municipales</div><br>
                  <!-- VINCULAR POLITICAS PUBLICA MUNICIPALES -->
                  @if(Auth::user()->hasRole('super'))
                    <div class="pull-right">
                      <form method="POST" action="{{ route('vincularmunicipalpolitica') }}" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="nivel1_id" value="{{ $planDesarrolloNivel1->id }}">
                        <input type="hidden" name="nivel2_id" value="{{ $planDesarrolloNivel2->id }}">
                        <input type="hidden" name="nivel3_id" value="{{ $planDesarrolloNivel3->id }}">
                        <input type="hidden" name="nivel4_id" value="{{ $planDesarrolloNivel4->id }}">
                        <input type="hidden" name="funcion" value="vincular">
                        <table>
                          <tr>
                            <td>
                              <div class="form-group">
                                <select class="form-control" name="municipalpolitica_id">
                                  @foreach($refMunicipalPolitica as $politica) 
                                    <option value={{ $politica->id }}>{{ $politica->nombre }}</option>
                                  @endforeach
                                </select> 
                              </div>
                            </td>
                            <td valign="top">
                              @if(Auth::user()->hasRole('super'))
                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Vincular</button>
                              @endif
                            <td>
                          </tr>
                        </table>
                      </form>
                    </div>
                  @endif

                   <!-- Seccion para mostrar las POLITICAS PUBLICAS MUNICIPALES ya vinculadas -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th></th>
                     </tr>

                     @foreach($municipalpoliticaNivel4 as $politicaNivel4) 
                      <tr>
                        <td style="width:10%">{{ $politicaNivel4->municipalpoliticaInformacion->id }}</td>
                        <td style="width:34%;font-size:10px;">{{ $politicaNivel4->municipalpoliticaInformacion->nombre }}</td>
                        <td style="width:42%;font-size:10px;">{{ $politicaNivel4->municipalpoliticaInformacion->descripcion }}</td>
                        <td style="width:14%">
                          @if(Auth::user()->hasRole('super'))
                            <form method="POST" action="{{ route('vincularmunicipalpolitica') }}" role="form" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="nivel1_id" value="{{ $planDesarrolloNivel1->id }}">
                              <input type="hidden" name="nivel2_id" value="{{ $planDesarrolloNivel2->id }}">
                              <input type="hidden" name="nivel3_id" value="{{ $planDesarrolloNivel3->id }}">
                              <input type="hidden" name="nivel4_id" value="{{ $planDesarrolloNivel4->id }}">
                              <input type="hidden" name="funcion" value="desvincular">
                              <input type="hidden" name="municipalpolitica_id" value="{{ $politicaNivel4->municipalpolitica_id }}">
                              <button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>  Desvincular</button>
                            </form>
                          @endif
                        </td>
                      </tr>
                     @endforeach

                    </tbody>
                  </table>

                  <hr>
                  <div class="bg-info">Convergencia - Modelo Integrado de Planeación y Gestión MIPG</div><br>
                  <!-- VINCULAR POLITICAS MIPG -->
                  @if(Auth::user()->hasRole('super'))
                    <div class="pull-right">
                      <form method="POST" action="{{ route('vincularmipg') }}" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="nivel1_id" value="{{ $planDesarrolloNivel1->id }}">
                        <input type="hidden" name="nivel2_id" value="{{ $planDesarrolloNivel2->id }}">
                        <input type="hidden" name="nivel3_id" value="{{ $planDesarrolloNivel3->id }}">
                        <input type="hidden" name="nivel4_id" value="{{ $planDesarrolloNivel4->id }}">
                        <input type="hidden" name="funcion" value="vincular">
                        <table>
                          <tr>
                            <td>
                              <div class="form-group">
                                <select class="form-control" name="mipg_id">
                                  @foreach($refMipgPolitica as $mipg) 
                                    <option value={{ $mipg->id }}>{{ $mipg->nombre }}</option>
                                  @endforeach
                                </select> 
                              </div>
                            </td>
                            <td valign="top">
                              @if(Auth::user()->hasRole('super'))
                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Vincular</button>
                              @endif
                            <td>
                          </tr>
                        </table>
                      </form>
                    </div>
                  @endif

                   <!-- Seccion para mostrar las POLITICAS MIPG ya vinculadas -->
                  <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                     <tr>
                      <th>MIPG</th>
                      <th>Dimension</th>
                      <th>Politica</th>
                      <th></th>
                     </tr>

                     @foreach($mipgNivel4 as $mipgNivel4) 
                      <tr>
                        <td style="width:10%">
                          <img src="{{ asset('images/'. $mipgNivel4->mipgInformacion->logo) }}" style='width:30px;height:30px;'></td>
                        <td style="width:34%;font-size:10px;">{{ $mipgNivel4->mipgInformacion->dimension }}</td>
                        <td style="width:42%;font-size:10px;">{{ $mipgNivel4->mipgInformacion->nombre }}</td>
                        <td style="width:14%">
                          @if(Auth::user()->hasRole('super'))
                            <form method="POST" action="{{ route('vincularmipg') }}" role="form" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="nivel1_id" value="{{ $planDesarrolloNivel1->id }}">
                              <input type="hidden" name="nivel2_id" value="{{ $planDesarrolloNivel2->id }}">
                              <input type="hidden" name="nivel3_id" value="{{ $planDesarrolloNivel3->id }}">
                              <input type="hidden" name="nivel4_id" value="{{ $planDesarrolloNivel4->id }}">
                              <input type="hidden" name="funcion" value="desvincular">
                              <input type="hidden" name="mipg_id" value="{{ $mipgNivel4->mipg_id }}">
                              <button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>  Desvincular</button>
                            </form>
                          @endif
                        </td>
                      </tr>
                     @endforeach

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