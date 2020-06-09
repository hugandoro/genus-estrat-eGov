<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 
				@if ( !empty ( $refMunicipalPolitica->id) )
 
					<div class="form-group">
						<label for="nombre" class="negrita">Nombre</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre" type="text" id="nombre" value="{{ $refMunicipalPolitica->nombre }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Descripcion</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="descripcion" type="text" id="descripcion" value="{{ $refMunicipalPolitica->descripcion }}"> 
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
						<label for="precio" class="negrita">Descripcion</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="descripcion" type="text" id="descripcion"> 
						</div>
					</div>
 
				@endif
 
				@if(Auth::user()->hasRole('super'))
					<button type="submit" class="btn btn-info">Guardar</button>
				@endif

				<a href="{{ route('ppmunicipal.index') }}" class="btn btn-warning">Cancelar</a>
 
				<br>
				<br>
 
			</div>
		</section>
	</div>
</div>