<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 
				@if ( !empty ( $entidad->id) )
 
					<div class="form-group">
						<label for="nombre" class="negrita">Nombre</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre" type="text" id="nombre" value="{{ $entidad->nombre }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Direccion</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="direccion" type="text" id="direccion" value="{{ $entidad->direccion }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="nombre" class="negrita">Telefono</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="telefono" type="text" id="telefono" value="{{ $entidad->telefono }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Email</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="email" type="text" id="email" value="{{ $entidad->email }}"> 
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
						<label for="precio" class="negrita">Direccion</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="direccion" type="text" id="direccion"> 
						</div>
					</div>

					<div class="form-group">
						<label for="nombre" class="negrita">Telefono</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="telefono" type="text" id="telefono"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Email</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="email" type="text" id="email"> 
						</div>
					</div>
 
				@endif
 
				@if(Auth::user()->hasRole('super'))
					<button type="submit" class="btn btn-info">Guardar</button>
				@endif
				
				<a href="{{ route('entidad.index') }}" class="btn btn-warning">Cancelar</a>
 
				<br>
				<br>
 
			</div>
		</section>
	</div>
</div>