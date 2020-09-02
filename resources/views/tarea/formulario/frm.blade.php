<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 
				@if ( !empty ( $tarea->id) )
 
					<div class="form-group">
						<label for="fecha_realizacion" class="negrita">Fecha de realizacion</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="fecha_realizacion" type="date" id="fecha_realizacion" value="{{ $tarea->fecha_realizacion }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="descripcion" class="negrita">Descripcion</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="descripcion" type="text" id="descripcion" value="{{ $tarea->descripcion }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="zona_id" class="negrita">Ubicacion Geografica</label> 
						<div>
							<select class="form-control" name="zona_id">
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
							<select class="form-control" name="comuna_id">
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
							<select class="form-control" name="corregimiento_id">
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
							<select class="form-control" name="poblacion_id">
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
							<select class="form-control" name="sexo_id">
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
							<input class="form-control" placeholder="" required="required" name="poblacion" type="number" id="poblacion" value="{{ $tarea->poblacion }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="impacto_kpi" class="negrita">Impacto al KPI</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="impacto_kpi" type="number" step="any" id="impacto_kpi" value="{{ $tarea->impacto_kpi }}"> 
						</div>
					</div>

					<br>

					<!-- FUENTES DE INVERSION Y VALORES INVERTIDOS -->
					<div class="form-group">
						<div class="col-md-12">
							<label for="impacto_kpi" class="negrita">Inversion y Fuentes de inversion</label> 
						</div>

						<div class="col-md-6">
							<label for="fuente1_id" class="negrita">Fuente N° 1</label> 
							<div>
								<select class="form-control" name="fuente1_id">
									@foreach($generalFuente as $item)
										@if ($item->id == $tarea->fuente1_id)	
											<option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
										@else
											<option value="{{$item->id}}">{{$item->nombre}}</option>
										@endif
									@endforeach
								</select> 
							</div>
						</div>

						<div class="col-md-6">
							<label for="valor_fuente1" class="negrita">Fuente N° 1 - Valor invertido</label> 
							<div>
								<input class="form-control" placeholder="Si se invirtieron recuros, indique el valor en pesos..." required="required" name="valor_fuente1" type="number" step="any" id="valor_fuente1" value="{{ $tarea->valor_fuente1 }}"> 
							</div>
						</div>

						<div class="col-md-6">
							<label for="fuente2_id" class="negrita">Fuente N° 2</label> 
							<div>
								<select class="form-control" name="fuente2_id">
									@foreach($generalFuente as $item)
										@if ($item->id == $tarea->fuente2_id)	
											<option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
										@else
											<option value="{{$item->id}}">{{$item->nombre}}</option>
										@endif
									@endforeach
								</select> 							</div>
						</div>

						<div class="col-md-6">
							<label for="valor_fuente2" class="negrita">Fuente N° 2 - Valor invertido</label> 
							<div>
								<input class="form-control" placeholder="Si se invirtieron recuros, indique el valor en pesos..." required="required" name="valor_fuente2" type="number" step="any" id="valor_fuente2" value="{{ $tarea->valor_fuente2 }}"> 
							</div>
						</div>

						<div class="col-md-6">
							<label for="fuente3_id" class="negrita">Fuente N° 3</label> 
							<div>
								<select class="form-control" name="fuente3_id">
									@foreach($generalFuente as $item)
										@if ($item->id == $tarea->fuente3_id)	
											<option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
										@else
											<option value="{{$item->id}}">{{$item->nombre}}</option>
										@endif
									@endforeach
								</select> 
							</div>
						</div>

						<div class="col-md-6">
							<label for="valor_fuente3" class="negrita">Fuente N° 3 - Valor invertido</label> 
							<div>
								<input class="form-control" placeholder="Si se invirtieron recuros, indique el valor en pesos..." required="required" name="valor_fuente3" type="number" step="any" id="valor_fuente3" value="{{ $tarea->valor_fuente3 }}"> 
							</div>
							<br><br>
						</div>
					</div>
					<!-- FIN SECCION INVERSION Y FUENTES -->

				@else
 
					<div class="form-group">
						<label for="fecha_realizacion" class="negrita">Fecha de realizacion</label> 
						<div>
							<input class="form-control" placeholder="Fecha en que se realizo la tarea que se esta reportando..." required="required" name="fecha_realizacion" type="date" id="fecha_realizacion"> 
						</div>
					</div>

					<div class="form-group">
						<label for="descripcion" class="negrita">Descripcion</label> 
						<div>
							<input class="form-control" placeholder="Breve descripcion de lo que se hizo..." required="required" name="descripcion" type="text" id="descripcion"> 
						</div>
					</div>

					<div class="form-group">
						<label for="zona_id" class="negrita">Ubicacion Geografica</label> 
						<div>
							<select class="form-control" name="zona_id">
								@foreach($generalZona as $item)
									<option value="{{$item->id}}">{{$item->nombre}}</option>
								@endforeach
							</select> 
						</div>
					</div>				

					<div class="form-group">
						<label for="comuna_id" class="negrita">Comuna impactada</label> 
						<div>
							<select class="form-control" name="comuna_id">
								@foreach($geograficaComuna as $item)
									<option value="{{$item->id}}">{{$item->nombre}}</option>
								@endforeach
							</select> 
						</div>
					</div>

					<div class="form-group">
						<label for="corregimiento_id" class="negrita">Corregimiento impactado</label> 
						<div>
							<select class="form-control" name="corregimiento_id">
								@foreach($geograficaCorregimiento as $item)
									<option value="{{$item->id}}">{{$item->nombre}}</option>
								@endforeach
							</select> 
						</div>
					</div>

					<div class="form-group">
						<label for="poblacion_id" class="negrita">Grupo poblacional</label> 
						<div>
							<select class="form-control" name="poblacion_id">
								@foreach($generalPoblacion as $item)
									<option value="{{$item->id}}">{{$item->nombre}}</option>
								@endforeach
							</select> 
						</div>
					</div>

					<div class="form-group">
						<label for="sexo_id" class="negrita">Genero</label> 
						<div>
							<select class="form-control" name="sexo_id">
								@foreach($generalSexo as $item)
									<option value="{{$item->id}}">{{$item->nombre}}</option>
								@endforeach
							</select> 
						</div>
					</div>

					<div class="form-group">
						<label for="poblacion" class="negrita">Poblacion impactada</label> 
						<div>
							<input class="form-control" placeholder="Cantidad de poblacion impactada..." required="required" name="poblacion" type="number" id="poblacion"> 
						</div>
					</div>

					<div class="form-group">
						<label for="impacto_kpi" class="negrita">Impacto al KPI</label> 
						<div>
							<input class="form-control" placeholder="Aporte al OBJETIVO del KPI..." required="required" name="impacto_kpi" type="number" step="any" id="impacto_kpi"> 
						</div>
					</div>

					<br>
					
					<!-- FUENTES DE INVERSION Y VALORES INVERTIDOS -->
					<div class="form-group">
						<div class="col-md-12">
							<label for="impacto_kpi" class="negrita">Inversion y Fuentes de inversion</label> 
						</div>

						<div class="col-md-6">
							<label for="fuente1_id" class="negrita">Fuente N° 1</label> 
							<div>
								<select class="form-control" name="fuente1_id">
									@foreach($generalFuente as $item)
										<option value="{{$item->id}}">{{$item->id}} | {{$item->nombre}}</option>
									@endforeach
								</select> 
							</div>
						</div>

						<div class="col-md-6">
							<label for="valor_fuente1" class="negrita">Fuente N° 1 - Valor invertido</label> 
							<div>
								<input class="form-control" placeholder="Si se invirtieron recuros, indique el valor en pesos..." required="required" name="valor_fuente1" type="number" step="any" id="valor_fuente1"> 
							</div>
						</div>

						<div class="col-md-6">
							<label for="fuente2_id" class="negrita">Fuente N° 2</label> 
							<div>
								<select class="form-control" name="fuente2_id">
									@foreach($generalFuente as $item)
										<option value="{{$item->id}}">{{$item->id}} | {{$item->nombre}}</option>
									@endforeach
								</select> 
							</div>
						</div>

						<div class="col-md-6">
							<label for="valor_fuente2" class="negrita">Fuente N° 2 - Valor invertido</label> 
							<div>
								<input class="form-control" placeholder="Si se invirtieron recuros, indique el valor en pesos..." required="required" name="valor_fuente2" type="number" step="any" id="valor_fuente2"> 
							</div>
						</div>

						<div class="col-md-6">
							<label for="fuente3_id" class="negrita">Fuente N° 3</label> 
							<div>
								<select class="form-control" name="fuente3_id">
									@foreach($generalFuente as $item)
										<option value="{{$item->id}}">{{$item->id}} | {{$item->nombre}}</option>
									@endforeach
								</select> 
							</div>
						</div>

						<div class="col-md-6">
							<label for="valor_fuente3" class="negrita">Fuente N° 3 - Valor invertido</label> 
							<div>
								<input class="form-control" placeholder="Si se invirtieron recuros, indique el valor en pesos..." required="required" name="valor_fuente3" type="number" step="any" id="valor_fuente3"> 
							</div>
							<br><br>
						</div>
					</div>
					<!-- FIN SECCION INVERSION Y FUENTES -->

					<div class="form-group">
						<label for="evidencia_pdf" class="negrita">Evidencia PDF - No mayor a 3 megas (Opcional)</label> 
						<div>
							<input class="form-control" placeholder="Reservado para cargar evidencia en PDF no mayor a 3 megas" name="evidencia_pdf" type="file" id="evidencia_pdf" accept="application/pdf"> 
						</div>
					</div>

					<hr>
 
				@endif
 
				@if((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('editor')))
					<button type="submit" class="btn btn-info">Guardar</button>
				@endif

				<a href="{{ URL::previous() }}" class="btn btn-warning">Cancelar</a>
 
				<br>
				<br>
 
			</div>
		</section>
	</div>
</div>