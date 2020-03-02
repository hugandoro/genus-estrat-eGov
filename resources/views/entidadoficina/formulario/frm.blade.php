<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 
				@if ( !empty ( $entidadOficina->id) )
 
					<div class="form-group">
						<label for="nombre" class="negrita">Nombre</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre" type="text" id="nombre" value="{{ $entidadOficina->nombre }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Responsable</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="responsable" type="text" id="responsable" value="{{ $entidadOficina->responsable }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="precio" class="negrita">Tipo de oficina</label> 
						<div>
							<select class="form-control" name="tipo_oficina_id">
								@foreach($entidadTipoOficina as $item)
									@if ($item->id == $entidadOficina->tipo_oficina_id)	
								  		<option value="{{$item->id}}" selected="selected">{{$item->nombre}}</option>
								  	@else
									  	<option value="{{$item->id}}">{{$item->nombre}}</option>
									@endif
								@endforeach
							</select> 
						</div>
					</div>

				@else
 
					<div class="form-group">
						<label for="nombre" class="negrita">Nombre</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre" type="text" id="nombre"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Responsable</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="responsable" type="text" id="responsable"> 
						</div>
					</div>

					<div class="form-group">
						<label for="precio" class="negrita">Tipo de oficina</label> 
						<div>
							<select class="form-control" name="tipo_oficina_id">
								@foreach($entidadTipoOficina as $item)
								  <option value="{{$item->id}}">{{$item->nombre}}</option>
								@endforeach
							</select> 
						</div>
					</div>
 
				@endif
 
				<button type="submit" class="btn btn-info">Guardar</button>
				<a href="{{ route('entidadoficina.index') }}" class="btn btn-warning">Cancelar</a>
 
				<br>
				<br>
 
			</div>
		</section>
	</div>
</div>