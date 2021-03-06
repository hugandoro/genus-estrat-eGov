<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 
				@if ( !empty ( $tarea->id) )
 
					<div class="form-group">
						<label for="fecha_realizacion" class="negrita">Fecha de realizacion</label> 
						<div>
							<input class="form-control" readonly placeholder="" required="required" name="fecha_realizacion" type="date" id="fecha_realizacion" value="{{ $tarea->fecha_realizacion }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="descripcion" class="negrita">Descripcion</label> 
						<div>
							<input class="form-control" readonly placeholder="" required="required" name="descripcion" type="text" id="descripcion" value="{{ $tarea->descripcion }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="impacto_kpi" class="negrita">Impacto al KPI OBJETIVO</label> 
						<div>
							<input class="form-control" readonly placeholder="" required="required" name="impacto_kpi" type="number" step="any" id="impacto_kpi" value="{{ $tarea->impacto_kpi }}"> 
						</div>
					</div>

					<div class="form-group">
						<div>
							@if ($tarea->evidencia_pdf != 'Sin evidencia')
								<hr>
								<label for="evidencia_pdf" class="negrita">Evidencia anexa</label> 
								<a href="{{ asset('storage/evidence/'.$tarea->evidencia_pdf) }}">
									<img src="{{ asset("images/iconos/icono_pdf.png") }}" alt="Estrategov" width="5%">
								</a>
								<hr>
							@else
								<hr><label for="evidencia_pdf">Tarea reportada SIN evidencia anexa</label><hr>
							@endif
						</div>
					</div>

				@endif
 
				<a href="{{ URL::previous() }}" class="btn btn-warning">Volver</a>
 
				<br>
				<br>
 
			</div>
		</section>
	</div>
</div>