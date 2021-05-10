<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 
				@if ( !empty ( $tarea->id) )
 
					<div class="form-group">
						<label for="fecha_realizacion" class="negrita">Fecha de realizacion</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="fecha_realizacion" type="date" id="fecha_realizacion" value="{{ $tarea->fecha_realizacion }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="descripcion" class="negrita">Descripcion</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="descripcion" type="text" id="descripcion" value="{{ $tarea->descripcion }}"> 
						</div>
					</div>

					<div class="form-group">
						<label for="impacto_kpi" class="negrita">Impacto al KPI</label> 
						<div>
							<input class="form-control" placeholder="" required="required" name="impacto_kpi" type="number" step="any" id="impacto_kpi" value="{{ $tarea->impacto_kpi }}"> 
						</div>
					</div>

					<br>


				@else
 

					<div class="form-group">
						<label for="fecha_realizacion" class="negrita">Fecha de realizacion</label> 
						<div>
							<input class="form-control" placeholder="Fecha en que se realizo la tarea que se esta reportando..." required="required" name="fecha_realizacion" type="date" id="fecha_realizacion"> 
						</div>
					</div>

					<div class="form-group">
						<label for="descripcion" class="negrita">Descripcion</label> 
						<div>
							<input class="form-control" placeholder="Breve descripcion de lo que se hizo..." required="required" name="descripcion" type="text" id="descripcion"> 
						</div>
					</div>

					<div class="form-group">
						<label for="impacto_kpi" class="negrita">Impacto al KPI OBJETIVO</label> 
						<h5>Objetivo general del KPI inscrito en el plan de accion <span class="label label-info">{{ $_GET["kpiObjetivo"] }} {{ $_GET["kpi"] }}</span></h5>
						<div>
							<input class="form-control" placeholder="{{ $_GET["kpi"] }}" required="required" name="impacto_kpi" type="number" step="any" id="impacto_kpi"> 
						</div>
					</div>

					<br>

					<div class="form-group">
						<label for="evidencia_pdf" class="negrita">Evidencia PDF - No mayor a 3 megas (Opcional)</label> 
						<div>
							<input class="form-control" placeholder="Reservado para cargar evidencia en PDF no mayor a 3 megas" name="evidencia_pdf" type="file" id="evidencia_pdf" accept="application/pdf"> 
						</div>
					</div>

					<hr>
 
				@endif
 
				@if((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('editorMipg')))
					<button type="submit" class="btn btn-info">Guardar</button>
				@endif

				<a href="{{ URL::previous() }}" class="btn btn-warning">Cancelar</a>
 
				<br>
				<br>
 
			</div>
		</section>
	</div>
</div>