<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 
				@if ( !empty ( $planDesarrolloNivel3->id) )

					<div class="form-group">
						<label for="nombre" class="negrita">Numeral</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="numeral" type="text" id="numeral" value="{{ $planDesarrolloNivel3->numeral }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="nombre" class="negrita">Nombre</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre" type="text" id="nombre" value="{{ $planDesarrolloNivel3->nombre }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Objetivo</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="objetivo" type="text" id="objetivo" value="{{ $planDesarrolloNivel3->objetivo }}"> 
						</div>
					</div>

					@if(Auth::user()->hasRole('super'))
						<button type="submit" class="btn btn-info">Guardar</button>
					@endif

					<a href="{{ action('PlanDesarrolloNivel2Controller@listar',['idA' => $planDesarrolloNivel2->nivel1_id, 'idB' => $planDesarrolloNivel3->nivel2_id]) }}" class="btn btn-warning">Cancelar</a>

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

					<a href="{{ action('PlanDesarrolloNivel2Controller@listar', ['idA' => $idNivel1, 'idB' => $idNivel2]) }}" class="btn btn-warning">Cancelar</a>
 
				@endif

 
				<br>
				<br>
 
			</div>
		</section>
	</div>
</div>