<div class="row">
	<div class="col-md-12">
		<section class="panel"> 
			<div class="panel-body">
 

					<div class="form-group">
						<label for="descripcion" class="negrita">Descripcion</label> 
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
						<label for="n2022_converge_politica_publica" class="negrita">Alineacion | Politica publica</label> 
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
						<label for="n2022_converge_pgirs" class="negrita">Alineacion | PGIRS</label> 
						<div>
							<select class="form-control" name="n2022_converge_pgirs">
								<option value="no" selected>No aplica</option>
								<option value="Objetivo PGIRS 1">Objetivo PGIRS 1</option>
								<option value="Objetivo PGIRS 2">Objetivo PGIRS 2</option>
								<option value="Objetivo PGIRS 3">Objetivo PGIRS 3</option>
								<option value="Objetivo PGIRS 4">Objetivo PGIRS 4</option>
								<option value="Objetivo PGIRS 5">Objetivo PGIRS 5</option>
							</select> 
						</div>
					</div>

					<div class="form-group" style="background-color: #C9F7C1;">
						<label for="n2022_converge_gestion_riesgo" class="negrita">Alineacion | Gestion del riesgo</label> 
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
						<label for="n2022_converge_mipg" class="negrita">Alineacion | MIPG</label> 
						<div>
							<select class="form-control" name="n2022_converge_mipg">
								<option value="no" selected>No aplica</option>
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
						<label for="n2022_ods" class="negrita">Alineacion | ODS objetivos del desarrollo sostenible</label> 
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

					<div class="form-group" style="background-color: #C1E2F7;">
						<label for="n2022_recursos" class="negrita">Recursos asignados para esta accion</label> 
						<div>
							<input class="form-control" placeholder="Valor en $ asignado..." required="required" name="n2022_recursos" type="text" min="0" id="number" style="font-size: 20px;"> 
						</div>
					</div>

					<div class="form-group" style="background-color: #C1E2F7;">
						<label for="n2022_fuente" class="negrita">Fuente de los recursos</label> 
						<div>
							<select class="form-control" name="n2022_fuente">
								<option value="0" selected>No aplica</option>
								<option value="1">Recursos por funcionamiento</option>
								<option value="2">Recursos por gestión</option>
								<option value="3">IDM | Propios | Otras fuentes</option>
								<option value="4">Bomberos | Propios | Otras fuentes</option>
								<option value="5">Serviciudad | Propios | Otras fuentes</option>
								<option value="1101">Recursos propios de libre destinacion</option>
								<option value="1202">Multas de transito propios destinación especifica</option>
								<option value="1205">Estampilla pro cultura propios destinación especif...</option>
								<option value="1206">Rendimientos sobre tasa gasolina- Pago contratos...</option>
								<option value="1214">Estampilla pro bienestar del adulto mayor propios...</option>
								<option value="1215">Impuesto de consumo al cigarrillo</option>
								<option value="1216">Estampilla adulto mayor gobernacion</option>
								<option value="1217">Contribución parafiscal</option>
								<option value="1218">Código policía</option>
								<option value="2101">SGP Educación prestación del servicio</option>
								<option value="2102">Educación calidad</option>
								<option value="2201">Fondo de salud</option>
								<option value="2202">Salud oferta</option>
								<option value="2203">SGP Salud publica</option>
								<option value="2301">SGP Agua potable y saneamiento básico</option>
								<option value="2302">SGP Deporte</option>
								<option value="2303">SGP Cultura</option>
								<option value="2304">SGP Alimentación escolar</option>
								<option value="2305">SGP Propósito general</option>
								<option value="2306">SGP Primera infancia</option>
								<option value="3101">Fondo de seguridad</option>
								<option value="3201">Áreas de cesión</option>
								<option value="3301">Fondo de solidaridad y redistribución ingreso</option>
								<option value="3401">Fondo multa incumplimiento a medidas de P. Violenc...</option>
								<option value="4102">Convenios salud</option>
								<option value="4106">Presupuesto participativo</option>
								<option value="4107">Convenios educación por liquidar</option>
								<option value="4121">Fonpet educación</option>
								<option value="4122">Fonpet propósito general</option>
								<option value="4123">Fonpet otros sectores</option>
								<option value="4124">Convenio Fonade</option>
								<option value="4127">Residuos solidos</option>
								<option value="4201">Etesa</option>
								<option value="4303">Regalías régimen anterior</option>
								<option value="4501">Empréstito malla vial</option>
								<option value="4506">Donaciones</option>
								<option value="4508">Rendimiento propios</option>
								<option value="4601">Convenio estratificacion</option>
							</select> 
						</div>
					</div>

					<hr>

					<div class="form-group" style="background-color: #C9F7C1;">
						<label for="n2022_codigo_fut" class="negrita">Codigo FUT</label> 
						<div>
							<select class="form-control" name="n2022_codigo_fut">
								<option value="no" selected>No aplica</option>
								<option value="Codigo FUT 1">Codigo FUT 1</option>
								<option value="Codigo FUT 1">Codigo FUT 2</option>
								<option value="Codigo FUT 1">Codigo FUT 3</option>
								<option value="Codigo FUT 1">Codigo FUT 4</option>
								<option value="Codigo FUT 1">Codigo FUT 5</option>

							</select> 
						</div>
					</div>

					<div class="form-group" style="background-color: #C9F7C1;">
						<label for="n2022_sector" class="negrita">Sector</label> 
						<div>
							<select class="form-control" name="n2022_sector">
								<option value="no" selected>No aplica</option>
								<option value="Sector 1">Sector 1</option>
								<option value="Sector 1">Sector 2</option>
								<option value="Sector 1">Sector 3</option>
								<option value="Sector 1">Sector 4</option>
								<option value="Sector 1">Sector 5</option>
							</select> 
						</div>
					</div>

					<hr>

					<div class="form-group" style="background-color: #C1E2F7;">
						<label for="n2022_codigo_bpim" class="negrita">Codigo BPIM</label> 
						<div>
							<input class="form-control" placeholder="Codigo BPIM del banco de proyectos..." required="required" name="n2022_codigo_bpim" type="number" min="0" id="n2022_codigo_bpim"> 
						</div>
					</div>

					<div class="form-group" style="background-color: #C1E2F7;">
						<label for="n2022_producto_actividad_proyectos" class="negrita">Producto o actividad relacionada del proyecto</label> 
						<div>
							<input class="form-control" placeholder="Producto o actividad0..." required="required" name="n2022_producto_actividad_proyectos" type="text" id="n2022_producto_actividad_proyectos"> 
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