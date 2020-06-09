<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 
				@if ( !empty ( $planDesarrolloNivel1->id) )

					<div class="form-group">
						<label for="nombre" class="negrita">Numeral</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="numeral" type="text" id="numeral" value="{{ $planDesarrolloNivel1->numeral }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="nombre" class="negrita">Nombre</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="nombre" type="text" id="nombre" value="{{ $planDesarrolloNivel1->nombre }}"> 
						</div>
					</div>
 
					<div class="form-group">
						<label for="precio" class="negrita">Objetivo</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="objetivo" type="text" id="objetivo" value="{{ $planDesarrolloNivel1->objetivo }}"> 
						</div>
					</div>

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
 
				@endif
 
				@if(Auth::user()->hasRole('super'))
					<button type="submit" class="btn btn-info">Guardar</button>
				@endif

				<a href="{{ route('plandesarrollo.index') }}" class="btn btn-warning">Cancelar</a>
 
				<br>
				<br>
 
			</div>
		</section>
	</div>
</div>