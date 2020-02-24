<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 
				@if ( !empty ( $planDesarrolloNivel4->id) )

					<div class="form-group">
						<label for="nombre" class="negrita">Numeral</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="numeral" type="text" id="numeral" value="{{ $planDesarrolloNivel4->numeral }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="nombre" class="negrita">Nombre</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre" type="text" id="nombre" value="{{ $planDesarrolloNivel4->nombre }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Objetivo</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="objetivo" type="text" id="objetivo" value="{{ $planDesarrolloNivel4->objetivo }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="precio" class="negrita">Oficina responsable</label> 
						<div>
							<select class="form-control" name="oficina_id">
								@foreach($entidadOficina as $item)
									@if ($item->id == $planDesarrolloNivel4->oficina_id)	
								  		<option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
								  	@else
									  	<option value="{{$item->id}}">{{$item->nombre}}</option>
									@endif
								@endforeach
							</select> 
						</div>
					</div>

					<button type="submit" class="btn btn-info">Guardar</button>
					<a href="{{ action('PlanDesarrolloNivel3Controller@listar',['idA' => $planDesarrolloNivel2->nivel1_id, 'idB' => $planDesarrolloNivel3->nivel2_id, 'idC' => $planDesarrolloNivel4->nivel3_id]) }}" class="btn btn-warning">Cancelar</a>

				@else

					<div class="form-group">
						<label for="nombre" class="negrita">Numeral</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="numeral" type="text" id="numeral"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="nombre" class="negrita">Nombre</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre" type="text" id="nombre"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Objetivo</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="objetivo" type="text" id="objetivo"> 
						</div>
					</div>

					<div class="form-group">
						<label for="precio" class="negrita">Oficina responsable</label> 
						<div>
							<select class="form-control" name="oficina_id">
								@foreach($entidadOficina as $item)
								  <option value="{{$item->id}}">{{$item->nombre}}</option>
								@endforeach
							</select> 
						</div>
					</div>

					<button type="submit" class="btn btn-info">Guardar</button>
					<a href="{{ action('PlanDesarrolloNivel3Controller@listar', ['idA' => $idNivel1, 'idB' => $idNivel2, 'idC' => $idNivel3]) }}" class="btn btn-warning">Cancelar</a>
 
				@endif

 
				<br>
				<br>
 
			</div>
		</section>
	</div>
</div>