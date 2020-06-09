<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 
				@if ( !empty ( $planDesarrolloNivel2->id) )

					<div class="form-group">
						<label for="nombre" class="negrita">Numeral</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="numeral" type="text" id="numeral" value="{{ $planDesarrolloNivel2->numeral }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="nombre" class="negrita">Nombre</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre" type="text" id="nombre" value="{{ $planDesarrolloNivel2->nombre }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Objetivo</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="objetivo" type="text" id="objetivo" value="{{ $planDesarrolloNivel2->objetivo }}"> 
						</div>
					</div>

					@if(Auth::user()->hasRole('super'))
						<button type="submit" class="btn btn-info">Guardar</button>
					@endif

					<a href="{{ action('PlanDesarrolloNivel1Controller@listar',$planDesarrolloNivel2->nivel1_id) }}" class="btn btn-warning">Cancelar</a>

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

					@if(Auth::user()->hasRole('super'))
						<button type="submit" class="btn btn-info">Guardar</button>
					@endif

					<a href="{{ action('PlanDesarrolloNivel1Controller@listar',$idNivel1 ) }}" class="btn btn-warning">Cancelar</a>
 
				@endif

 
				<br>
				<br>
 
			</div>
		</section>
	</div>
</div>