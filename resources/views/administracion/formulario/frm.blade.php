<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 
				@if ( !empty ( $administracion->id) )
 
					<div class="form-group">
						<label for="nombre" class="negrita">Representante legal</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre_representante" type="text" id="nombre_representante" value="{{ $administracion->nombre_representante }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Slogan</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="slogan" type="text" id="slogan" value="{{ $administracion->slogan }}"> 
						</div>
					</div>

				@else
 
					<div class="form-group">
						<label for="nombre" class="negrita">Representante legal</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre" type="text" id="nombre"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Slogan</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="descripcion" type="text" id="descripcion"> 
						</div>
					</div>
 
				@endif
 
				@if(Auth::user()->hasRole('super'))
					<button type="submit" class="btn btn-info">Guardar</button>
				@endif

				<a href="{{ route('administracion.index') }}" class="btn btn-warning">Cancelar</a>
 
				<br>
				<br>
 
			</div>
		</section>
	</div>
</div>