<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 
				@if ( !empty ( $medicionIndicador->id) )
 
					<div class="form-group">
						<label for="nombre" class="negrita">Nombre</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre" type="text" id="nombre" value="{{ $medicionIndicador->nombre }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="unidad_medida" class="negrita">Unidad de medida</label> 
						<div>
							<select class="form-control" name="unidad_medida">
								@foreach($medicionUnidadMedida as $item)
									@if ($item->id == $medicionIndicador->unidad_medida_id)	
								  		<option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
								  	@else
									  	<option value="{{$item->id}}">{{$item->nombre}}</option>
									@endif
								@endforeach
							</select> 
						</div>
					</div>

					<div class="form-group">
						<label for="linea_base" class="negrita">Linea base</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="linea_base" type="text" id="linea_base" value="{{ $medicionIndicador->linea_base }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="vigencia_linea_base" class="negrita">Año linea base</label> 
						<div>
							<select class="form-control" name="vigencia_linea_base">
								@foreach($generalVigencia as $item)
									@if ($item->id == $medicionIndicador->vigencia_id_base)	
								  		<option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
								  	@else
									  	<option value="{{$item->id}}">{{$item->nombre}}</option>
									@endif
								@endforeach
							</select> 
						</div>
					</div>

					<div class="form-group">
						<label for="meta_2023" class="negrita">Meta a 2023</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="meta_2023" type="text" id="meta_2023" value="{{ $medicionIndicador->meta }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="meta_cuatrienio" class="negrita">Meta cuatrienio</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="meta_cuatrienio" type="text" id="meta_cuatrienio" value="{{ $medicionIndicador->objetivo }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="medida" class="negrita">Medida</label> 
						<div>
							<select class="form-control" name="medida">
								@foreach($medicionMedida as $item)
									@if ($item->id == $medicionIndicador->medida_id)	
								  		<option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
								  	@else
									  	<option value="{{$item->id}}">{{$item->nombre}}</option>
									@endif
								@endforeach
							</select> 
						</div>
					</div>

					<div class="form-group">
						<label for="tipo" class="negrita">Tipo</label> 
						<div>
							<select class="form-control" name="tipo">
								@foreach($medicionTipo as $item)
									@if ($item->id == $medicionIndicador->tipo_id)	
								  		<option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
								  	@else
									  	<option value="{{$item->id}}">{{$item->nombre}}</option>
									@endif
								@endforeach
							</select> 
						</div>
					</div>

					@if(Auth::user()->hasRole('super'))
						<button type="submit" class="btn btn-info">Guardar</button>
					@endif

					<a href="{{ action('PlanDesarrolloNivel4Controller@mostrarHojaDeVida',['idA' => $planDesarrolloNivel2->nivel1_id, 'idB' => $planDesarrolloNivel3->nivel2_id, 'idC' => $planDesarrolloNivel4->nivel3_id, 'idD' => $medicionIndicador->nivel4_id]) }}" class="btn btn-warning">Cancelar</a>

				@else
 
					<div class="form-group">
						<label for="nombre" class="negrita">Nombre</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre" type="text" id="nombre"> 
						</div>
					</div>

					<div class="form-group">
						<label for="unidad_medida" class="negrita">Unidad de medida</label> 
						<div>
							<select class="form-control" name="unidad_medida">
								@foreach($medicionUnidadMedida as $item)
								  <option value="{{$item->id}}">{{$item->nombre}}</option>
								@endforeach
							</select> 
						</div>
					</div>

					<div class="form-group">
						<label for="linea_base" class="negrita">Linea base</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="linea_base" type="text" id="linea_base"> 
						</div>
					</div>

					<div class="form-group">
						<label for="vigencia_linea_base" class="negrita">Año linea base</label> 
						<div>
							<select class="form-control" name="vigencia_linea_base">
								@foreach($generalVigencia as $item)
									<option value="{{$item->id}}">{{$item->nombre}}</option>
								@endforeach
							</select> 
						</div>
					</div>

					<div class="form-group">
						<label for="meta_2023" class="negrita">Meta a 2023</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="meta_2023" type="text" id="meta_2023"> 
						</div>
					</div>

					<div class="form-group">
						<label for="meta_cuatrienio" class="negrita">Meta cuatrienio</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="meta_cuatrienio" type="text" id="meta_cuatrienio"> 
						</div>
					</div>

					<div class="form-group">
						<label for="medida" class="negrita">Medida</label> 
						<div>
							<select class="form-control" name="medida">
								@foreach($medicionMedida as $item)
									<option value="{{$item->id}}">{{$item->nombre}}</option>
								@endforeach
							</select> 
						</div>
					</div>

					<div class="form-group">
						<label for="tipo" class="negrita">Tipo</label> 
						<div>
							<select class="form-control" name="tipo">
								@foreach($medicionTipo as $item)
									<option value="{{$item->id}}">{{$item->nombre}}</option>
								@endforeach
							</select> 
						</div>
					</div>

					@if(Auth::user()->hasRole('super'))
						<button type="submit" class="btn btn-info">Guardar</button>
					@endif

					<a href="{{ action('PlanDesarrolloNivel4Controller@mostrarHojaDeVida', ['idA' => $idNivel1, 'idB' => $idNivel2, 'idC' => $idNivel3, 'idD' => $idNivel4]) }}" class="btn btn-warning">Cancelar</a>
 
				@endif
  
				<br>
				<br>
 
			</div>
		</section>
	</div>
</div>