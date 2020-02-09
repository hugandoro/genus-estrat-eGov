<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 
				@if ( !empty ( $planDesarrollo->id) )
 
					<div class="form-group">
						<label for="nombre" class="negrita">Etiqueta nivel 1</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre_nivel1" type="text" id="nombre_nivel1" value="{{ $planDesarrollo->nombre_nivel1 }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Etiqueta nivel 2</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre_nivel2" type="text" id="nombre_nivel2" value="{{ $planDesarrollo->nombre_nivel2 }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="nombre" class="negrita">Etiqueta nivel 3</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre_nivel3" type="text" id="nombre_nivel3" value="{{ $planDesarrollo->nombre_nivel3 }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Etiqueta nivel 4</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre_nivel4" type="text" id="nombre_nivel4" value="{{ $planDesarrollo->nombre_nivel4 }}"> 
						</div>
					</div>

				@else
 
					<div class="form-group">
						<label for="nombre" class="negrita">Etiqueta nivel 1</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre_nivel1" type="text" id="nombre_nivel1"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Etiqueta nivel 2</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre_nivel2" type="text" id="nombre_nivel2"> 
						</div>
					</div>

					<div class="form-group">
						<label for="nombre" class="negrita">Etiqueta nivel 3</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre_nivel3" type="text" id="nombre_nivel3"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Etiqueta nivel 4</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre_nivel4" type="text" id="nombre_nivel4"> 
						</div>
					</div>
 
				@endif
 
				<button type="submit" class="btn btn-info">Guardar</button>
				<a href="{{ route('plandesarrollo.index') }}" class="btn btn-warning">Cancelar</a>
 
				<br>
				<br>
 
			</div>
		</section>
	</div>
</div>