<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 
				@if ( !empty ( $tarea->id) )
 
					<div class="form-group">
						<label for="fecha_realizacion" class="negrita">Fecha de realizacion</label> 
						<div>
							<input class="form-control" readonly placeholder="" required="required" name="fecha_realizacion" type="date" id="fecha_realizacion" value="{{ $tarea->fecha_realizacion }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="descripcion" class="negrita">Descripcion</label> 
						<div>
							<input class="form-control" readonly placeholder="" required="required" name="descripcion" type="text" id="descripcion" value="{{ $tarea->descripcion }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="zona_id" class="negrita">Ubicacion Geografica</label> 
						<div>
							<select class="form-control" name="zona_id" readonly>
								@foreach($generalZona as $item)
									@if ($item->id == $tarea->zona_id)	
										<option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
									@else
										<option value="{{$item->id}}">{{$item->nombre}}</option>
									@endif
								@endforeach
							</select> 
						</div>
					</div>				

					<div class="form-group">
						<label for="comuna_id" class="negrita">Comuna impactada</label> 
						<div>
							<select class="form-control" name="comuna_id" readonly>
								@foreach($geograficaComuna as $item)
									@if ($item->id == $tarea->comuna_id)	
										<option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
									@else
										<option value="{{$item->id}}">{{$item->nombre}}</option>
									@endif
								@endforeach
							</select> 
						</div>
					</div>

					<div class="form-group">
						<label for="corregimiento_id" class="negrita">Corregimiento impactado</label> 
						<div>
							<select class="form-control" name="corregimiento_id" readonly>
								@foreach($geograficaCorregimiento as $item)
									@if ($item->id == $tarea->corregimiento_id)	
										<option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
									@else
										<option value="{{$item->id}}">{{$item->nombre}}</option>
									@endif
								@endforeach
							</select> 
						</div>
					</div>

					<div class="form-group">
						<label for="poblacion_id" class="negrita">Grupo poblacional</label> 
						<div>
							<select class="form-control" name="poblacion_id" readonly>
								@foreach($generalPoblacion as $item)
									@if ($item->id == $tarea->poblacion_id)	
										<option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
									@else
										<option value="{{$item->id}}">{{$item->nombre}}</option>
									@endif
								@endforeach
							</select> 
						</div>
					</div>

					<div class="form-group">
						<label for="sexo_id" class="negrita">Genero</label> 
						<div>
							<select class="form-control" name="sexo_id" readonly>
								@foreach($generalSexo as $item)
									@if ($item->id == $tarea->sexo_id)	
										<option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
									@else
										<option value="{{$item->id}}">{{$item->nombre}}</option>
									@endif
								@endforeach
							</select> 
						</div>
					</div>

					<div class="form-group">
						<label for="poblacion" class="negrita">Poblacion impactada</label> 
						<div>
							<input class="form-control" readonly placeholder="" required="required" name="poblacion" type="number" id="poblacion" value="{{ $tarea->poblacion }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="impacto_kpi" class="negrita">Impacto al KPI</label> 
						<div>
							<input class="form-control" readonly placeholder="" required="required" name="impacto_kpi" type="number" step="any" id="impacto_kpi" value="{{ $tarea->impacto_kpi }}"> 
						</div>
					</div>

					<div class="form-group">
						<hr>
						<label for="valor_pesos" class="negrita">Valor invertido en pesos</label> 
						<div>
							<!--<input class="form-control" readonly placeholder="" required="required" name="valor_pesos" type="number" step="any" id="valor_pesos" value="{{ $tarea->valor_pesos }}"> --> 
							<label><h3>$ {{ number_format($tarea->valor_pesos,2) }}</h3></label> 
							<img src="{{ asset("images/iconos/icono_dinero_01.png") }}" alt="" width="50px">
						</div>
					</div>

					<div class="form-group">
						<div>
							@if ($tarea->evidencia_pdf != 'Sin evidencia')
								<hr>
								<label for="evidencia_pdf" class="negrita">Evidencia anexa</label> 
								<a href="{{ asset('storage/evidence/'.$tarea->evidencia_pdf) }}">
									<img src="{{ asset("images/iconos/icono_pdf.png") }}" alt="Estrategov" width="5%">
								</a>
								<hr>
							@else
								<hr><label for="evidencia_pdf">Tarea reportada SIN evidencia anexa</label><hr>
							@endif
						</div>
					</div>

				@endif
 
				<a href="{{ URL::previous() }}" class="btn btn-warning">Volver</a>
 
				<br>
				<br>
 
			</div>
		</section>
	</div>
</div>