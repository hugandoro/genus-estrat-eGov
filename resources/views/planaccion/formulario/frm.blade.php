<!-- Existe un registro por lo tanto esta en modo EDIT -->
@if ( !empty ( $planaccion->id) ) 

	<div class="row">
		<div class="col-md-12">
			<section class="panel"> 
				<div class="panel-body">
	

						<div class="form-group">
							<label for="descripcion" class="negrita">Descripción</label> 
							<div>
								<input value="{{ $planaccion->descripcion }}" class="form-control" placeholder="Breve desripcion de la accion..." required="required" name="descripcion" type="text" id="descripcion"> 
							</div>
						</div>

						<div class="form-group">
							<label for="kpi" class="negrita">KPI (Indicador clave de rendimiento)</label> 
							<div>
								<input value="{{ $planaccion->kpi }}" class="form-control" placeholder="Unidad de medida de rendimiento (Vacunas, proyectos, reuniones, kilometros pavimentados, etc)..." required="required" name="kpi" type="text" id="kpi"> 
							</div>
						</div>

						<div class="form-group">
							<label for="objetivo" class="negrita">Valor objetivo KPI</label> 
							<div>
								<input value="{{ $planaccion->objetivo }}" class="form-control" placeholder="Valor a realizar respecto al KPI..." required="required" name="objetivo" type="number" min="1" id="objetivo"> 
							</div>
						</div>

						<div class="form-group">
							<label for="ponderacion" class="negrita">Peso ponderado entre el 1 y el 100 %</label> 
							<div>
								<input value="{{ $planaccion->ponderacion * 100 }}" class="form-control" placeholder="Indique el peso porcentual asignado a esta accion..." required="required" name="ponderacion" type="number" min="0" max="100" id="ponderacion"> 
							</div>
						</div>

						<hr>

						<div class="form-group" style="background-color: #C9F7C1;">
							<label for="n2022_converge_politica_publica" class="negrita">Alineación | Politica pública</label> 
							<div>
								<select class="form-control" name="n2022_converge_politica_publica">
									@if ($planaccion->n2022_converge_politica_publica == "no")
										<option value="no" selected>No aplica</option>
									@else
										<option value="no">No aplica</option>
									@endif	

									@if ($planaccion->n2022_converge_politica_publica == "1-Equidad de genero")
										<option value="1-Equidad de genero" selected>Politica pública municipal de Equidad de Genero</option>
									@else
										<option value="1-Equidad de genero">Politica pública municipal de Equidad de Genero</option>
									@endif

									@if ($planaccion->n2022_converge_politica_publica == "2-Discapacidad")
										<option value="2-Discapacidad" selected>Politica pública municipal de Discapacidad</option>
									@else
										<option value="2-Discapacidad">Politica pública municipal de Discapacidad</option>
									@endif

									@if ($planaccion->n2022_converge_politica_publica == "3-Juventudes")
										<option value="3-Juventudes" selected>Politica pública municipal de Juventudes</option>
									@else
										<option value="3-Juventudes">Politica pública municipal de Juventudes</option>
									@endif

									@if ($planaccion->n2022_converge_politica_publica == "4-Migrados")
										<option value="4-Migrados" selected>Politica pública municipal de Migrados</option>
									@else
										<option value="4-Migrados">Politica pública municipal de Migrados</option>
									@endif

									@if ($planaccion->n2022_converge_politica_publica == "5-Adulto Mayor")
										<option value="5-Adulto Mayor" selected>Politica pública municipal del Adulto Mayor</option>
									@else
										<option value="5-Adulto Mayor">Politica pública municipal del Adulto Mayor</option>
									@endif

									@if ($planaccion->n2022_converge_politica_publica == "6-Primera Infancia, Infancia y Adolescencia")
										<option value="6-Primera Infancia, Infancia y Adolescencia" selected>Politica pública municipal de Primera Infancia, Infancia y Adolescencia</option>
									@else
										<option value="6-Primera Infancia, Infancia y Adolescencia">Politica pública municipal de Primera Infancia, Infancia y Adolescencia</option>
									@endif

									@if ($planaccion->n2022_converge_politica_publica == "7-Victimas del conflicto armado")
										<option value="7-Victimas del conflicto armado" selected>Política pública municipal Victimas del Conflicto Armado</option>
									@else
										<option value="7-Victimas del conflicto armado">Política pública municipal Victimas del Conflicto Armado</option>
									@endif

									@if ($planaccion->n2022_converge_politica_publica == "8-Presupuesto participativo")
										<option value="8-Presupuesto participativo" selected>Política pública municipal de Presupuesto Participativo</option>
									@else
										<option value="8-Presupuesto participativo">Política pública municipal de Presupuesto Participativo</option>
									@endif

									@if ($planaccion->n2022_converge_politica_publica == "9-Seguridad y Convivencia Ciudadana")
										<option value="9-Seguridad y Convivencia Ciudadana" selected>Política pública municipal de Seguridad y Convivencia Ciudadana</option>
									@else
										<option value="9-Seguridad y Convivencia Ciudadana">Política pública municipal de Seguridad y Convivencia Ciudadana</option>
									@endif

								</select> 
							</div>
						</div>

						<div class="form-group" style="background-color: #C9F7C1;">
							<label for="n2022_converge_pgirs" class="negrita">Alineación | PGIRS</label> 
							<div>
								<select class="form-control" name="n2022_converge_pgirs">
									@if ($planaccion->n2022_converge_pgirs == "no")
										<option value="no" selected>No aplica</option>
									@else
										<option value="no">No aplica</option>
									@endif

									@if ($planaccion->n2022_converge_pgirs == "1-Aspecto Institucional del servicio público de aseo")
										<option value="1-Aspecto Institucional del servicio público de aseo" selected>Aspecto Institucional del servicio público de aseo</option>
									@else
										<option value="1-Aspecto Institucional del servicio público de aseo">Aspecto Institucional del servicio público de aseo</option>
									@endif

									@if ($planaccion->n2022_converge_pgirs == "2-Recolección, transporte y transferencia")
										<option value="2-Recolección, transporte y transferencia" selected>Recolección, transporte y transferencia</option>
									@else
										<option value="2-Recolección, transporte y transferencia">Recolección, transporte y transferencia</option>
									@endif

									@if ($planaccion->n2022_converge_pgirs == "3-Barrido y limpieza de vias y areas públicas")
										<option value="3-Barrido y limpieza de vias y areas públicas" selected>Barrido y limpieza de vias y areas públicas</option>
									@else
										<option value="3-Barrido y limpieza de vias y areas públicas">Barrido y limpieza de vias y areas públicas</option>
									@endif

									@if ($planaccion->n2022_converge_pgirs == "4-Limpieza de playas costeras y ribereñas")
										<option value="4-Limpieza de playas costeras y ribereñas" selected>Limpieza de playas costeras y ribereñas</option>
									@else
										<option value="4-Limpieza de playas costeras y ribereñas">Limpieza de playas costeras y ribereñas</option>
									@endif

									@if ($planaccion->n2022_converge_pgirs == "5-Corte de cesped y poda de árboles")
										<option value="5-Corte de cesped y poda de árboles" selected>Corte de cesped y poda de árboles</option>
									@else
										<option value="5-Corte de cesped y poda de árboles">Corte de cesped y poda de árboles</option>
									@endif

									@if ($planaccion->n2022_converge_pgirs == "6-Lavado de areas públicas")
										<option value="6-Lavado de areas públicas" selected>Lavado de areas públicas</option>
									@else
										<option value="6-Lavado de areas públicas">Lavado de areas públicas</option>
									@endif

									@if ($planaccion->n2022_converge_pgirs == "7-Aprovechamiento")
										<option value="7-Aprovechamiento" selected>Aprovechamiento</option>
									@else
										<option value="7-Aprovechamiento">Aprovechamiento</option>
									@endif

									@if ($planaccion->n2022_converge_pgirs == "8-Inclusion de recicladores")
										<option value="8-Inclusion de recicladores" selected>Inclusion de recicladores</option>
									@else
										<option value="8-Inclusion de recicladores">Inclusion de recicladores</option>
									@endif

									@if ($planaccion->n2022_converge_pgirs == "9-Disposicion final")
										<option value="9-Disposicion final" selected>Disposicion final</option>
									@else
										<option value="9-Disposicion final">Disposicion final</option>
									@endif

									@if ($planaccion->n2022_converge_pgirs == "10-Gestión integral de residuos especiales")
										<option value="10-Gestión integral de residuos especiales" selected>Gestión integral de residuos especiales</option>
									@else
										<option value="10-Gestión integral de residuos especiales">Gestión integral de residuos especiales</option>
									@endif

									@if ($planaccion->n2022_converge_pgirs == "11-Residuos de construcción y demolición")
										<option value="11-Residuos de construcción y demolición" selected>Residuos de construcción y demolición</option>
									@else
										<option value="11-Residuos de construcción y demolición">Residuos de construcción y demolición</option>
									@endif

									@if ($planaccion->n2022_converge_pgirs == "12-Gestión integral de residuos sólidos en el area rural")
										<option value="12-Gestión integral de residuos sólidos en el area rural" selected>Gestión integral de residuos sólidos en el area rural</option>
									@else
										<option value="12-Gestión integral de residuos sólidos en el area rural">Gestión integral de residuos sólidos en el area rural</option>
									@endif

									@if ($planaccion->n2022_converge_pgirs == "13-Gestión integral del riesgo")
										<option value="13-Gestión integral del riesgo" selected>Gestión integral del riesgo</option>
									@else
										<option value="13-Gestión integral del riesgo">Gestión integral del riesgo</option>
									@endif

								</select> 
							</div>
						</div>

						<div class="form-group" style="background-color: #C9F7C1;">
							<label for="n2022_converge_gestion_riesgo" class="negrita">Alineación | Gestión del riesgo</label> 
							<div>
								<select class="form-control" name="n2022_converge_gestion_riesgo">
									@if ($planaccion->n2022_converge_gestion_riesgo == "no")
										<option value="no" selected>No aplica</option>
									@else
										<option value="no">No aplica</option>
									@endif

									@if ($planaccion->n2022_converge_gestion_riesgo == "Programa 1.1")
										<option value="Programa 1.1" selected>Programa 1.1. Conocimiento y evaluación de los riesgos de origen natural, socio-natural, tecnológico y humano no intencional</option>
									@else
										<option value="Programa 1.1">Programa 1.1. Conocimiento y evaluación de los riesgos de origen natural, socio-natural, tecnológico y humano no intencional</option>
									@endif

									@if ($planaccion->n2022_converge_gestion_riesgo == "Programa 1.2")
										<option value="Programa 1.2" selected>Programa 1.2. Adelantar los estudios y construcción de los mapas de amenaza, identificando los peligros de origen natural, socio natural, tecnológico y humano no intencional, así como estudios sobre exposición y vulnerabilidad</option>
									@else
										<option value="Programa 1.2">Programa 1.2. Adelantar los estudios y construcción de los mapas de amenaza, identificando los peligros de origen natural, socio natural, tecnológico y humano no intencional, así como estudios sobre exposición y vulnerabilidad</option>
									@endif

									@if ($planaccion->n2022_converge_gestion_riesgo == "Programa 1.3")
										<option value="Programa 1.3" selected>Programa 1.3. Implementar y fortalecer los servicios de vigilancia y alerta temprana que permitan monitorear el comportamiento de los factores generadores de riesgo en el territorio municipal</option>
									@else
										<option value="Programa 1.3">Programa 1.3. Implementar y fortalecer los servicios de vigilancia y alerta temprana que permitan monitorear el comportamiento de los factores generadores de riesgo en el territorio municipal</option>
									@endif

									@if ($planaccion->n2022_converge_gestion_riesgo == "Programa 2.1")
										<option value="Programa 2.1" selected>Programa 2.1. Incorporación de la gestión del riesgo y medidas de adaptación al cambio climático en el POT y planes de desarrollo municipal y sectoriales</option>
									@else
										<option value="Programa 2.1">Programa 2.1. Incorporación de la gestión del riesgo y medidas de adaptación al cambio climático en el POT y planes de desarrollo municipal y sectoriales</option>
									@endif

									@if ($planaccion->n2022_converge_gestion_riesgo == "Programa 2.2")
										<option value="Programa 2.2" selected>Programa 2.2. Reducción y mitigación del riesgo sectorial y territorial</option>
									@else
										<option value="Programa 2.2">Programa 2.2. Reducción y mitigación del riesgo sectorial y territorial</option>
									@endif

									@if ($planaccion->n2022_converge_gestion_riesgo == "Programa 3.1")
										<option value="Programa 3.1" selected>Programa 3.1. Formulación, actualización, preparación y seguimiento de la estrategia municipal para la respuesta a emergencias (EMRE)</option>
									@else
										<option value="Programa 3.1">Programa 3.1. Formulación, actualización, preparación y seguimiento de la estrategia municipal para la respuesta a emergencias (EMRE)</option>
									@endif

									@if ($planaccion->n2022_converge_gestion_riesgo == "Programa 3.2")
										<option value="Programa 3.2" selected>Programa 3.2. Preparación para la recuperación y rehabilitación de zonas afectadas por desastres</option>
									@else
										<option value="Programa 3.2">Programa 3.2. Preparación para la recuperación y rehabilitación de zonas afectadas por desastres</option>
									@endif

									@if ($planaccion->n2022_converge_gestion_riesgo == "Programa 3.3")
										<option value="Programa 3.3" selected>Programa 3.3. Fortalecimiento de los organismos de socorro y del consejo municipal para la gestión del riesgo de desastres</option>
									@else
										<option value="Programa 3.3">Programa 3.3. Fortalecimiento de los organismos de socorro y del consejo municipal para la gestión del riesgo de desastres</option>
									@endif
								</select> 
							</div>
						</div>

						<div class="form-group" style="background-color: #C9F7C1;">
							<label for="n2022_converge_mipg" class="negrita">Alineación | MIPG</label> 
							<div>
								<select class="form-control" name="n2022_converge_mipg">
									@if ($planaccion->n2022_converge_mipg == "no")
										<option value="no" selected>No aplica</option>
									@else
										<option value="no">No aplica</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "0-Más de una opción")
										<option value="0-Más de una opción" selected>Más de una opción o todas</option>
									@else
										<option value="0-Más de una opción">Más de una opción o todas</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "1-Política de Gestión Estratégica del Talento Humano GETH")
										<option value="1-Política de Gestión Estratégica del Talento Humano GETH" selected>Política de Gestión Estratégica del Talento Humano GETH</option>
									@else
										<option value="1-Política de Gestión Estratégica del Talento Humano GETH">Política de Gestión Estratégica del Talento Humano GETH</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "2-Política de Integridad")
										<option value="2-Política de Integridad" selected>Política de Integridad</option>
									@else
										<option value="2-Política de Integridad">Política de Integridad</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "3-Política de Planeación Institucional")
										<option value="3-Política de Planeación Institucional" selected>Política de Planeación Institucional</option>
									@else
										<option value="3-Política de Planeación Institucional">Política de Planeación Institucional</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "4-Política de Gestion Presupuestal y Eficiencia del Gasto Público")
										<option value="4-Política de Gestion Presupuestal y Eficiencia del Gasto Público" selected>Política de Gestion Presupuestal y Eficiencia del Gasto Público</option>
									@else
										<option value="4-Política de Gestion Presupuestal y Eficiencia del Gasto Público">Política de Gestion Presupuestal y Eficiencia del Gasto Público</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "5-Política Gobierno Digital")
										<option value="5-Política Gobierno Digital" selected>Política Gobierno Digital</option>
									@else
										<option value="5-Política Gobierno Digital">Política Gobierno Digital</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "6-Política Seguridad Digital")
										<option value="6-Política Seguridad Digital" selected>Política Seguridad Digital</option>
									@else
										<option value="6-Política Seguridad Digital">Política Seguridad Digital</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "7-Política de Defensa Juridica")
										<option value="7-Política de Defensa Juridica" selected>Política de Defensa Juridica</option>
									@else
										<option value="7-Política de Defensa Juridica">Política de Defensa Juridica</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "8-Política de Servicio al ciudadano")
										<option value="8-Política de Servicio al ciudadano" selected>Política de Servicio al ciudadano</option>
									@else
										<option value="8-Política de Servicio al ciudadano">Política de Servicio al ciudadano</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "9-Política de Racionalizacion de Tramites")
										<option value="9-Política de Racionalizacion de Tramites" selected>Política de Racionalizacion de Tramites</option>
									@else
										<option value="9-Política de Racionalizacion de Tramites">Política de Racionalizacion de Tramites</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "10-Política de Participacion Ciudadana en la Gestion Publica")
										<option value="10-Política de Participacion Ciudadana en la Gestion Publica" selected>Política de Participacion Ciudadana en la Gestion Publica</option>
									@else
										<option value="10-Política de Participacion Ciudadana en la Gestion Publica">Política de Participacion Ciudadana en la Gestion Publica</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "11-Política de fortalecimiento organizacional y simplicación de procesos")
										<option value="11-Política de fortalecimiento organizacional y simplicación de procesos" selected>Política de fortalecimiento organizacional y simplicación de procesos</option>
									@else
										<option value="11-Política de fortalecimiento organizacional y simplicación de procesos">Política de fortalecimiento organizacional y simplicación de procesos</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "12-Política de Seguimiento y Evaluación del Desempeño Institucional")
										<option value="12-Política de Seguimiento y Evaluación del Desempeño Institucional" selected>Política de Seguimiento y Evaluación del Desempeño Institucional</option>
									@else
										<option value="12-Política de Seguimiento y Evaluación del Desempeño Institucional">Política de Seguimiento y Evaluación del Desempeño Institucional</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "13-Política de Gestión Documental")
										<option value="13-Política de Gestión Documental" selected>Política de Gestión Documental</option>
									@else
										<option value="13-Política de Gestión Documental">Política de Gestión Documental</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "14-Política de Transparencia, acceso a la información pública y lucha contra la corrupción")
										<option value="14-Política de Transparencia, acceso a la información pública y lucha contra la corrupción" selected>Política de Transparencia, acceso a la información pública y lucha contra la corrupción</option>
									@else
										<option value="14-Política de Transparencia, acceso a la información pública y lucha contra la corrupción">Política de Transparencia, acceso a la información pública y lucha contra la corrupción</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "15-Política de Gestión del Conocimiento y la Innovación")
										<option value="15-Política de Gestión del Conocimiento y la Innovación" selected>Política de Gestión del Conocimiento y la Innovación</option>
									@else
										<option value="15-Política de Gestión del Conocimiento y la Innovación">Política de Gestión del Conocimiento y la Innovación</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "16-Política de Control Interno")
										<option value="16-Política de Control Interno" selected>Política de Control Interno</option>
									@else
										<option value="16-Política de Control Interno">Política de Control Interno</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "17-Política de información estadística")
										<option value="17-Política de información estadística" selected>Política de información estadística</option>
									@else
										<option value="17-Política de información estadística">Política de información estadística</option>
									@endif

									@if ($planaccion->n2022_converge_mipg == "18-Política de mejora normativa")
										<option value="18-Política de mejora normativa" selected>Política de mejora normativa</option>
									@else
										<option value="18-Política de mejora normativa">Política de mejora normativa</option>
									@endif

								</select> 
							</div>
						</div>

						<div class="form-group" style="background-color: #C9F7C1;">
							<label for="n2022_ods" class="negrita">Alineación | ODS objetivos del desarrollo sostenible</label> 
							<div>
								<select class="form-control" name="n2022_ods">
									@if ($planaccion->n2022_ods == "no")
										<option value="no" selected>No aplica</option>
									@else
										<option value="no">No aplica</option>
									@endif

									@if ($planaccion->n2022_ods == "1-ODS")
										<option value="1-ODS" selected>Objetivo 1: Poner fin a la pobreza en todas sus formas en todo el mundo</option>
									@else
										<option value="1-ODS">Objetivo 1: Poner fin a la pobreza en todas sus formas en todo el mundo</option>
									@endif

									@if ($planaccion->n2022_ods == "2-ODS")
										<option value="2-ODS" selected>Objetivo 2: Poner fin al hambre, lograr la seguridad alimentaria y la mejora de la nutrición y promover la agricultura sostenible</option>
									@else
										<option value="2-ODS">Objetivo 2: Poner fin al hambre, lograr la seguridad alimentaria y la mejora de la nutrición y promover la agricultura sostenible</option>
									@endif

									@if ($planaccion->n2022_ods == "3-ODS")
										<option value="3-ODS" selected>Objetivo 3: Garantizar una vida sana y promover el bienestar para todos en todas las edades</option>
									@else
										<option value="3-ODS">Objetivo 3: Garantizar una vida sana y promover el bienestar para todos en todas las edades</option>
									@endif

									@if ($planaccion->n2022_ods == "4-ODS")
										<option value="4-ODS" selected>Objetivo 4: Garantizar una educación inclusiva, equitativa y de calidad y promover oportunidades de aprendizaje durante toda la vida para todo</option>
									@else
										<option value="4-ODS">Objetivo 4: Garantizar una educación inclusiva, equitativa y de calidad y promover oportunidades de aprendizaje durante toda la vida para todo</option>
									@endif

									@if ($planaccion->n2022_ods == "5-ODS")
										<option value="5-ODS" selected>Objetivo 5: Lograr la igualdad entre los géneros y empoderar a todas las mujeres y las niñas</option>
									@else
										<option value="5-ODS">Objetivo 5: Lograr la igualdad entre los géneros y empoderar a todas las mujeres y las niñas</option>
									@endif

									@if ($planaccion->n2022_ods == "6-ODS")
										<option value="6-ODS" selected>Objetivo 6: Garantizar la disponibilidad de agua y su gestión sostenible y el saneamiento para todos</option>
									@else
										<option value="6-ODS">Objetivo 6: Garantizar la disponibilidad de agua y su gestión sostenible y el saneamiento para todos</option>
									@endif

									@if ($planaccion->n2022_ods == "7-ODS")
										<option value="7-ODS" selected>Objetivo 7: Garantizar el acceso a una energía asequible, segura, sostenible y moderna para todos</option>
									@else
										<option value="7-ODS">Objetivo 7: Garantizar el acceso a una energía asequible, segura, sostenible y moderna para todos</option>
									@endif

									@if ($planaccion->n2022_ods == "8-ODS")
										<option value="8-ODS" selected>Objetivo 8: Promover el crecimiento económico sostenido, inclusivo y sostenible, el empleo pleno y productivo y el trabajo decente para todos</option>
									@else
										<option value="8-ODS">Objetivo 8: Promover el crecimiento económico sostenido, inclusivo y sostenible, el empleo pleno y productivo y el trabajo decente para todos</option>
									@endif

									@if ($planaccion->n2022_ods == "9-ODS")
										<option value="9-ODS" selected>Objetivo 9: Construir infraestructuras resilientes, promover la industrialización inclusiva y sostenible y fomentar la innovación</option>
									@else
										<option value="9-ODS">Objetivo 9: Construir infraestructuras resilientes, promover la industrialización inclusiva y sostenible y fomentar la innovación</option>
									@endif

									@if ($planaccion->n2022_ods == "10-ODS")
										<option value="10-ODS" selected>Objetivo 10: Reducir la desigualdad en y entre los países</option>
									@else
										<option value="10-ODS">Objetivo 10: Reducir la desigualdad en y entre los países</option>
									@endif

									@if ($planaccion->n2022_ods == "11-ODS")
										<option value="11-ODS" selected>Objetivo 11: Lograr que las ciudades y los asentamientos humanos sean inclusivos, seguros, resilientes y sostenibles</option>
									@else
										<option value="11-ODS">Objetivo 11: Lograr que las ciudades y los asentamientos humanos sean inclusivos, seguros, resilientes y sostenibles</option>
									@endif

									@if ($planaccion->n2022_ods == "12-ODS")
										<option value="12-ODS" selected>Objetivo 12: Garantizar modalidades de consumo y producción sostenibles</option>
									@else
										<option value="12-ODS">Objetivo 12: Garantizar modalidades de consumo y producción sostenibles</option>
									@endif

									@if ($planaccion->n2022_ods == "13-ODS")
										<option value="13-ODS" selected>Objetivo 13: Adoptar medidas urgentes para combatir el cambio climático y sus efectos</option>
									@else
										<option value="13-ODS">Objetivo 13: Adoptar medidas urgentes para combatir el cambio climático y sus efectos</option>
									@endif

									@if ($planaccion->n2022_ods == "14-ODS")
										<option value="14-ODS" selected>Objetivo 14: Conservar y utilizar en forma sostenible los océanos, los mares y los recursos marinos para el desarrollo sostenible</option>
									@else
										<option value="14-ODS">Objetivo 14: Conservar y utilizar en forma sostenible los océanos, los mares y los recursos marinos para el desarrollo sostenible</option>
									@endif

									@if ($planaccion->n2022_ods == "15-ODS")
										<option value="15-ODS" selected>Objetivo 15: Proteger, restablecer y promover el uso sostenible de los ecosistemas terrestres, gestionar los bosques de forma sostenible, luchar contra la desertificación, detener e invertir la degradación de las tierras y poner freno a la pérdida de la diversidad biológica</option>
									@else
										<option value="15-ODS">Objetivo 15: Proteger, restablecer y promover el uso sostenible de los ecosistemas terrestres, gestionar los bosques de forma sostenible, luchar contra la desertificación, detener e invertir la degradación de las tierras y poner freno a la pérdida de la diversidad biológica</option>
									@endif

									@if ($planaccion->n2022_ods == "16-ODS")
										<option value="16-ODS" selected>Objetivo 16: Promover sociedades pacíficas e inclusivas para el desarrollo sostenible, facilitar el acceso a la justicia para todos y crear instituciones eficaces, responsables e inclusivas a todos los niveles</option>
									@else
										<option value="16-ODS">Objetivo 16: Promover sociedades pacíficas e inclusivas para el desarrollo sostenible, facilitar el acceso a la justicia para todos y crear instituciones eficaces, responsables e inclusivas a todos los niveles</option>
									@endif

									@if ($planaccion->n2022_ods == "17-ODS")
										<option value="17-ODS" selected>Objetivo 17: Fortalecer los medios de ejecución y revitalizar la Alianza Mundial para el Desarrollo Sostenible</option>
									@else
										<option value="17-ODS">Objetivo 17: Fortalecer los medios de ejecución y revitalizar la Alianza Mundial para el Desarrollo Sostenible</option>
									@endif
								</select> 
							</div>
						</div>

						<hr>

						<div class="form-group col-md-6">
							<label for="n2022_recursos" class="negrita">1. Recursos asignados para esta acción $</label> 
							<div>
								<input value="{{ $planaccion->n2022_recursos }}" class="form-control" placeholder="Valor en $ asignado..." required="required" name="n2022_recursos" type="text" min="0" id="number" style="font-size: 20px;"> 
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="n2022_fuente" class="negrita">1. Fuente de los recursos</label> 
							<div>
								<select class="form-control" name="n2022_fuente">
									@if ($planaccion->n2022_fuente == "no")
										<option value="0" selected>No aplica</option>
									@else
										<option value="0">No aplica</option>
									@endif

									@if ($planaccion->n2022_fuente == "1")
										<option value="1" selected>1 - Recursos por funcionamiento</option>
									@else
										<option value="1">1 - Recursos por funcionamiento</option>
									@endif

									@if ($planaccion->n2022_fuente == "2")
										<option value="2" selected>2 - Recursos por gestión</option>
									@else
										<option value="2">2 - Recursos por gestión</option>
									@endif

									@if ($planaccion->n2022_fuente == "3")
										<option value="3" selected>3 - IDM | Propios | Otras fuentes</option>
									@else
										<option value="3">3 - IDM | Propios | Otras fuentes</option>
									@endif

									@if ($planaccion->n2022_fuente == "4")
										<option value="4" selected>4 - Bomberos | Propios | Otras fuentes</option>
									@else
										<option value="4">4 - Bomberos | Propios | Otras fuentes</option>
									@endif

									@if ($planaccion->n2022_fuente == "5")
										<option value="5" selected>5 - Serviciudad | Propios | Otras fuentes</option>
									@else
										<option value="5">5 - Serviciudad | Propios | Otras fuentes</option>
									@endif

									@if ($planaccion->n2022_fuente == "1101")
										<option value="1101" selected>1101 - Recursos propios de libre destinacion</option>
									@else
										<option value="1101">1101 - Recursos propios de libre destinacion</option>
									@endif

									@if ($planaccion->n2022_fuente == "1202")
										<option value="1202" selected>1202 - Multas de transito propios destinación especifica</option>
									@else
										<option value="1202">1202 - Multas de transito propios destinación especifica</option>
									@endif

									@if ($planaccion->n2022_fuente == "1205")
										<option value="1205" selected>1205 - Estampilla pro cultura propios destinación especif...</option>
									@else
										<option value="1205">1205 - Estampilla pro cultura propios destinación especif...</option>
									@endif

									@if ($planaccion->n2022_fuente == "1206")
										<option value="1206" selected>1206 - Rendimientos sobre tasa gasolina- Pago contratos...</option>
									@else
										<option value="1206">1206 - Rendimientos sobre tasa gasolina- Pago contratos...</option>
									@endif

									@if ($planaccion->n2022_fuente == "1214")
										<option value="1214" selected>1214 - Estampilla pro bienestar del adulto mayor propios...</option>
									@else
										<option value="1214">1214 - Estampilla pro bienestar del adulto mayor propios...</option>
									@endif

									@if ($planaccion->n2022_fuente == "1215")
										<option value="1215" selected>1215 - Impuesto de consumo al cigarrillo</option>
									@else
										<option value="1215">1215 - Impuesto de consumo al cigarrillo</option>
									@endif

									@if ($planaccion->n2022_fuente == "1216")
										<option value="1216" selected>1216 - Estampilla adulto mayor gobernacion</option>
									@else
										<option value="1216">1216 - Estampilla adulto mayor gobernacion</option>
									@endif

									@if ($planaccion->n2022_fuente == "1217")
										<option value="1217" selected>1217 - Contribución parafiscal</option>
									@else
										<option value="1217">1217 - Contribución parafiscal</option>
									@endif

									@if ($planaccion->n2022_fuente == "1218")
										<option value="1218" selected>1218 - Código policía</option>
									@else
										<option value="1218">1218 - Código policía</option>
									@endif

									@if ($planaccion->n2022_fuente == "2101")
										<option value="2101" selected>2101 - SGP Educación prestación del servicio</option>
									@else
										<option value="2101">2101 - SGP Educación prestación del servicio</option>
									@endif

									@if ($planaccion->n2022_fuente == "2102")
										<option value="2102" selected>2102 - Educación calidad</option>
									@else
										<option value="2102">2102 - Educación calidad</option>
									@endif

									@if ($planaccion->n2022_fuente == "2201")
										<option value="2201" selected>2201 - Fondo de salud</option>
									@else
										<option value="2201">2201 - Fondo de salud</option>
									@endif

									@if ($planaccion->n2022_fuente == "2202")
										<option value="2202" selected>2202 - Salud oferta</option>
									@else
										<option value="2202">2202 - Salud oferta</option>
									@endif

									@if ($planaccion->n2022_fuente == "2203")
										<option value="2203" selected>2203 - SGP Salud publica</option>
									@else
										<option value="2203">2203 - SGP Salud publica</option>
									@endif

									@if ($planaccion->n2022_fuente == "2301")
										<option value="2301" selected>2301 - SGP Agua potable y saneamiento básico</option>
									@else
										<option value="2301">2301 - SGP Agua potable y saneamiento básico</option>
									@endif

									@if ($planaccion->n2022_fuente == "2302")
										<option value="2302" selected>2302 - SGP Deporte</option>
									@else
										<option value="2302">2302 - SGP Deporte</option>
									@endif

									@if ($planaccion->n2022_fuente == "2303")
										<option value="2303" selected>2303 - SGP Cultura</option>
									@else
										<option value="2303">2303 - SGP Cultura</option>
									@endif

									@if ($planaccion->n2022_fuente == "2304")
										<option value="2304" selected>2304 - SGP Alimentación escolar</option>
									@else
										<option value="2304">2304 - SGP Alimentación escolar</option>
									@endif

									@if ($planaccion->n2022_fuente == "2305")
										<option value="2305" selected>2305 - SGP Propósito general</option>
									@else
										<option value="2305">2305 - SGP Propósito general</option>
									@endif

									@if ($planaccion->n2022_fuente == "2306")
										<option value="2306" selected>2306 - SGP Primera infancia</option>
									@else
										<option value="2306">2306 - SGP Primera infancia</option>
									@endif

									@if ($planaccion->n2022_fuente == "3101")
										<option value="3101" selected>3101 - Fondo de seguridad</option>
									@else
										<option value="3101">3101 - Fondo de seguridad</option>
									@endif

									@if ($planaccion->n2022_fuente == "3201")
										<option value="3201" selected>3201 - Áreas de cesión</option>
									@else
										<option value="3201">3101 - Áreas de cesión</option>
									@endif

									@if ($planaccion->n2022_fuente == "3301")
										<option value="3301" selected>3301 - Fondo de solidaridad y redistribución ingreso</option>
									@else
										<option value="3301">3301 - Fondo de solidaridad y redistribución ingreso</option>
									@endif

									@if ($planaccion->n2022_fuente == "3401")
										<option value="3401" selected>3401 - Fondo multa incumplimiento a medidas de P. Violenc...</option>
									@else
										<option value="3401">3401 - Fondo multa incumplimiento a medidas de P. Violenc...</option>
									@endif

									@if ($planaccion->n2022_fuente == "4102")
										<option value="4102" selected>4102 - Convenios salud</option>
									@else
										<option value="4102">4102 - Convenios salud</option>
									@endif

									@if ($planaccion->n2022_fuente == "4106")
										<option value="4106" selected>4106 - Presupuesto participativo</option>
									@else
										<option value="4106">4106 - Presupuesto participativo</option>
									@endif

									@if ($planaccion->n2022_fuente == "4107")
										<option value="4107" selected>4107 - Convenios educación por liquidar</option>
									@else
										<option value="4107">4107 - Convenios educación por liquidar</option>
									@endif

									@if ($planaccion->n2022_fuente == "4121")
										<option value="4121" selected>4121 - Fonpet educación</option>
									@else
										<option value="4121">4121 - Fonpet educación</option>
									@endif

									@if ($planaccion->n2022_fuente == "4122")
										<option value="4122" selected>4122 - Fonpet propósito general</option>
									@else
										<option value="4122">4122 - Fonpet propósito general</option>
									@endif

									@if ($planaccion->n2022_fuente == "4123")
										<option value="4123" selected>4123 - Fonpet otros sectores</option>
									@else
										<option value="4123">4123 - Fonpet otros sectores</option>
									@endif

									@if ($planaccion->n2022_fuente == "4124")
										<option value="4124" selected>4124 - Convenio Fonade</option>
									@else
										<option value="4124">4124 - Convenio Fonade</option>
									@endif

									@if ($planaccion->n2022_fuente == "4127")
										<option value="4127" selected>4127 - Residuos solidos</option>
									@else
										<option value="4127">4127 - Residuos solidos</option>
									@endif

									@if ($planaccion->n2022_fuente == "4201")
										<option value="4201" selected>4201 - Etesa</option>
									@else
										<option value="4201">4201 - Etesa</option>
									@endif

									@if ($planaccion->n2022_fuente == "4303")
										<option value="4303" selected>4303 - Regalías régimen anterior</option>
									@else
										<option value="4303">4303 - Regalías régimen anterior</option>
									@endif

									@if ($planaccion->n2022_fuente == "4501")
										<option value="4501" selected>4501 - Empréstito malla vial</option>
									@else
										<option value="4501">4501 - Empréstito malla vial</option>
									@endif

									@if ($planaccion->n2022_fuente == "4506")
										<option value="4506" selected>4506 - Donaciones</option>
									@else
										<option value="4506">4506 - Donaciones</option>
									@endif

									@if ($planaccion->n2022_fuente == "4508")
										<option value="4508" selected>4508 - Rendimiento propios</option>
									@else
										<option value="4508">4508 - Rendimiento propios</option>
									@endif

									@if ($planaccion->n2022_fuente == "4601")
										<option value="4601" selected>4601 - Convenio estratificacion</option>
									@else
										<option value="4601">4601 - Convenio estratificacion</option>
									@endif
								</select> 
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="n2022_recursos2" class="negrita">2. Recursos asignados para esta acción $</label> 
							<div>
								<input value="{{ $planaccion->n2022_recursos2 }}" class="form-control" placeholder="Valor en $ asignado..." required="required" name="n2022_recursos2" type="text" min="0" id="number2" style="font-size: 20px;"> 
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="n2022_fuente2" class="negrita">2. Fuente de los recursos</label> 
							<div>
								<select class="form-control" name="n2022_fuente2">
									@if ($planaccion->n2022_fuente2 == "no")
										<option value="0" selected>No aplica</option>
									@else
										<option value="0">No aplica</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "1")
										<option value="1" selected>1 - Recursos por funcionamiento</option>
									@else
										<option value="1">1 - Recursos por funcionamiento</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "2")
										<option value="2" selected>2 - Recursos por gestión</option>
									@else
										<option value="2">2 - Recursos por gestión</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "3")
										<option value="3" selected>3 - IDM | Propios | Otras fuentes</option>
									@else
										<option value="3">3 - IDM | Propios | Otras fuentes</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4")
										<option value="4" selected>4 - Bomberos | Propios | Otras fuentes</option>
									@else
										<option value="4">4 - Bomberos | Propios | Otras fuentes</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "5")
										<option value="5" selected>5 - Serviciudad | Propios | Otras fuentes</option>
									@else
										<option value="5">5 - Serviciudad | Propios | Otras fuentes</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "1101")
										<option value="1101" selected>1101 - Recursos propios de libre destinacion</option>
									@else
										<option value="1101">1101 - Recursos propios de libre destinacion</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "1202")
										<option value="1202" selected>1202 - Multas de transito propios destinación especifica</option>
									@else
										<option value="1202">1202 - Multas de transito propios destinación especifica</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "1205")
										<option value="1205" selected>1205 - Estampilla pro cultura propios destinación especif...</option>
									@else
										<option value="1205">1205 - Estampilla pro cultura propios destinación especif...</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "1206")
										<option value="1206" selected>1206 - Rendimientos sobre tasa gasolina- Pago contratos...</option>
									@else
										<option value="1206">1206 - Rendimientos sobre tasa gasolina- Pago contratos...</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "1214")
										<option value="1214" selected>1214 - Estampilla pro bienestar del adulto mayor propios...</option>
									@else
										<option value="1214">1214 - Estampilla pro bienestar del adulto mayor propios...</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "1215")
										<option value="1215" selected>1215 - Impuesto de consumo al cigarrillo</option>
									@else
										<option value="1215">1215 - Impuesto de consumo al cigarrillo</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "1216")
										<option value="1216" selected>1216 - Estampilla adulto mayor gobernacion</option>
									@else
										<option value="1216">1216 - Estampilla adulto mayor gobernacion</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "1217")
										<option value="1217" selected>1217 - Contribución parafiscal</option>
									@else
										<option value="1217">1217 - Contribución parafiscal</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "1218")
										<option value="1218" selected>1218 - Código policía</option>
									@else
										<option value="1218">1218 - Código policía</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "2101")
										<option value="2101" selected>2101 - SGP Educación prestación del servicio</option>
									@else
										<option value="2101">2101 - SGP Educación prestación del servicio</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "2102")
										<option value="2102" selected>2102 - Educación calidad</option>
									@else
										<option value="2102">2102 - Educación calidad</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "2201")
										<option value="2201" selected>2201 - Fondo de salud</option>
									@else
										<option value="2201">2201 - Fondo de salud</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "2202")
										<option value="2202" selected>2202 - Salud oferta</option>
									@else
										<option value="2202">2202 - Salud oferta</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "2203")
										<option value="2203" selected>2203 - SGP Salud publica</option>
									@else
										<option value="2203">2203 - SGP Salud publica</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "2301")
										<option value="2301" selected>2301 - SGP Agua potable y saneamiento básico</option>
									@else
										<option value="2301">2301 - SGP Agua potable y saneamiento básico</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "2302")
										<option value="2302" selected>2302 - SGP Deporte</option>
									@else
										<option value="2302">2302 - SGP Deporte</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "2303")
										<option value="2303" selected>2303 - SGP Cultura</option>
									@else
										<option value="2303">2303 - SGP Cultura</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "2304")
										<option value="2304" selected>2304 - SGP Alimentación escolar</option>
									@else
										<option value="2304">2304 - SGP Alimentación escolar</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "2305")
										<option value="2305" selected>2305 - SGP Propósito general</option>
									@else
										<option value="2305">2305 - SGP Propósito general</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "2306")
										<option value="2306" selected>2306 - SGP Primera infancia</option>
									@else
										<option value="2306">2306 - SGP Primera infancia</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "3101")
										<option value="3101" selected>3101 - Fondo de seguridad</option>
									@else
										<option value="3101">3101 - Fondo de seguridad</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "3201")
										<option value="3201" selected>3201 - Áreas de cesión</option>
									@else
										<option value="3201">3101 - Áreas de cesión</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "3301")
										<option value="3301" selected>3301 - Fondo de solidaridad y redistribución ingreso</option>
									@else
										<option value="3301">3301 - Fondo de solidaridad y redistribución ingreso</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "3401")
										<option value="3401" selected>3401 - Fondo multa incumplimiento a medidas de P. Violenc...</option>
									@else
										<option value="3401">3401 - Fondo multa incumplimiento a medidas de P. Violenc...</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4102")
										<option value="4102" selected>4102 - Convenios salud</option>
									@else
										<option value="4102">4102 - Convenios salud</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4106")
										<option value="4106" selected>4106 - Presupuesto participativo</option>
									@else
										<option value="4106">4106 - Presupuesto participativo</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4107")
										<option value="4107" selected>4107 - Convenios educación por liquidar</option>
									@else
										<option value="4107">4107 - Convenios educación por liquidar</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4121")
										<option value="4121" selected>4121 - Fonpet educación</option>
									@else
										<option value="4121">4121 - Fonpet educación</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4122")
										<option value="4122" selected>4122 - Fonpet propósito general</option>
									@else
										<option value="4122">4122 - Fonpet propósito general</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4123")
										<option value="4123" selected>4123 - Fonpet otros sectores</option>
									@else
										<option value="4123">4123 - Fonpet otros sectores</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4124")
										<option value="4124" selected>4124 - Convenio Fonade</option>
									@else
										<option value="4124">4124 - Convenio Fonade</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4127")
										<option value="4127" selected>4127 - Residuos solidos</option>
									@else
										<option value="4127">4127 - Residuos solidos</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4201")
										<option value="4201" selected>4201 - Etesa</option>
									@else
										<option value="4201">4201 - Etesa</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4303")
										<option value="4303" selected>4303 - Regalías régimen anterior</option>
									@else
										<option value="4303">4303 - Regalías régimen anterior</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4501")
										<option value="4501" selected>4501 - Empréstito malla vial</option>
									@else
										<option value="4501">4501 - Empréstito malla vial</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4506")
										<option value="4506" selected>4506 - Donaciones</option>
									@else
										<option value="4506">4506 - Donaciones</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4508")
										<option value="4508" selected>4508 - Rendimiento propios</option>
									@else
										<option value="4508">4508 - Rendimiento propios</option>
									@endif

									@if ($planaccion->n2022_fuente2 == "4601")
										<option value="4601" selected>4601 - Convenio estratificacion</option>
									@else
										<option value="4601">4601 - Convenio estratificacion</option>
									@endif
								</select> 
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="n2022_recursos3" class="negrita">3. Recursos asignados para esta acción $</label> 
							<div>
								<input value="{{ $planaccion->n2022_recursos3 }}" class="form-control" placeholder="Valor en $ asignado..." required="required" name="n2022_recursos3" type="text" min="0" id="number3" style="font-size: 20px;"> 
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="n2022_fuente3" class="negrita">3. Fuente de los recursos</label> 
							<div>
								<select class="form-control" name="n2022_fuente3">
									@if ($planaccion->n2022_fuente3 == "no")
										<option value="0" selected>No aplica</option>
									@else
										<option value="0">No aplica</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "1")
										<option value="1" selected>1 - Recursos por funcionamiento</option>
									@else
										<option value="1">1 - Recursos por funcionamiento</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "2")
										<option value="2" selected>2 - Recursos por gestión</option>
									@else
										<option value="2">2 - Recursos por gestión</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "3")
										<option value="3" selected>3 - IDM | Propios | Otras fuentes</option>
									@else
										<option value="3">3 - IDM | Propios | Otras fuentes</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4")
										<option value="4" selected>4 - Bomberos | Propios | Otras fuentes</option>
									@else
										<option value="4">4 - Bomberos | Propios | Otras fuentes</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "5")
										<option value="5" selected>5 - Serviciudad | Propios | Otras fuentes</option>
									@else
										<option value="5">5 - Serviciudad | Propios | Otras fuentes</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "1101")
										<option value="1101" selected>1101 - Recursos propios de libre destinacion</option>
									@else
										<option value="1101">1101 - Recursos propios de libre destinacion</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "1202")
										<option value="1202" selected>1202 - Multas de transito propios destinación especifica</option>
									@else
										<option value="1202">1202 - Multas de transito propios destinación especifica</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "1205")
										<option value="1205" selected>1205 - Estampilla pro cultura propios destinación especif...</option>
									@else
										<option value="1205">1205 - Estampilla pro cultura propios destinación especif...</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "1206")
										<option value="1206" selected>1206 - Rendimientos sobre tasa gasolina- Pago contratos...</option>
									@else
										<option value="1206">1206 - Rendimientos sobre tasa gasolina- Pago contratos...</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "1214")
										<option value="1214" selected>1214 - Estampilla pro bienestar del adulto mayor propios...</option>
									@else
										<option value="1214">1214 - Estampilla pro bienestar del adulto mayor propios...</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "1215")
										<option value="1215" selected>1215 - Impuesto de consumo al cigarrillo</option>
									@else
										<option value="1215">1215 - Impuesto de consumo al cigarrillo</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "1216")
										<option value="1216" selected>1216 - Estampilla adulto mayor gobernacion</option>
									@else
										<option value="1216">1216 - Estampilla adulto mayor gobernacion</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "1217")
										<option value="1217" selected>1217 - Contribución parafiscal</option>
									@else
										<option value="1217">1217 - Contribución parafiscal</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "1218")
										<option value="1218" selected>1218 - Código policía</option>
									@else
										<option value="1218">1218 - Código policía</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "2101")
										<option value="2101" selected>2101 - SGP Educación prestación del servicio</option>
									@else
										<option value="2101">2101 - SGP Educación prestación del servicio</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "2102")
										<option value="2102" selected>2102 - Educación calidad</option>
									@else
										<option value="2102">2102 - Educación calidad</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "2201")
										<option value="2201" selected>2201 - Fondo de salud</option>
									@else
										<option value="2201">2201 - Fondo de salud</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "2202")
										<option value="2202" selected>2202 - Salud oferta</option>
									@else
										<option value="2202">2202 - Salud oferta</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "2203")
										<option value="2203" selected>2203 - SGP Salud publica</option>
									@else
										<option value="2203">2203 - SGP Salud publica</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "2301")
										<option value="2301" selected>2301 - SGP Agua potable y saneamiento básico</option>
									@else
										<option value="2301">2301 - SGP Agua potable y saneamiento básico</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "2302")
										<option value="2302" selected>2302 - SGP Deporte</option>
									@else
										<option value="2302">2302 - SGP Deporte</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "2303")
										<option value="2303" selected>2303 - SGP Cultura</option>
									@else
										<option value="2303">2303 - SGP Cultura</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "2304")
										<option value="2304" selected>2304 - SGP Alimentación escolar</option>
									@else
										<option value="2304">2304 - SGP Alimentación escolar</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "2305")
										<option value="2305" selected>2305 - SGP Propósito general</option>
									@else
										<option value="2305">2305 - SGP Propósito general</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "2306")
										<option value="2306" selected>2306 - SGP Primera infancia</option>
									@else
										<option value="2306">2306 - SGP Primera infancia</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "3101")
										<option value="3101" selected>3101 - Fondo de seguridad</option>
									@else
										<option value="3101">3101 - Fondo de seguridad</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "3201")
										<option value="3201" selected>3201 - Áreas de cesión</option>
									@else
										<option value="3201">3101 - Áreas de cesión</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "3301")
										<option value="3301" selected>3301 - Fondo de solidaridad y redistribución ingreso</option>
									@else
										<option value="3301">3301 - Fondo de solidaridad y redistribución ingreso</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "3401")
										<option value="3401" selected>3401 - Fondo multa incumplimiento a medidas de P. Violenc...</option>
									@else
										<option value="3401">3401 - Fondo multa incumplimiento a medidas de P. Violenc...</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4102")
										<option value="4102" selected>4102 - Convenios salud</option>
									@else
										<option value="4102">4102 - Convenios salud</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4106")
										<option value="4106" selected>4106 - Presupuesto participativo</option>
									@else
										<option value="4106">4106 - Presupuesto participativo</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4107")
										<option value="4107" selected>4107 - Convenios educación por liquidar</option>
									@else
										<option value="4107">4107 - Convenios educación por liquidar</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4121")
										<option value="4121" selected>4121 - Fonpet educación</option>
									@else
										<option value="4121">4121 - Fonpet educación</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4122")
										<option value="4122" selected>4122 - Fonpet propósito general</option>
									@else
										<option value="4122">4122 - Fonpet propósito general</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4123")
										<option value="4123" selected>4123 - Fonpet otros sectores</option>
									@else
										<option value="4123">4123 - Fonpet otros sectores</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4124")
										<option value="4124" selected>4124 - Convenio Fonade</option>
									@else
										<option value="4124">4124 - Convenio Fonade</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4127")
										<option value="4127" selected>4127 - Residuos solidos</option>
									@else
										<option value="4127">4127 - Residuos solidos</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4201")
										<option value="4201" selected>4201 - Etesa</option>
									@else
										<option value="4201">4201 - Etesa</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4303")
										<option value="4303" selected>4303 - Regalías régimen anterior</option>
									@else
										<option value="4303">4303 - Regalías régimen anterior</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4501")
										<option value="4501" selected>4501 - Empréstito malla vial</option>
									@else
										<option value="4501">4501 - Empréstito malla vial</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4506")
										<option value="4506" selected>4506 - Donaciones</option>
									@else
										<option value="4506">4506 - Donaciones</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4508")
										<option value="4508" selected>4508 - Rendimiento propios</option>
									@else
										<option value="4508">4508 - Rendimiento propios</option>
									@endif

									@if ($planaccion->n2022_fuente3 == "4601")
										<option value="4601" selected>4601 - Convenio estratificacion</option>
									@else
										<option value="4601">4601 - Convenio estratificacion</option>
									@endif
								</select> 
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="n2022_recursos4" class="negrita">4. Recursos asignados para esta acción $</label> 
							<div>
								<input value="{{ $planaccion->n2022_recursos4 }}" class="form-control" placeholder="Valor en $ asignado..." required="required" name="n2022_recursos4" type="text" min="0" id="number4" style="font-size: 20px;"> 
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="n2022_fuente4" class="negrita">4. Fuente de los recursos</label> 
							<div>
								<select class="form-control" name="n2022_fuente4">
									@if ($planaccion->n2022_fuente4 == "no")
										<option value="0" selected>No aplica</option>
									@else
										<option value="0">No aplica</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "1")
										<option value="1" selected>1 - Recursos por funcionamiento</option>
									@else
										<option value="1">1 - Recursos por funcionamiento</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "2")
										<option value="2" selected>2 - Recursos por gestión</option>
									@else
										<option value="2">2 - Recursos por gestión</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "3")
										<option value="3" selected>3 - IDM | Propios | Otras fuentes</option>
									@else
										<option value="3">3 - IDM | Propios | Otras fuentes</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4")
										<option value="4" selected>4 - Bomberos | Propios | Otras fuentes</option>
									@else
										<option value="4">4 - Bomberos | Propios | Otras fuentes</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "5")
										<option value="5" selected>5 - Serviciudad | Propios | Otras fuentes</option>
									@else
										<option value="5">5 - Serviciudad | Propios | Otras fuentes</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "1101")
										<option value="1101" selected>1101 - Recursos propios de libre destinacion</option>
									@else
										<option value="1101">1101 - Recursos propios de libre destinacion</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "1202")
										<option value="1202" selected>1202 - Multas de transito propios destinación especifica</option>
									@else
										<option value="1202">1202 - Multas de transito propios destinación especifica</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "1205")
										<option value="1205" selected>1205 - Estampilla pro cultura propios destinación especif...</option>
									@else
										<option value="1205">1205 - Estampilla pro cultura propios destinación especif...</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "1206")
										<option value="1206" selected>1206 - Rendimientos sobre tasa gasolina- Pago contratos...</option>
									@else
										<option value="1206">1206 - Rendimientos sobre tasa gasolina- Pago contratos...</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "1214")
										<option value="1214" selected>1214 - Estampilla pro bienestar del adulto mayor propios...</option>
									@else
										<option value="1214">1214 - Estampilla pro bienestar del adulto mayor propios...</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "1215")
										<option value="1215" selected>1215 - Impuesto de consumo al cigarrillo</option>
									@else
										<option value="1215">1215 - Impuesto de consumo al cigarrillo</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "1216")
										<option value="1216" selected>1216 - Estampilla adulto mayor gobernacion</option>
									@else
										<option value="1216">1216 - Estampilla adulto mayor gobernacion</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "1217")
										<option value="1217" selected>1217 - Contribución parafiscal</option>
									@else
										<option value="1217">1217 - Contribución parafiscal</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "1218")
										<option value="1218" selected>1218 - Código policía</option>
									@else
										<option value="1218">1218 - Código policía</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "2101")
										<option value="2101" selected>2101 - SGP Educación prestación del servicio</option>
									@else
										<option value="2101">2101 - SGP Educación prestación del servicio</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "2102")
										<option value="2102" selected>2102 - Educación calidad</option>
									@else
										<option value="2102">2102 - Educación calidad</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "2201")
										<option value="2201" selected>2201 - Fondo de salud</option>
									@else
										<option value="2201">2201 - Fondo de salud</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "2202")
										<option value="2202" selected>2202 - Salud oferta</option>
									@else
										<option value="2202">2202 - Salud oferta</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "2203")
										<option value="2203" selected>2203 - SGP Salud publica</option>
									@else
										<option value="2203">2203 - SGP Salud publica</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "2301")
										<option value="2301" selected>2301 - SGP Agua potable y saneamiento básico</option>
									@else
										<option value="2301">2301 - SGP Agua potable y saneamiento básico</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "2302")
										<option value="2302" selected>2302 - SGP Deporte</option>
									@else
										<option value="2302">2302 - SGP Deporte</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "2303")
										<option value="2303" selected>2303 - SGP Cultura</option>
									@else
										<option value="2303">2303 - SGP Cultura</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "2304")
										<option value="2304" selected>2304 - SGP Alimentación escolar</option>
									@else
										<option value="2304">2304 - SGP Alimentación escolar</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "2305")
										<option value="2305" selected>2305 - SGP Propósito general</option>
									@else
										<option value="2305">2305 - SGP Propósito general</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "2306")
										<option value="2306" selected>2306 - SGP Primera infancia</option>
									@else
										<option value="2306">2306 - SGP Primera infancia</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "3101")
										<option value="3101" selected>3101 - Fondo de seguridad</option>
									@else
										<option value="3101">3101 - Fondo de seguridad</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "3201")
										<option value="3201" selected>3201 - Áreas de cesión</option>
									@else
										<option value="3201">3101 - Áreas de cesión</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "3301")
										<option value="3301" selected>3301 - Fondo de solidaridad y redistribución ingreso</option>
									@else
										<option value="3301">3301 - Fondo de solidaridad y redistribución ingreso</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "3401")
										<option value="3401" selected>3401 - Fondo multa incumplimiento a medidas de P. Violenc...</option>
									@else
										<option value="3401">3401 - Fondo multa incumplimiento a medidas de P. Violenc...</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4102")
										<option value="4102" selected>4102 - Convenios salud</option>
									@else
										<option value="4102">4102 - Convenios salud</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4106")
										<option value="4106" selected>4106 - Presupuesto participativo</option>
									@else
										<option value="4106">4106 - Presupuesto participativo</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4107")
										<option value="4107" selected>4107 - Convenios educación por liquidar</option>
									@else
										<option value="4107">4107 - Convenios educación por liquidar</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4121")
										<option value="4121" selected>4121 - Fonpet educación</option>
									@else
										<option value="4121">4121 - Fonpet educación</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4122")
										<option value="4122" selected>4122 - Fonpet propósito general</option>
									@else
										<option value="4122">4122 - Fonpet propósito general</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4123")
										<option value="4123" selected>4123 - Fonpet otros sectores</option>
									@else
										<option value="4123">4123 - Fonpet otros sectores</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4124")
										<option value="4124" selected>4124 - Convenio Fonade</option>
									@else
										<option value="4124">4124 - Convenio Fonade</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4127")
										<option value="4127" selected>4127 - Residuos solidos</option>
									@else
										<option value="4127">4127 - Residuos solidos</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4201")
										<option value="4201" selected>4201 - Etesa</option>
									@else
										<option value="4201">4201 - Etesa</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4303")
										<option value="4303" selected>4303 - Regalías régimen anterior</option>
									@else
										<option value="4303">4303 - Regalías régimen anterior</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4501")
										<option value="4501" selected>4501 - Empréstito malla vial</option>
									@else
										<option value="4501">4501 - Empréstito malla vial</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4506")
										<option value="4506" selected>4506 - Donaciones</option>
									@else
										<option value="4506">4506 - Donaciones</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4508")
										<option value="4508" selected>4508 - Rendimiento propios</option>
									@else
										<option value="4508">4508 - Rendimiento propios</option>
									@endif

									@if ($planaccion->n2022_fuente4 == "4601")
										<option value="4601" selected>4601 - Convenio estratificacion</option>
									@else
										<option value="4601">4601 - Convenio estratificacion</option>
									@endif
								</select> 
							</div>
						</div>						

						<hr>

						<div class="form-group">
							<label for="n2022_codigo_fut" class="negrita">Código FUT</label> 
							<div>
								<select class="form-control" name="n2022_codigo_fut">
									@if ($planaccion->n2022_codigo_fut == "no")
										<option value="no" selected>No aplica</option>
									@else
										<option value="no">No aplica</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "1-Educación")
										<option value="1-Educación" selected>1 - Educación</option>
									@else
										<option value="1-Educación">1 - Educación</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "2-Salud")
										<option value="2-Salud" selected>2 - Salud</option>
									@else
										<option value="2-Salud">2 - Salud</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "3-Agua potable y saneamiento básico")
										<option value="3-Agua potable y saneamiento básico" selected>3 - Agua potable y saneamiento básico</option>
									@else
										<option value="3-Agua potable y saneamiento básico">3 - Agua potable y saneamiento básico</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "4-Deporte y recreación")
										<option value="4-Deporte y recreación" selected>4 - Deporte y recreación</option>
									@else
										<option value="4-Deporte y recreación">4 - Deporte y recreación</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "5-Cultura")
										<option value="5-Cultura" selected>5 - Cultura</option>
									@else
										<option value="5-Cultura">5 - Cultura</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "6-Servicios públicos diferentes a acueducto, alcantarillado y aseo")
										<option value="6-Servicios públicos diferentes a acueducto, alcantarillado y aseo" selected>6 - Servicios públicos diferentes a acueducto, alcantarillado y aseo</option>
									@else
										<option value="6-Servicios públicos diferentes a acueducto, alcantarillado y aseo">6 - Servicios públicos diferentes a acueducto, alcantarillado y aseo</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "7-Vivienda")
										<option value="7-Vivienda" selected>7 - Vivienda</option>
									@else
										<option value="7-Vivienda">7 - Vivienda</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "8-Agropecuario")
										<option value="8-Agropecuario" selected>8 - Agropecuario</option>
									@else
										<option value="8-Agropecuario">8 - Agropecuario</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "9-Transporte")
										<option value="9-Transporte" selected>9 - Transporte</option>
									@else
										<option value="9-Transporte">9 - Transporte</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "10-Ambiental")
										<option value="10-Ambiental" selected>10 - Ambiental</option>
									@else
										<option value="10-Ambiental">10 - Ambiental</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "11-Centros de reclusión")
										<option value="11-Centros de reclusión" selected>11 - Centros de reclusión</option>
									@else
										<option value="11-Centros de reclusión">11 - Centros de reclusión</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "12-Prevención y atención de desastres")
										<option value="12-Prevención y atención de desastres" selected>12 - Prevención y atención de desastres</option>
									@else
										<option value="12-Prevención y atención de desastres">12 - Prevención y atención de desastres</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "13-Promoción del desarrollo")
										<option value="13-Promoción del desarrollo" selected>13 - Promoción del desarrollo</option>
									@else
										<option value="13-Promoción del desarrollo">13 - Promoción del desarrollo</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "14-Atención a grupos vulnerables - Promoción Social")
										<option value="14-Atención a grupos vulnerables - Promoción Social" selected>14 - Atención a grupos vulnerables - Promoción Social</option>
									@else
										<option value="14-Atención a grupos vulnerables - Promoción Social">14 - Atención a grupos vulnerables - Promoción Social</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "15-Equipamiento")
										<option value="15-Equipamiento" selected>15 - Equipamiento</option>
									@else
										<option value="15-Equipamiento">15 - Equipamiento</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "16-Desarrollo comunitario")
										<option value="16-Desarrollo comunitario" selected>16 - Desarrollo comunitario</option>
									@else
										<option value="16-Desarrollo comunitario">16 - Desarrollo comunitario</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "17-Fortalecimiento institucional")
										<option value="17-Fortalecimiento institucional" selected>17 - Fortalecimiento institucional</option>
									@else
										<option value="17-Fortalecimiento institucional">17 - Fortalecimiento institucional</option>
									@endif

									@if ($planaccion->n2022_codigo_fut == "18-Justicia y seguridad")
										<option value="18-Justicia y seguridad" selected>18 - Justicia y seguridad</option>
									@else
										<option value="18-Justicia y seguridad">18 - Justicia y seguridad</option>
									@endif

								</select> 
							</div>
						</div>

						<hr>

						<div class="form-group col-md-12"><b><h3>Proyecto inscrito en el Banco de Proyectos</h3></b></div>

						<div class="form-group">
							<label for="n2022_codigo_bpim" class="negrita">Código BPIM</label> 
							<div>
								<select class="form-control" name="n2022_codigo_bpim">
									@if ($planaccion->n2022_codigo_bpim == "no")
										<option value="no" selected>No aplica</option>
									@else
										<option value="no">No aplica</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700002")
										<option value="2020661700002" selected>2020661700002 - fortalecimiento de la seguridad,convivencia y participación ciudadana, en el municipio   dos quebradas</option>
									@else
										<option value="2020661700002">2020661700002 - fortalecimiento de la seguridad,convivencia y participación ciudadana, en el municipio   dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700003")
										<option value="2020661700003" selected>2020661700003 - fortalecimiento de la movilidad y seguridad vial en el municipio de   dos quebradas</option>
									@else
										<option value="2020661700003">2020661700003 - fortalecimiento de la movilidad y seguridad vial en el municipio de   dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700004")
										<option value="2020661700004" selected>2020661700004 - fortalecimiento de la economía local  como territorio empresarial y competitivo en el municipio de   dos quebradas</option>
									@else
										<option value="2020661700004">2020661700004 - fortalecimiento de la economía local  como territorio empresarial y competitivo en el municipio de   dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700005")
										<option value="2020661700005" selected>2020661700005 - construcción adecuación y mejoramiento de la infraestructura física y de transporte del municipio de   dos quebradas</option>
									@else
										<option value="2020661700005">2020661700005 - construcción adecuación y mejoramiento de la infraestructura física y de transporte del municipio de   dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700006")
										<option value="2020661700006" selected>2020661700006 - mejoramiento  de la gestión tributaria, financiera y desempeño fiscal de la secretaría de hacienda y finanzas públicas del  municipio de  dos quebradas</option>
									@else
										<option value="2020661700006">2020661700006 - mejoramiento  de la gestión tributaria, financiera y desempeño fiscal de la secretaría de hacienda y finanzas públicas del  municipio de  dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700007")
										<option value="2020661700007" selected>2020661700007 - asistencia y atención integral a la población vulnerable del municipio de dosquebradas, risaralda  dos quebradas</option>
									@else
										<option value="2020661700007">2020661700007 - asistencia y atención integral a la población vulnerable del municipio de dosquebradas, risaralda  dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700008")
										<option value="2020661700008" selected>2020661700008 - mejoramiento de la gestión institucional y el desarrollo del talento humano en el municipio de   dos quebradas</option>
									@else
										<option value="2020661700008">2020661700008 - mejoramiento de la gestión institucional y el desarrollo del talento humano en el municipio de   dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700010")
										<option value="2020661700010" selected>2020661700010 - fortalecimiento tecnológico de la administración al servicio de la ciudadanía en el municipio de   dos quebradas</option>
									@else
										<option value="2020661700010">2020661700010 - fortalecimiento tecnológico de la administración al servicio de la ciudadanía en el municipio de   dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700013")
										<option value="2020661700013" selected>2020661700013 - implementación de estrategias para el mejoramiento de la productividad y competitividad del sector rural del municipio de  dos quebradas</option>
									@else
										<option value="2020661700013">2020661700013 - implementación de estrategias para el mejoramiento de la productividad y competitividad del sector rural del municipio de  dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700014")
										<option value="2020661700014" selected>2020661700014 - implementación de acciones para la gestión ambiental sostenible e inclusiva en el municipio de  dos quebradas</option>
									@else
										<option value="2020661700014">2020661700014 - implementación de acciones para la gestión ambiental sostenible e inclusiva en el municipio de  dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700019")
										<option value="2020661700019" selected>2020661700019 - fortalecimiento a la gestión jurídica de la defensa judicial y de la gestión de la contratación del municipio de  dos quebradas</option>
									@else
										<option value="2020661700019">2020661700019 - fortalecimiento a la gestión jurídica de la defensa judicial y de la gestión de la contratación del municipio de  dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700020")
										<option value="2020661700020" selected>2020661700020 - fortalecimiento  de las capacidades institucionales de la dirección socioeconómica en la secretaría de planeación del municipio de  dos quebradas</option>
									@else
										<option value="2020661700020">2020661700020 - fortalecimiento  de las capacidades institucionales de la dirección socioeconómica en la secretaría de planeación del municipio de  dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700021")
										<option value="2020661700021" selected>2020661700021 - fortalecimiento del sistema de gestión de la alcaldía de  dos quebradas</option>
									@else
										<option value="2020661700021">2020661700021 - fortalecimiento del sistema de gestión de la alcaldía de  dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700022")
										<option value="2020661700022" selected>2020661700022 - fortalecimiento proceso de gestion del riesgo  dos quebradas</option>
									@else
										<option value="2020661700022">2020661700022 - fortalecimiento proceso de gestion del riesgo  dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700023")
										<option value="2020661700023" selected>2020661700023 - implementación de los programas de educación física, deporte, recreación y actividad física en el municipio de   dos quebradas</option>
									@else
										<option value="2020661700023">2020661700023 - implementación de los programas de educación física, deporte, recreación y actividad física en el municipio de   dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700024")
										<option value="2020661700024" selected>2020661700024 - administración de la ejecución, vigilancia y control de la salud pública en  dos quebradas</option>
									@else
										<option value="2020661700024">2020661700024 - administración de la ejecución, vigilancia y control de la salud pública en  dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700025")
										<option value="2020661700025" selected>2020661700025 - administración de los recursos del régimen subsidiado de dos quebradas</option>
									@else
										<option value="2020661700025">2020661700025 - administración de los recursos del régimen subsidiado de dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700026")
										<option value="2020661700026" selected>2020661700026 - generación de servicios públicos para la competitividad y el bienestar de todos en el municipio de   dos quebradas</option>
									@else
										<option value="2020661700026">2020661700026 - generación de servicios públicos para la competitividad y el bienestar de todos en el municipio de   dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700027")
										<option value="2020661700027" selected>2020661700027 - generación del desarrollo ordenado, planificado y dinámico del territorio del municipio de  dos quebradas</option>
									@else
										<option value="2020661700027">2020661700027 - generación del desarrollo ordenado, planificado y dinámico del territorio del municipio de  dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2020661700028")
										<option value="2020661700028" selected>2020661700028 - mejoramiento  de los procesos educativos en calidad, cobertura, permanencia y eficiencia en el servicio educativo del municipio de dosquebradas  dos quebradas</option>
									@else
										<option value="2020661700028">2020661700028 - mejoramiento  de los procesos educativos en calidad, cobertura, permanencia y eficiencia en el servicio educativo del municipio de dosquebradas  dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2021661700004")
										<option value="2021661700004" selected>2021661700004 - fortalecimiento del desarrollo artístico y cultural en el municipio de   dos quebradas</option>
									@else
										<option value="2021661700004">2021661700004 - fortalecimiento del desarrollo artístico y cultural en el municipio de   dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2021661700013")
										<option value="2021661700013" selected>2021661700013 - apoyo  financiero para la construcción de la planta de tratamiento de aguas residuales para las ciudades de dos quebradas - pereira,   dos quebradas</option>
									@else
										<option value="2021661700013">2021661700013 - apoyo  financiero para la construcción de la planta de tratamiento de aguas residuales para las ciudades de dos quebradas - pereira,   dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2021661700015")
										<option value="2021661700015" selected>2021661700015 - implementación  de los programas de educación física, deporte, recreación y actividad física en el municipio de   dos quebradas</option>
									@else
										<option value="2021661700015">2021661700015 - implementación  de los programas de educación física, deporte, recreación y actividad física en el municipio de   dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2021661700016")
										<option value="2021661700016" selected>2021661700016 - administración de los recursos de aseguramiento y prestación integral de servicios de salud en el municipio de    dos quebradas</option>
									@else
										<option value="2021661700016">2021661700016 - administración de los recursos de aseguramiento y prestación integral de servicios de salud en el municipio de    dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2021661700017")
										<option value="2021661700017" selected>2021661700017 - administración de la ejecución, vigilancia y control de la salud pública en  dos quebradas</option>
									@else
										<option value="2021661700017">2021661700017 - administración de la ejecución, vigilancia y control de la salud pública en  dos quebradas</option>
									@endif

									@if ($planaccion->n2022_codigo_bpim == "2021661700018")
										<option value="2021661700018" selected>2021661700018 - generación del desarrollo ordenado, planificado y dinámico del territorio del municipio  dos quebradas</option>
									@else
										<option value="2021661700018">2021661700018 - generación del desarrollo ordenado, planificado y dinámico del territorio del municipio  dos quebradas</option>
									@endif
								</select> 
							</div>
						</div>

						<div class="form-group">
							<label for="n2022_producto_actividad_proyectos" class="negrita">Actividad del proyecto</label> 
							<div>
								<input value="{{ $planaccion->n2022_producto_actividad_proyectos }}" class="form-control" placeholder="Producto o actividad..." required="required" name="n2022_producto_actividad_proyectos" type="text" id="n2022_producto_actividad_proyectos"> 
							</div>
						</div>
						
						<hr>

						<div class="form-group col-md-3">
							<label for="n2022_ccpet" class="negrita">1. Código CCPET</label> 
							<div>
								<select class="form-control" name="n2022_ccpet" >
									@foreach($ConvCcpetCodigo as $item)
										@if ($item->codigo == $planaccion->n2022_ccpet)	
											<option value="{{$item->codigo}}" selected="selected">{{$item->codigo}}</option>
										@else
											<option value="{{$item->codigo}}">{{$item->codigo}}</option>
										@endif
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-3">
							<label for="n2022_ccpet2" class="negrita">2. Código CCPET</label> 
							<div>
								<select class="form-control" name="n2022_ccpet2" >
									@foreach($ConvCcpetCodigo as $item)
										@if ($item->codigo == $planaccion->n2022_ccpet2)	
											<option value="{{$item->codigo}}" selected="selected">{{$item->codigo}}</option>
										@else
											<option value="{{$item->codigo}}">{{$item->codigo}}</option>
										@endif
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-3">
							<label for="n2022_ccpet3" class="negrita">3. Código CCPET</label> 
							<div>
								<select class="form-control" name="n2022_ccpet3" >
									@foreach($ConvCcpetCodigo as $item)
										@if ($item->codigo == $planaccion->n2022_ccpet3)	
											<option value="{{$item->codigo}}" selected="selected">{{$item->codigo}}</option>
										@else
											<option value="{{$item->codigo}}">{{$item->codigo}}</option>
										@endif
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-3">
							<label for="n2022_ccpet4" class="negrita">4. Código CCPET</label> 
							<div>
								<select class="form-control" name="n2022_ccpet4" >
									@foreach($ConvCcpetCodigo as $item)
										@if ($item->codigo == $planaccion->n2022_ccpet4)	
											<option value="{{$item->codigo}}" selected="selected">{{$item->codigo}}</option>
										@else
											<option value="{{$item->codigo}}">{{$item->codigo}}</option>
										@endif
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-3">
							<label for="n2022_cpc" class="negrita">1. Código CPC (Dane)</label> 
							<div>
								<select class="form-control" name="n2022_cpc" >
									@foreach($ConvCpcCodigo as $item)
										@if ($item->codigo == $planaccion->n2022_cpc)	
											<option value="{{$item->codigo}}" selected="selected">{{$item->codigo}}</option>
										@else
											<option value="{{$item->codigo}}">{{$item->codigo}}</option>
										@endif
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-3">
							<label for="n2022_cpc2" class="negrita">2. Código CPC (Dane)</label> 
							<div>
								<select class="form-control" name="n2022_cpc2" >
									@foreach($ConvCpcCodigo as $item)
										@if ($item->codigo == $planaccion->n2022_cpc2)	
											<option value="{{$item->codigo}}" selected="selected">{{$item->codigo}}</option>
										@else
											<option value="{{$item->codigo}}">{{$item->codigo}}</option>
										@endif
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-3">
							<label for="n2022_cpc3" class="negrita">3. Código CPC (Dane)</label> 
							<div>
								<select class="form-control" name="n2022_cpc3" >
									@foreach($ConvCpcCodigo as $item)
										@if ($item->codigo == $planaccion->n2022_cpc3)	
											<option value="{{$item->codigo}}" selected="selected">{{$item->codigo}}</option>
										@else
											<option value="{{$item->codigo}}">{{$item->codigo}}</option>
										@endif
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-3">
							<label for="n2022_cpc4" class="negrita">4. Código CPC (Dane)</label> 
							<div>
								<select class="form-control" name="n2022_cpc4" >
									@foreach($ConvCpcCodigo as $item)
										@if ($item->codigo == $planaccion->n2022_cpc4)	
											<option value="{{$item->codigo}}" selected="selected">{{$item->codigo}}</option>
										@else
											<option value="{{$item->codigo}}">{{$item->codigo}}</option>
										@endif
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-12"><hr><b><h3>Catálogo MGA</h3></b></div>

						<div class="form-group">
							<label for="n2022_sector" class="negrita">Sector</label> 
							<div>
								<select class="form-control" name="n2022_sector">
									@if ($planaccion->n2022_sector == "no")
										<option value="no" selected>No aplica</option>
									@else
										<option value="no">No aplica</option>
									@endif

									@if ($planaccion->n2022_sector == "04-INFORMACIÓN ESTADÍSTICA")
										<option value="04-INFORMACIÓN ESTADÍSTICA" selected>04-INFORMACIÓN ESTADÍSTICA</option>
									@else
										<option value="04-INFORMACIÓN ESTADÍSTICA">04-INFORMACIÓN ESTADÍSTICA</option>
									@endif

									@if ($planaccion->n2022_sector == "12-JUSTICIA Y DEL DERECHO")
										<option value="12-JUSTICIA Y DEL DERECHO" selected>12-JUSTICIA Y DEL DERECHO</option>
									@else
										<option value="12-JUSTICIA Y DEL DERECHO">12-JUSTICIA Y DEL DERECHO</option>
									@endif

									@if ($planaccion->n2022_sector == "17-AGRICULTURA Y DESARROLLO RURAL")
										<option value="17-AGRICULTURA Y DESARROLLO RURAL" selected>17-AGRICULTURA Y DESARROLLO RURAL</option>
									@else
										<option value="17-AGRICULTURA Y DESARROLLO RURAL">17-AGRICULTURA Y DESARROLLO RURAL</option>
									@endif

									@if ($planaccion->n2022_sector == "19-SALUD Y PROTECCIÓN SOCIAL")
										<option value="19-SALUD Y PROTECCIÓN SOCIAL" selected>19-SALUD Y PROTECCIÓN SOCIAL</option>
									@else
										<option value="19-SALUD Y PROTECCIÓN SOCIAL">19-SALUD Y PROTECCIÓN SOCIAL</option>
									@endif

									@if ($planaccion->n2022_sector == "21-MINAS Y ENERGÍA")
										<option value="21-MINAS Y ENERGÍA" selected>21-MINAS Y ENERGÍA</option>
									@else
										<option value="21-MINAS Y ENERGÍA">21-MINAS Y ENERGÍA</option>
									@endif

									@if ($planaccion->n2022_sector == "22-EDUCACIÓN")
										<option value="22-EDUCACIÓN" selected>22-EDUCACIÓN</option>
									@else
										<option value="22-EDUCACIÓN">22-EDUCACIÓN</option>
									@endif

									@if ($planaccion->n2022_sector == "23-TECNOLOGÍAS DE LA INFORMACIÓN Y LAS COMUNICACIONES")
										<option value="23-TECNOLOGÍAS DE LA INFORMACIÓN Y LAS COMUNICACIONES" selected>23-TECNOLOGÍAS DE LA INFORMACIÓN Y LAS COMUNICACIONES</option>
									@else
										<option value="23-TECNOLOGÍAS DE LA INFORMACIÓN Y LAS COMUNICACIONES">23-TECNOLOGÍAS DE LA INFORMACIÓN Y LAS COMUNICACIONES</option>
									@endif

									@if ($planaccion->n2022_sector == "24-TRANSPORTE")
										<option value="24-TRANSPORTE" selected>24-TRANSPORTE</option>
									@else
										<option value="24-TRANSPORTE">24-TRANSPORTE</option>
									@endif

									@if ($planaccion->n2022_sector == "25-ORGANISMOS DE CONTROL")
										<option value="25-ORGANISMOS DE CONTROL" selected>25-ORGANISMOS DE CONTROL</option>
									@else
										<option value="25-ORGANISMOS DE CONTROL">25-ORGANISMOS DE CONTROL</option>
									@endif

									@if ($planaccion->n2022_sector == "32-AMBIENTE Y DESARROLLO SOSTENIBLE")
										<option value="32-AMBIENTE Y DESARROLLO SOSTENIBLE" selected>32-AMBIENTE Y DESARROLLO SOSTENIBLE</option>
									@else
										<option value="32-AMBIENTE Y DESARROLLO SOSTENIBLE">32-AMBIENTE Y DESARROLLO SOSTENIBLE</option>
									@endif

									@if ($planaccion->n2022_sector == "33-CULTURA")
										<option value="33-CULTURA" selected>33-CULTURA</option>
									@else
										<option value="33-CULTURA">33-CULTURA</option>
									@endif

									@if ($planaccion->n2022_sector == "35-COMERCIO, INDUSTRIA Y TURISMO")
										<option value="35-COMERCIO, INDUSTRIA Y TURISMO" selected>35-COMERCIO, INDUSTRIA Y TURISMO</option>
									@else
										<option value="35-COMERCIO, INDUSTRIA Y TURISMO">35-COMERCIO, INDUSTRIA Y TURISMO</option>
									@endif

									@if ($planaccion->n2022_sector == "36-TRABAJO")
										<option value="36-TRABAJO" selected>36-TRABAJO</option>
									@else
										<option value="36-TRABAJO">36-TRABAJO</option>
									@endif

									@if ($planaccion->n2022_sector == "39-CIENCIA, TECNOLOGÍA E INNOVACIÓN")
										<option value="39-CIENCIA, TECNOLOGÍA E INNOVACIÓN" selected>39-CIENCIA, TECNOLOGÍA E INNOVACIÓN</option>
									@else
										<option value="39-CIENCIA, TECNOLOGÍA E INNOVACIÓN">39-CIENCIA, TECNOLOGÍA E INNOVACIÓN</option>
									@endif

									@if ($planaccion->n2022_sector == "40-VIVIENDA, CIUDAD Y TERRITORIO")
										<option value="40-VIVIENDA, CIUDAD Y TERRITORIO" selected>40-VIVIENDA, CIUDAD Y TERRITORIO</option>
									@else
										<option value="40-VIVIENDA, CIUDAD Y TERRITORIO">40-VIVIENDA, CIUDAD Y TERRITORIO</option>
									@endif

									@if ($planaccion->n2022_sector == "41-INCLUSIÓN SOCIAL Y RECONCILIACIÓN")
										<option value="41-INCLUSIÓN SOCIAL Y RECONCILIACIÓN" selected>41-INCLUSIÓN SOCIAL Y RECONCILIACIÓN</option>
									@else
										<option value="41-INCLUSIÓN SOCIAL Y RECONCILIACIÓN">41-INCLUSIÓN SOCIAL Y RECONCILIACIÓN</option>
									@endif

									@if ($planaccion->n2022_sector == "43-DEPORTE Y RECREACIÓN")
										<option value="43-DEPORTE Y RECREACIÓN" selected>43-DEPORTE Y RECREACIÓN</option>
									@else
										<option value="43-DEPORTE Y RECREACIÓN">43-DEPORTE Y RECREACIÓN</option>
									@endif

									@if ($planaccion->n2022_sector == "45-GOBIERNO TERRITORIAL")
										<option value="45-GOBIERNO TERRITORIAL" selected>45-GOBIERNO TERRITORIAL</option>
									@else
										<option value="45-GOBIERNO TERRITORIAL">45-GOBIERNO TERRITORIAL</option>
									@endif
								</select> 
							</div>
						</div>

						<div class="form-group">
							<label for="n2022_proyecto_producto" class="negrita">Código del Producto</label> 
							<div>
								<select class="form-control" name="n2022_proyecto_producto" >
									<!-- No almacena el Id, almacena el concatenado del campo "codigo" "-" "nombre" -->
									@foreach($ConvProyectoProductoCodigo as $item)
										@if (($item->codigo."-".$item->nombre) == $planaccion->n2022_proyecto_producto)
											<option value="{{$item->codigo}}-{{$item->nombre}}" selected="selected">{{$item->codigo}} - {{$item->nombre}}</option>
										@else
											<option value="{{$item->codigo}}-{{$item->nombre}}">{{$item->codigo}} - {{$item->nombre}}</option>
										@endif
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group">
							<label for="n2022_proyecto_indicador" class="negrita">Código del Indicador</label> 
							<div>
								<select class="form-control" name="n2022_proyecto_indicador" >
									<!-- No almacena el Id, almacena el concatenado del campo "codigo" "-" "nombre" -->
									@foreach($ConvProyectoIndicadorCodigo as $item)
										@if (($item->codigo."-".$item->nombre) == $planaccion->n2022_proyecto_indicador)	
											<option value="{{$item->codigo}}-{{$item->nombre}}" selected="selected">{{$item->codigo}} - {{$item->nombre}}</option>
										@else
											<option value="{{$item->codigo}}-{{$item->nombre}}">{{$item->codigo}} - {{$item->nombre}}</option>
										@endif
									@endforeach
								</select> 
							</div>
						</div>

						<hr>
	
	
					@if((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('editor')))
						<button type="submit" class="btn btn-info">Guardar cambios</button>
					@endif

					<a href="{{ URL::previous() }}" class="btn btn-warning">Cancelar</a>
	
					<br>
					<br>
	
				</div>
			</section>
		</div>
	</div>

<!-- NO Existe un registro por lo tanto esta en modo CREATE -->
@else 

	<div class="row">
		<div class="col-md-12">
			<section class="panel"> 
				<div class="panel-body">
	

						<div class="form-group">
							<label for="descripcion" class="negrita">Descripción</label> 
							<div>
								<input class="form-control" placeholder="Breve desripcion de la accion..." required="required" name="descripcion" type="text" id="descripcion"> 
							</div>
						</div>

						<div class="form-group">
							<label for="kpi" class="negrita">KPI (Indicador clave de rendimiento)</label> 
							<div>
								<input class="form-control" placeholder="Unidad de medida de rendimiento (Vacunas, proyectos, reuniones, kilometros pavimentados, etc)..." required="required" name="kpi" type="text" id="kpi"> 
							</div>
						</div>

						<div class="form-group">
							<label for="objetivo" class="negrita">Valor objetivo KPI</label> 
							<div>
								<input class="form-control" placeholder="Valor a realizar respecto al KPI..." required="required" name="objetivo" type="number" min="1" id="objetivo"> 
							</div>
						</div>

						<div class="form-group">
							<label for="ponderacion" class="negrita">Peso ponderado entre el 1 y el 100 %</label> 
							<div>
								<input class="form-control" placeholder="Indique el peso porcentual asignado a esta accion..." required="required" name="ponderacion" type="number" min="0" max="100" id="ponderacion"> 
							</div>
						</div>

						<hr>

						<div class="form-group" style="background-color: #C9F7C1;">
							<label for="n2022_converge_politica_publica" class="negrita">Alineación | Politica pública</label> 
							<div>
								<select class="form-control" name="n2022_converge_politica_publica">
									<option value="no" selected>No aplica</option>
									<option value="1-Equidad de genero">Politica pública municipal de Equidad de Genero</option>
									<option value="2-Discapacidad">Politica pública municipal de Discapacidad</option>
									<option value="3-Juventudes">Politica pública municipal de Juventudes</option>
									<option value="4-Migrados">Politica pública municipal de Migrados</option>
									<option value="5-Adulto Mayor">Politica pública municipal del Adulto Mayor</option>
									<option value="6-Primera Infancia, Infancia y Adolescencia">Politica pública municipal de Primera Infancia, Infancia y Adolescencia</option>
									<option value="7-Victimas del conflicto armado">Política pública municipal Victimas del Conflicto Armado</option>
									<option value="8-Presupuesto participativo">Política pública municipal de Presupuesto Participativo</option>
									<option value="9-Seguridad y Convivencia Ciudadana">Política pública municipal de Seguridad y Convivencia Ciudadana</option>

								</select> 
							</div>
						</div>

						<div class="form-group" style="background-color: #C9F7C1;">
							<label for="n2022_converge_pgirs" class="negrita">Alineación | PGIRS</label> 
							<div>
								<select class="form-control" name="n2022_converge_pgirs">
									<option value="no" selected>No aplica</option>
									<option value="1-Aspecto Institucional del servicio público de aseo">Aspecto Institucional del servicio público de aseo</option>
									<option value="2-Recolección, transporte y transferencia">Recolección, transporte y transferencia</option>
									<option value="3-Barrido y limpieza de vias y areas públicas">Barrido y limpieza de vias y areas públicas</option>
									<option value="4-Limpieza de playas costeras y ribereñas">Limpieza de playas costeras y ribereñas</option>
									<option value="5-Corte de cesped y poda de árboles">Corte de cesped y poda de árboles</option>
									<option value="6-Lavado de areas públicas">Lavado de areas públicas</option>
									<option value="7-Aprovechamiento">Aprovechamiento</option>
									<option value="8-Inclusion de recicladores">Inclusion de recicladores</option>
									<option value="9-Disposicion final">Disposicion final</option>
									<option value="10-Gestión integral de residuos especiales">Gestión integral de residuos especiales</option>
									<option value="11-Residuos de construcción y demolición">Residuos de construcción y demolición</option>
									<option value="12-Gestión integral de residuos sólidos en el area rural">Gestión integral de residuos sólidos en el area rural</option>
									<option value="13-Gestión integral del riesgo">Gestión integral del riesgo</option>
								</select> 
							</div>
						</div>

						<div class="form-group" style="background-color: #C9F7C1;">
							<label for="n2022_converge_gestion_riesgo" class="negrita">Alineación | Gestión del riesgo</label> 
							<div>
								<select class="form-control" name="n2022_converge_gestion_riesgo">
									<option value="no" selected>No aplica</option>
									<option value="Programa 1.1">Programa 1.1. Conocimiento y evaluación de los riesgos de origen natural, socio-natural, tecnológico y humano no intencional</option>
									<option value="Programa 1.2">Programa 1.2. Adelantar los estudios y construcción de los mapas de amenaza, identificando los peligros de origen natural, socio natural, tecnológico y humano no intencional, así como estudios sobre exposición y vulnerabilidad</option>
									<option value="Programa 1.3">Programa 1.3. Implementar y fortalecer los servicios de vigilancia y alerta temprana que permitan monitorear el comportamiento de los factores generadores de riesgo en el territorio municipal</option>
									<option value="Programa 2.1">Programa 2.1. Incorporación de la gestión del riesgo y medidas de adaptación al cambio climático en el POT y planes de desarrollo municipal y sectoriales</option>
									<option value="Programa 2.2">Programa 2.2. Reducción y mitigación del riesgo sectorial y territorial</option>
									<option value="Programa 3.1">Programa 3.1. Formulación, actualización, preparación y seguimiento de la estrategia municipal para la respuesta a emergencias (EMRE)</option>
									<option value="Programa 3.2">Programa 3.2. Preparación para la recuperación y rehabilitación de zonas afectadas por desastres</option>
									<option value="Programa 3.3">Programa 3.3. Fortalecimiento de los organismos de socorro y del consejo municipal para la gestión del riesgo de desastres</option>
								</select> 
							</div>
						</div>

						<div class="form-group" style="background-color: #C9F7C1;">
							<label for="n2022_converge_mipg" class="negrita">Alineación | MIPG</label> 
							<div>
								<select class="form-control" name="n2022_converge_mipg">
									<option value="no" selected>No aplica</option>
									<option value="0-Más de una opción">Más de una opción o todas</option>
									<option value="1-Política de Gestión Estratégica del Talento Humano GETH">Política de Gestión Estratégica del Talento Humano GETH</option>
									<option value="2-Política de Integridad">Política de Integridad</option>
									<option value="3-Política de Planeación Institucional">Política de Planeación Institucional</option>
									<option value="4-Política de Gestion Presupuestal y Eficiencia del Gasto Público">Política de Gestion Presupuestal y Eficiencia del Gasto Público</option>
									<option value="5-Política Gobierno Digital">Política Gobierno Digital</option>
									<option value="6-Política Seguridad Digital">Política Seguridad Digital</option>
									<option value="7-Política de Defensa Juridica">Política de Defensa Juridica</option>
									<option value="8-Política de Servicio al ciudadano">Política de Servicio al ciudadano</option>
									<option value="9-Política de Racionalizacion de Tramites">Política de Racionalizacion de Tramites</option>
									<option value="10-Política de Participacion Ciudadana en la Gestion Publica">Política de Participacion Ciudadana en la Gestion Publica</option>
									<option value="11-Política de fortalecimiento organizacional y simplicación de procesos">Política de fortalecimiento organizacional y simplicación de procesos</option>
									<option value="12-Política de Seguimiento y Evaluación del Desempeño Institucional">Política de Seguimiento y Evaluación del Desempeño Institucional</option>
									<option value="13-Política de Gestión Documental">Política de Gestión Documental</option>
									<option value="14-Política de Transparencia, acceso a la información pública y lucha contra la corrupción">Política de Transparencia, acceso a la información pública y lucha contra la corrupción</option>
									<option value="15-Política de Gestión del Conocimiento y la Innovación">Política de Gestión del Conocimiento y la Innovación</option>
									<option value="16-Política de Control Interno">Política de Control Interno</option>
									<option value="17-Política de información estadística">Política de información estadística</option>
									<option value="18-Política de mejora normativa">Política de mejora normativa</option>
								</select> 
							</div>
						</div>

						<div class="form-group" style="background-color: #C9F7C1;">
							<label for="n2022_ods" class="negrita">Alineación | ODS objetivos del desarrollo sostenible</label> 
							<div>
								<select class="form-control" name="n2022_ods">
									<option value="no" selected>No aplica</option>
									<option value="1-ODS">Objetivo 1: Poner fin a la pobreza en todas sus formas en todo el mundo</option>
									<option value="2-ODS">Objetivo 2: Poner fin al hambre, lograr la seguridad alimentaria y la mejora de la nutrición y promover la agricultura sostenible</option>
									<option value="3-ODS">Objetivo 3: Garantizar una vida sana y promover el bienestar para todos en todas las edades</option>
									<option value="4-ODS">Objetivo 4: Garantizar una educación inclusiva, equitativa y de calidad y promover oportunidades de aprendizaje durante toda la vida para todo</option>
									<option value="5-ODS">Objetivo 5: Lograr la igualdad entre los géneros y empoderar a todas las mujeres y las niñas</option>
									<option value="6-ODS">Objetivo 6: Garantizar la disponibilidad de agua y su gestión sostenible y el saneamiento para todos</option>
									<option value="7-ODS">Objetivo 7: Garantizar el acceso a una energía asequible, segura, sostenible y moderna para todos</option>
									<option value="8-ODS">Objetivo 8: Promover el crecimiento económico sostenido, inclusivo y sostenible, el empleo pleno y productivo y el trabajo decente para todos</option>
									<option value="9-ODS">Objetivo 9: Construir infraestructuras resilientes, promover la industrialización inclusiva y sostenible y fomentar la innovación</option>
									<option value="10-ODS">Objetivo 10: Reducir la desigualdad en y entre los países</option>
									<option value="11-ODS">Objetivo 11: Lograr que las ciudades y los asentamientos humanos sean inclusivos, seguros, resilientes y sostenibles</option>
									<option value="12-ODS">Objetivo 12: Garantizar modalidades de consumo y producción sostenibles</option>
									<option value="13-ODS">Objetivo 13: Adoptar medidas urgentes para combatir el cambio climático y sus efectos</option>
									<option value="14-ODS">Objetivo 14: Conservar y utilizar en forma sostenible los océanos, los mares y los recursos marinos para el desarrollo sostenible</option>
									<option value="15-ODS">Objetivo 15: Proteger, restablecer y promover el uso sostenible de los ecosistemas terrestres, gestionar los bosques de forma sostenible, luchar contra la desertificación, detener e invertir la degradación de las tierras y poner freno a la pérdida de la diversidad biológica</option>
									<option value="16-ODS">Objetivo 16: Promover sociedades pacíficas e inclusivas para el desarrollo sostenible, facilitar el acceso a la justicia para todos y crear instituciones eficaces, responsables e inclusivas a todos los niveles</option>
									<option value="17-ODS">Objetivo 17: Fortalecer los medios de ejecución y revitalizar la Alianza Mundial para el Desarrollo Sostenible</option>
								</select> 
							</div>
						</div>

						<hr>

						<div class="form-group col-md-6">
							<label for="n2022_recursos" class="negrita">1. Recursos asignados para esta acción $</label> 
							<div>
								<input value="0" class="form-control" placeholder="Valor en $ asignado..." required="required" name="n2022_recursos" type="text" min="0" id="number" style="font-size: 20px;"> 
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="n2022_fuente" class="negrita">1. Fuente de los recursos</label> 
							<div>
								<select class="form-control" name="n2022_fuente">
									<option value="0" selected>No aplica</option>
									<option value="1">1 - Recursos por funcionamiento</option>
									<option value="2">2 - Recursos por gestión</option>
									<option value="3">3 - IDM | Propios | Otras fuentes</option>
									<option value="4">4 - Bomberos | Propios | Otras fuentes</option>
									<option value="5">5 - Serviciudad | Propios | Otras fuentes</option>
									<option value="1101">1101 - Recursos propios de libre destinacion</option>
									<option value="1202">1202 - Multas de transito propios destinación especifica</option>
									<option value="1205">1205 - Estampilla pro cultura propios destinación especif...</option>
									<option value="1206">1206 - Rendimientos sobre tasa gasolina- Pago contratos...</option>
									<option value="1214">1214 - Estampilla pro bienestar del adulto mayor propios...</option>
									<option value="1215">1215 - Impuesto de consumo al cigarrillo</option>
									<option value="1216">1216 - Estampilla adulto mayor gobernacion</option>
									<option value="1217">1217 - Contribución parafiscal</option>
									<option value="1218">1218 - Código policía</option>
									<option value="2101">2101 - SGP Educación prestación del servicio</option>
									<option value="2102">2102 - Educación calidad</option>
									<option value="2201">2201 - Fondo de salud</option>
									<option value="2202">2202 - Salud oferta</option>
									<option value="2203">2203 - SGP Salud publica</option>
									<option value="2301">2301 - SGP Agua potable y saneamiento básico</option>
									<option value="2302">2302 - SGP Deporte</option>
									<option value="2303">2303 - SGP Cultura</option>
									<option value="2304">2304 - SGP Alimentación escolar</option>
									<option value="2305">2305 - SGP Propósito general</option>
									<option value="2306">2306 - SGP Primera infancia</option>
									<option value="3101">3101 - Fondo de seguridad</option>
									<option value="3201">3201 - Áreas de cesión</option>
									<option value="3301">3301 - Fondo de solidaridad y redistribución ingreso</option>
									<option value="3401">3401 - Fondo multa incumplimiento a medidas de P. Violenc...</option>
									<option value="4102">4102 - Convenios salud</option>
									<option value="4106">4106 - Presupuesto participativo</option>
									<option value="4107">4107 - Convenios educación por liquidar</option>
									<option value="4121">4121 - Fonpet educación</option>
									<option value="4122">4122 - Fonpet propósito general</option>
									<option value="4123">4123 - Fonpet otros sectores</option>
									<option value="4124">4124 - Convenio Fonade</option>
									<option value="4127">4127 - Residuos solidos</option>
									<option value="4201">4201 - Etesa</option>
									<option value="4303">4303 - Regalías régimen anterior</option>
									<option value="4501">4501 - Empréstito malla vial</option>
									<option value="4506">4506 - Donaciones</option>
									<option value="4508">4508 - Rendimiento propios</option>
									<option value="4601">4601 - Convenio estratificacion</option>
								</select> 
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="n2022_recursos2" class="negrita">2. Recursos asignados para esta acción $</label> 
							<div>
								<input value="0" class="form-control" placeholder="Valor en $ asignado..." required="required" name="n2022_recursos2" type="text" min="0" id="number2" style="font-size: 20px;"> 
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="n2022_fuente2" class="negrita">2. Fuente de los recursos</label> 
							<div>
								<select class="form-control" name="n2022_fuente2">
									<option value="0" selected>No aplica</option>
									<option value="1">1 - Recursos por funcionamiento</option>
									<option value="2">2 - Recursos por gestión</option>
									<option value="3">3 - IDM | Propios | Otras fuentes</option>
									<option value="4">4 - Bomberos | Propios | Otras fuentes</option>
									<option value="5">5 - Serviciudad | Propios | Otras fuentes</option>
									<option value="1101">1101 - Recursos propios de libre destinacion</option>
									<option value="1202">1202 - Multas de transito propios destinación especifica</option>
									<option value="1205">1205 - Estampilla pro cultura propios destinación especif...</option>
									<option value="1206">1206 - Rendimientos sobre tasa gasolina- Pago contratos...</option>
									<option value="1214">1214 - Estampilla pro bienestar del adulto mayor propios...</option>
									<option value="1215">1215 - Impuesto de consumo al cigarrillo</option>
									<option value="1216">1216 - Estampilla adulto mayor gobernacion</option>
									<option value="1217">1217 - Contribución parafiscal</option>
									<option value="1218">1218 - Código policía</option>
									<option value="2101">2101 - SGP Educación prestación del servicio</option>
									<option value="2102">2102 - Educación calidad</option>
									<option value="2201">2201 - Fondo de salud</option>
									<option value="2202">2202 - Salud oferta</option>
									<option value="2203">2203 - SGP Salud publica</option>
									<option value="2301">2301 - SGP Agua potable y saneamiento básico</option>
									<option value="2302">2302 - SGP Deporte</option>
									<option value="2303">2303 - SGP Cultura</option>
									<option value="2304">2304 - SGP Alimentación escolar</option>
									<option value="2305">2305 - SGP Propósito general</option>
									<option value="2306">2306 - SGP Primera infancia</option>
									<option value="3101">3101 - Fondo de seguridad</option>
									<option value="3201">3201 - Áreas de cesión</option>
									<option value="3301">3301 - Fondo de solidaridad y redistribución ingreso</option>
									<option value="3401">3401 - Fondo multa incumplimiento a medidas de P. Violenc...</option>
									<option value="4102">4102 - Convenios salud</option>
									<option value="4106">4106 - Presupuesto participativo</option>
									<option value="4107">4107 - Convenios educación por liquidar</option>
									<option value="4121">4121 - Fonpet educación</option>
									<option value="4122">4122 - Fonpet propósito general</option>
									<option value="4123">4123 - Fonpet otros sectores</option>
									<option value="4124">4124 - Convenio Fonade</option>
									<option value="4127">4127 - Residuos solidos</option>
									<option value="4201">4201 - Etesa</option>
									<option value="4303">4303 - Regalías régimen anterior</option>
									<option value="4501">4501 - Empréstito malla vial</option>
									<option value="4506">4506 - Donaciones</option>
									<option value="4508">4508 - Rendimiento propios</option>
									<option value="4601">4601 - Convenio estratificacion</option>
								</select> 
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="n2022_recursos3" class="negrita">3. Recursos asignados para esta acción $</label> 
							<div>
								<input value="0" class="form-control" placeholder="Valor en $ asignado..." required="required" name="n2022_recursos3" type="text" min="0" id="number3" style="font-size: 20px;"> 
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="n2022_fuente3" class="negrita">3. Fuente de los recursos</label> 
							<div>
								<select class="form-control" name="n2022_fuente3">
									<option value="0" selected>No aplica</option>
									<option value="1">1 - Recursos por funcionamiento</option>
									<option value="2">2 - Recursos por gestión</option>
									<option value="3">3 - IDM | Propios | Otras fuentes</option>
									<option value="4">4 - Bomberos | Propios | Otras fuentes</option>
									<option value="5">5 - Serviciudad | Propios | Otras fuentes</option>
									<option value="1101">1101 - Recursos propios de libre destinacion</option>
									<option value="1202">1202 - Multas de transito propios destinación especifica</option>
									<option value="1205">1205 - Estampilla pro cultura propios destinación especif...</option>
									<option value="1206">1206 - Rendimientos sobre tasa gasolina- Pago contratos...</option>
									<option value="1214">1214 - Estampilla pro bienestar del adulto mayor propios...</option>
									<option value="1215">1215 - Impuesto de consumo al cigarrillo</option>
									<option value="1216">1216 - Estampilla adulto mayor gobernacion</option>
									<option value="1217">1217 - Contribución parafiscal</option>
									<option value="1218">1218 - Código policía</option>
									<option value="2101">2101 - SGP Educación prestación del servicio</option>
									<option value="2102">2102 - Educación calidad</option>
									<option value="2201">2201 - Fondo de salud</option>
									<option value="2202">2202 - Salud oferta</option>
									<option value="2203">2203 - SGP Salud publica</option>
									<option value="2301">2301 - SGP Agua potable y saneamiento básico</option>
									<option value="2302">2302 - SGP Deporte</option>
									<option value="2303">2303 - SGP Cultura</option>
									<option value="2304">2304 - SGP Alimentación escolar</option>
									<option value="2305">2305 - SGP Propósito general</option>
									<option value="2306">2306 - SGP Primera infancia</option>
									<option value="3101">3101 - Fondo de seguridad</option>
									<option value="3201">3201 - Áreas de cesión</option>
									<option value="3301">3301 - Fondo de solidaridad y redistribución ingreso</option>
									<option value="3401">3401 - Fondo multa incumplimiento a medidas de P. Violenc...</option>
									<option value="4102">4102 - Convenios salud</option>
									<option value="4106">4106 - Presupuesto participativo</option>
									<option value="4107">4107 - Convenios educación por liquidar</option>
									<option value="4121">4121 - Fonpet educación</option>
									<option value="4122">4122 - Fonpet propósito general</option>
									<option value="4123">4123 - Fonpet otros sectores</option>
									<option value="4124">4124 - Convenio Fonade</option>
									<option value="4127">4127 - Residuos solidos</option>
									<option value="4201">4201 - Etesa</option>
									<option value="4303">4303 - Regalías régimen anterior</option>
									<option value="4501">4501 - Empréstito malla vial</option>
									<option value="4506">4506 - Donaciones</option>
									<option value="4508">4508 - Rendimiento propios</option>
									<option value="4601">4601 - Convenio estratificacion</option>
								</select> 
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="n2022_recursos4" class="negrita">4. Recursos asignados para esta acción $</label> 
							<div>
								<input value="0" class="form-control" placeholder="Valor en $ asignado..." required="required" name="n2022_recursos4" type="text" min="0" id="number4" style="font-size: 20px;"> 
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="n2022_fuente4" class="negrita">4. Fuente de los recursos</label> 
							<div>
								<select class="form-control" name="n2022_fuente4">
									<option value="0" selected>No aplica</option>
									<option value="1">1 - Recursos por funcionamiento</option>
									<option value="2">2 - Recursos por gestión</option>
									<option value="3">3 - IDM | Propios | Otras fuentes</option>
									<option value="4">4 - Bomberos | Propios | Otras fuentes</option>
									<option value="5">5 - Serviciudad | Propios | Otras fuentes</option>
									<option value="1101">1101 - Recursos propios de libre destinacion</option>
									<option value="1202">1202 - Multas de transito propios destinación especifica</option>
									<option value="1205">1205 - Estampilla pro cultura propios destinación especif...</option>
									<option value="1206">1206 - Rendimientos sobre tasa gasolina- Pago contratos...</option>
									<option value="1214">1214 - Estampilla pro bienestar del adulto mayor propios...</option>
									<option value="1215">1215 - Impuesto de consumo al cigarrillo</option>
									<option value="1216">1216 - Estampilla adulto mayor gobernacion</option>
									<option value="1217">1217 - Contribución parafiscal</option>
									<option value="1218">1218 - Código policía</option>
									<option value="2101">2101 - SGP Educación prestación del servicio</option>
									<option value="2102">2102 - Educación calidad</option>
									<option value="2201">2201 - Fondo de salud</option>
									<option value="2202">2202 - Salud oferta</option>
									<option value="2203">2203 - SGP Salud publica</option>
									<option value="2301">2301 - SGP Agua potable y saneamiento básico</option>
									<option value="2302">2302 - SGP Deporte</option>
									<option value="2303">2303 - SGP Cultura</option>
									<option value="2304">2304 - SGP Alimentación escolar</option>
									<option value="2305">2305 - SGP Propósito general</option>
									<option value="2306">2306 - SGP Primera infancia</option>
									<option value="3101">3101 - Fondo de seguridad</option>
									<option value="3201">3201 - Áreas de cesión</option>
									<option value="3301">3301 - Fondo de solidaridad y redistribución ingreso</option>
									<option value="3401">3401 - Fondo multa incumplimiento a medidas de P. Violenc...</option>
									<option value="4102">4102 - Convenios salud</option>
									<option value="4106">4106 - Presupuesto participativo</option>
									<option value="4107">4107 - Convenios educación por liquidar</option>
									<option value="4121">4121 - Fonpet educación</option>
									<option value="4122">4122 - Fonpet propósito general</option>
									<option value="4123">4123 - Fonpet otros sectores</option>
									<option value="4124">4124 - Convenio Fonade</option>
									<option value="4127">4127 - Residuos solidos</option>
									<option value="4201">4201 - Etesa</option>
									<option value="4303">4303 - Regalías régimen anterior</option>
									<option value="4501">4501 - Empréstito malla vial</option>
									<option value="4506">4506 - Donaciones</option>
									<option value="4508">4508 - Rendimiento propios</option>
									<option value="4601">4601 - Convenio estratificacion</option>
								</select> 
							</div>
						</div>

						<hr>

						<div class="form-group">
							<label for="n2022_codigo_fut" class="negrita">Código FUT</label> 
							<div>
								<select class="form-control" name="n2022_codigo_fut">
									<option value="no" selected>No aplica</option>
									<option value="1-Educación">1 - Educación</option>
									<option value="2-Salud">2 - Salud</option>
									<option value="3-Agua potable y saneamiento básico">3 - Agua potable y saneamiento básico</option>
									<option value="4-Deporte y recreación">4 - Deporte y recreación</option>
									<option value="5-Cultura">5 - Cultura</option>
									<option value="6-Servicios públicos diferentes a acueducto, alcantarillado y aseo">6 - Servicios públicos diferentes a acueducto, alcantarillado y aseo</option>
									<option value="7-Vivienda">7 - Vivienda</option>
									<option value="8-Agropecuario">8 - Agropecuario</option>
									<option value="9-Transporte">9 - Transporte</option>
									<option value="10-Ambiental">10 - Ambiental</option>
									<option value="11-Centros de reclusión">11 - Centros de reclusión</option>
									<option value="12-Prevención y atención de desastres">12 - Prevención y atención de desastres</option>
									<option value="13-Promoción del desarrollo">13 - Promoción del desarrollo</option>
									<option value="14-Atención a grupos vulnerables - Promoción Social">14 - Atención a grupos vulnerables - Promoción Social</option>
									<option value="15-Equipamiento">15 - Equipamiento</option>
									<option value="16-Desarrollo comunitario">16 - Desarrollo comunitario</option>
									<option value="17-Fortalecimiento institucional">17 - Fortalecimiento institucional</option>
									<option value="18-Justicia y seguridad">18 - Justicia y seguridad</option>
								</select> 
							</div>
						</div>

						<hr>

						<div class="form-group col-md-12"><b><h3>Proyecto inscrito en el Banco de Proyectos</h3></b></div>

						<div class="form-group">
							<label for="n2022_codigo_bpim" class="negrita">Código BPIM</label> 
							<div>
								<select class="form-control" name="n2022_codigo_bpim">
									<option value="no" selected>No aplica</option>
									<option value="2020661700002">2020661700002 - fortalecimiento de la seguridad,convivencia y participación ciudadana, en el municipio   dos quebradas</option>
									<option value="2020661700003">2020661700003 - fortalecimiento de la movilidad y seguridad vial en el municipio de   dos quebradas</option>
									<option value="2020661700004">2020661700004 - fortalecimiento de la economía local  como territorio empresarial y competitivo en el municipio de   dos quebradas</option>
									<option value="2020661700005">2020661700005 - construcción adecuación y mejoramiento de la infraestructura física y de transporte del municipio de   dos quebradas</option>
									<option value="2020661700006">2020661700006 - mejoramiento  de la gestión tributaria, financiera y desempeño fiscal de la secretaría de hacienda y finanzas públicas del  municipio de  dos quebradas</option>
									<option value="2020661700007">2020661700007 - asistencia y atención integral a la población vulnerable del municipio de dosquebradas, risaralda  dos quebradas</option>
									<option value="2020661700008">2020661700008 - mejoramiento de la gestión institucional y el desarrollo del talento humano en el municipio de   dos quebradas</option>
									<option value="2020661700010">2020661700010 - fortalecimiento tecnológico de la administración al servicio de la ciudadanía en el municipio de   dos quebradas</option>
									<option value="2020661700013">2020661700013 - implementación de estrategias para el mejoramiento de la productividad y competitividad del sector rural del municipio de  dos quebradas</option>
									<option value="2020661700014">2020661700014 - implementación de acciones para la gestión ambiental sostenible e inclusiva en el municipio de  dos quebradas</option>
									<option value="2020661700019">2020661700019 - fortalecimiento a la gestión jurídica de la defensa judicial y de la gestión de la contratación del municipio de  dos quebradas</option>
									<option value="2020661700020">2020661700020 - fortalecimiento  de las capacidades institucionales de la dirección socioeconómica en la secretaría de planeación del municipio de  dos quebradas</option>
									<option value="2020661700021">2020661700021 - fortalecimiento del sistema de gestión de la alcaldía de  dos quebradas</option>
									<option value="2020661700022">2020661700022 - fortalecimiento proceso de gestion del riesgo  dos quebradas</option>
									<option value="2020661700023">2020661700023 - implementación de los programas de educación física, deporte, recreación y actividad física en el municipio de   dos quebradas</option>
									<option value="2020661700024">2020661700024 - administración de la ejecución, vigilancia y control de la salud pública en  dos quebradas</option>
									<option value="2020661700025">2020661700025 - administración de los recursos del régimen subsidiado de dos quebradas</option>
									<option value="2020661700026">2020661700026 - generación de servicios públicos para la competitividad y el bienestar de todos en el municipio de   dos quebradas</option>
									<option value="2020661700027">2020661700027 - generación del desarrollo ordenado, planificado y dinámico del territorio del municipio de  dos quebradas</option>
									<option value="2020661700028">2020661700028 - mejoramiento  de los procesos educativos en calidad, cobertura, permanencia y eficiencia en el servicio educativo del municipio de dosquebradas  dos quebradas</option>
									<option value="2021661700004">2021661700004 - fortalecimiento del desarrollo artístico y cultural en el municipio de   dos quebradas</option>
									<option value="2021661700013">2021661700013 - apoyo  financiero para la construcción de la planta de tratamiento de aguas residuales para las ciudades de dos quebradas - pereira,   dos quebradas</option>
									<option value="2021661700015">2021661700015 - implementación  de los programas de educación física, deporte, recreación y actividad física en el municipio de   dos quebradas</option>
									<option value="2021661700016">2021661700016 - administración de los recursos de aseguramiento y prestación integral de servicios de salud en el municipio de    dos quebradas</option>
									<option value="2021661700017">2021661700017 - administración de la ejecución, vigilancia y control de la salud pública en  dos quebradas</option>
									<option value="2021661700018">2021661700018 - generación del desarrollo ordenado, planificado y dinámico del territorio del municipio  dos quebradas</option>
								</select> 
							</div>
						</div>

						<div class="form-group">
							<label for="n2022_producto_actividad_proyectos" class="negrita">Actividad del proyecto</label> 
							<div>
								<input class="form-control" placeholder="Producto o actividad..." required="required" name="n2022_producto_actividad_proyectos" type="text" id="n2022_producto_actividad_proyectos"> 
							</div>
						</div>

						<hr>						

						<div class="form-group col-md-3">
							<label for="n2022_ccpet" class="negrita">1. Código CCPET</label> 
							<div>
								<select class="form-control" name="n2022_ccpet">
									@foreach($ConvCcpetCodigo as $item)
										<option value="{{$item->codigo}}">{{$item->codigo}}</option>
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-3">
							<label for="n2022_ccpet2" class="negrita">2. Código CCPET</label> 
							<div>
								<select class="form-control" name="n2022_ccpet2">
									@foreach($ConvCcpetCodigo as $item)
										<option value="{{$item->codigo}}">{{$item->codigo}}</option>
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-3">
							<label for="n2022_ccpet3" class="negrita">3. Código CCPET</label> 
							<div>
								<select class="form-control" name="n2022_ccpet3">
									@foreach($ConvCcpetCodigo as $item)
										<option value="{{$item->codigo}}">{{$item->codigo}}</option>
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-3">
							<label for="n2022_ccpet4" class="negrita">4. Código CCPET</label> 
							<div>
								<select class="form-control" name="n2022_ccpet4">
									@foreach($ConvCcpetCodigo as $item)
										<option value="{{$item->codigo}}">{{$item->codigo}}</option>
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-3">
							<label for="n2022_cpc" class="negrita">1. Código CPC (Dane)</label> 
							<div>
								<select class="form-control" name="n2022_cpc">
									@foreach($ConvCpcCodigo as $item)
										<option value="{{$item->codigo}}">{{$item->codigo}}</option>
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-3">
							<label for="n2022_cpc2" class="negrita">2. Código CPC (Dane)</label> 
							<div>
								<select class="form-control" name="n2022_cpc2">
									@foreach($ConvCpcCodigo as $item)
										<option value="{{$item->codigo}}">{{$item->codigo}}</option>
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-3">
							<label for="n2022_cpc3" class="negrita">3. Código CPC (Dane)</label> 
							<div>
								<select class="form-control" name="n2022_cpc3">
									@foreach($ConvCpcCodigo as $item)
										<option value="{{$item->codigo}}">{{$item->codigo}}</option>
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-3">
							<label for="n2022_cpc4" class="negrita">4. Código CPC (Dane)</label> 
							<div>
								<select class="form-control" name="n2022_cpc4">
									@foreach($ConvCpcCodigo as $item)
										<option value="{{$item->codigo}}">{{$item->codigo}}</option>
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group col-md-12"><hr><b><h3>Catálogo MGA</h3></b></div>

						<div class="form-group">
							<label for="n2022_sector" class="negrita">Sector</label> 
							<div>
								<select class="form-control" name="n2022_sector">
									<option value="no" selected>No aplica</option>
									<option value="04-INFORMACIÓN ESTADÍSTICA">04-INFORMACIÓN ESTADÍSTICA</option>
									<option value="12-JUSTICIA Y DEL DERECHO">12-JUSTICIA Y DEL DERECHO</option>
									<option value="17-AGRICULTURA Y DESARROLLO RURAL">17-AGRICULTURA Y DESARROLLO RURAL</option>
									<option value="19-SALUD Y PROTECCIÓN SOCIAL">19-SALUD Y PROTECCIÓN SOCIAL</option>
									<option value="21-MINAS Y ENERGÍA">21-MINAS Y ENERGÍA</option>
									<option value="22-EDUCACIÓN">22-EDUCACIÓN</option>
									<option value="23-TECNOLOGÍAS DE LA INFORMACIÓN Y LAS COMUNICACIONES">23-TECNOLOGÍAS DE LA INFORMACIÓN Y LAS COMUNICACIONES</option>
									<option value="24-TRANSPORTE">24-TRANSPORTE</option>
									<option value="25-ORGANISMOS DE CONTROL">25-ORGANISMOS DE CONTROL</option>
									<option value="32-AMBIENTE Y DESARROLLO SOSTENIBLE">32-AMBIENTE Y DESARROLLO SOSTENIBLE</option>
									<option value="33-CULTURA">33-CULTURA</option>
									<option value="35-COMERCIO, INDUSTRIA Y TURISMO">35-COMERCIO, INDUSTRIA Y TURISMO</option>
									<option value="36-TRABAJO">36-TRABAJO</option>
									<option value="39-CIENCIA, TECNOLOGÍA E INNOVACIÓN">39-CIENCIA, TECNOLOGÍA E INNOVACIÓN</option>
									<option value="40-VIVIENDA, CIUDAD Y TERRITORIO">40-VIVIENDA, CIUDAD Y TERRITORIO</option>
									<option value="41-INCLUSIÓN SOCIAL Y RECONCILIACIÓN">41-INCLUSIÓN SOCIAL Y RECONCILIACIÓN</option>
									<option value="43-DEPORTE Y RECREACIÓN">43-DEPORTE Y RECREACIÓN</option>
									<option value="45-GOBIERNO TERRITORIAL">45-GOBIERNO TERRITORIAL</option>
								</select> 
							</div>
						</div>

						<div class="form-group">
							<label for="n2022_proyecto_producto" class="negrita">Código de Producto</label> 
							<div>
								<select class="form-control" name="n2022_proyecto_producto">
									<!-- No almacena el Id, almacena el concatenado del campo "codigo" "-" "nombre" -->
									@foreach($ConvProyectoProductoCodigo as $item)
										<option value="{{$item->codigo}}-{{$item->nombre}}">{{$item->codigo}} - {{$item->nombre}}</option>
									@endforeach
								</select> 
							</div>
						</div>

						<div class="form-group">
							<label for="n2022_proyecto_indicador" class="negrita">Código del Indicador</label> 
							<div>
								<select class="form-control" name="n2022_proyecto_indicador">
									<!-- No almacena el Id, almacena el concatenado del campo "codigo" "-" "nombre" -->
									@foreach($ConvProyectoIndicadorCodigo as $item)
										<option value="{{$item->codigo}}-{{$item->nombre}}">{{$item->codigo}} - {{$item->nombre}}</option>
									@endforeach
								</select> 
							</div>
						</div>

						<hr>
	
	
					@if((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('editor')))
						<button type="submit" class="btn btn-info">Inscribir</button>
					@endif

					<a href="{{ URL::previous() }}" class="btn btn-warning">Cancelar</a>
	
					<br>
					<br>
	
				</div>
			</section>
		</div>
	</div>

@endif