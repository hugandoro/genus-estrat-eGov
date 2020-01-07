<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\RefOdsObjetivo;

class ref_ods_objetivos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 1: Poner fin a la pobreza en todas sus formas en todo el mundo',
            'descripcion'   => 'Para 2030, erradicar la pobreza extrema para todas las personas en el mundo, actualmente medida por un ingreso por persona inferior a 1,25 dólares de los Estados Unidos al día
            
Para 2030, reducir al menos a la mitad la proporción de hombres, mujeres y niños de todas las edades que viven en la pobreza en todas sus dimensiones con arreglo a las definiciones nacionales
            
Poner en práctica a nivel nacional sistemas y medidas apropiadas de protección social para todos, incluidos niveles mínimos, y, para 2030, lograr una amplia cobertura de los pobres y los vulnerables
            
Para 2030, garantizar que todos los hombres y mujeres, en particular los pobres y los vulnerables, tengan los mismos derechos a los recursos económicos, así como acceso a los servicios básicos, la propiedad y el control de las tierras y otros bienes, la herencia, los recursos naturales, las nuevas tecnologías apropiadas y los servicios financieros, incluida la microfinanciación
            
Para 2030, fomentar la resiliencia de los pobres y las personas que se encuentran en situaciones vulnerables y reducir su exposición y vulnerabilidad a los fenómenos extremos relacionados con el clima y otras crisis y desastres económicos, sociales y ambientales
            
Garantizar una movilización importante de recursos procedentes de diversas fuentes, incluso mediante la mejora de la cooperación para el desarrollo, a fin de proporcionar medios suficientes y previsibles a los países en desarrollo, en particular los países menos adelantados, para poner en práctica programas y políticas encaminados a poner fin a la pobreza en todas sus dimensiones
            
Crear marcos normativos sólidos en los planos nacional, regional e internacional, sobre la base de estrategias de desarrollo en favor de los pobres que tengan en cuenta las cuestiones de género, a fin de apoyar la inversión acelerada en medidas para erradicar la pobreza',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 2: Poner fin al hambre, lograr la seguridad alimentaria y la mejora de la nutrición y promover la agricultura sostenible',
            'descripcion'   => 'Para 2030, poner fin al hambre y asegurar el acceso de todas las personas, en particular los pobres y las personas en situaciones vulnerables, incluidos los lactantes, a una alimentación sana, nutritiva y suficiente durante todo el año
            
Para 2030, poner fin a todas las formas de malnutrición, incluso logrando, a más tardar en 2025, las metas convenidas internacionalmente sobre el retraso del crecimiento y la emaciación de los niños menores de 5 años, y abordar las necesidades de nutrición de las adolescentes, las mujeres embarazadas y lactantes y las personas de edad
            
Para 2030, duplicar la productividad agrícola y los ingresos de los productores de alimentos en pequeña escala, en particular las mujeres, los pueblos indígenas, los agricultores familiares, los pastores y los pescadores, entre otras cosas mediante un acceso seguro y equitativo a las tierras, a otros recursos de producción e insumos, conocimientos, servicios financieros, mercados y oportunidades para la generación de valor añadido y empleos no agrícolas
            
Para 2030, asegurar la sostenibilidad de los sistemas de producción de alimentos y aplicar prácticas agrícolas resilientes que aumenten la productividad y la producción, contribuyan al mantenimiento de los ecosistemas, fortalezcan la capacidad de adaptación al cambio climático, los fenómenos meteorológicos extremos, las sequías, las inundaciones y otros desastres, y mejoren progresivamente la calidad del suelo y la tierra
            
Para 2020, mantener la diversidad genética de las semillas, las plantas cultivadas y los animales de granja y domesticados y sus especies silvestres conexas, entre otras cosas mediante una buena gestión y diversificación de los bancos de semillas y plantas a nivel nacional, regional e internacional, y promover el acceso a los beneficios que se deriven de la utilización de los recursos genéticos y los conocimientos tradicionales y su distribución justa y equitativa, como se ha convenido internacionalmente
            
Aumentar las inversiones, incluso mediante una mayor cooperación internacional, en la infraestructura rural, la investigación agrícola y los servicios de extensión, el desarrollo tecnológico y los bancos de genes de plantas y ganado a fin de mejorar la capacidad de producción agrícola en los países en desarrollo, en particular en los países menos adelantados
            
Corregir y prevenir las restricciones y distorsiones comerciales en los mercados agropecuarios mundiales, entre otras cosas mediante la eliminación paralela de todas las formas de subvenciones a las exportaciones agrícolas y todas las medidas de exportación con efectos equivalentes, de conformidad con el mandato de la Ronda de Doha para el Desarrollo
            
Adoptar medidas para asegurar el buen funcionamiento de los mercados de productos básicos alimentarios y sus derivados y facilitar el acceso oportuno a información sobre los mercados, en particular sobre las reservas de alimentos, a fin de ayudar a limitar la extrema volatilidad de los precios de los alimentos',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 3: Garantizar una vida sana y promover el bienestar para todos en todas las edades',
            'descripcion'   => 'Para 2030, reducir la tasa mundial de mortalidad materna a menos de 70 por cada 100.000 nacidos vivos
            
Para 2030, poner fin a las muertes evitables de recién nacidos y de niños menores de 5 años, logrando que todos los países intenten reducir la mortalidad neonatal al menos hasta 12 por cada 1.000 nacidos vivos, y la mortalidad de niños menores de 5 años al menos hasta 25 por cada 1.000 nacidos vivos
            
Para 2030, poner fin a las epidemias del SIDA, la tuberculosis, la malaria y las enfermedades tropicales desatendidas y combatir la hepatitis, las enfermedades transmitidas por el agua y otras enfermedades transmisibles
            
Para 2030, reducir en un tercio la mortalidad prematura por enfermedades no transmisibles mediante la prevención y el tratamiento y promover la salud mental y el bienestar
            
Fortalecer la prevención y el tratamiento del abuso de sustancias adictivas, incluido el uso indebido de estupefacientes y el consumo nocivo de alcohol
            
Para 2020, reducir a la mitad el número de muertes y lesiones causadas por accidentes de tráfico en el mundo
            
Para 2030, garantizar el acceso universal a los servicios de salud sexual y reproductiva, incluidos los de planificación de la familia, información y educación, y la integración de la salud reproductiva en las estrategias y los programas nacionales
            
Lograr la cobertura sanitaria universal, en particular la protección contra los riesgos financieros, el acceso a servicios de salud esenciales de calidad y el acceso a medicamentos y vacunas seguros, eficaces, asequibles y de calidad para todos
            
Para 2030, reducir sustancialmente el número de muertes y enfermedades producidas por productos químicos peligrosos y la contaminación del aire, el agua y el suelo
            
Fortalecer la aplicación del Convenio Marco de la Organización Mundial de la Salud para el Control del Tabaco en todos los países, según proceda
            
Apoyar las actividades de investigación y desarrollo de vacunas y medicamentos para las enfermedades transmisibles y no transmisibles que afectan primordialmente a los países en desarrollo y facilitar el acceso a medicamentos y vacunas esenciales asequibles de conformidad con la Declaración de Doha relativa al Acuerdo sobre los ADPIC y la Salud Pública, en la que se afirma el derecho de los países en desarrollo a utilizar al máximo las disposiciones del Acuerdo sobre los Aspectos de los Derechos de Propiedad Intelectual Relacionados con el Comercio en lo relativo a la flexibilidad para proteger la salud pública y, en particular, proporcionar acceso a los medicamentos para todos
            
Aumentar sustancialmente la financiación de la salud y la contratación, el desarrollo, la capacitación y la retención del personal sanitario en los países en desarrollo, especialmente en los países menos adelantados y los pequeños Estados insulares en desarrollo
            
Reforzar la capacidad de todos los países, en particular los países en desarrollo, en materia de alerta temprana, reducción de riesgos y gestión de los riesgos para la salud nacional y mundial',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 4: Garantizar una educación inclusiva, equitativa y de calidad y promover oportunidades de aprendizaje durante toda la vida para todos',
            'descripcion'   => 'Para 2030, velar por que todas las niñas y todos los niños terminen los ciclos de la enseñanza primaria y secundaria, que ha de ser gratuita, equitativa y de calidad y producir resultados escolares pertinentes y eficaces
            
Para 2030, velar por que todas las niñas y todos los niños tengan acceso a servicios de atención y desarrollo en la primera infancia y a una enseñanza preescolar de calidad, a fin de que estén preparados para la enseñanza primaria
            
Para 2030, asegurar el acceso en condiciones de igualdad para todos los hombres y las mujeres a una formación técnica, profesional y superior de calidad, incluida la enseñanza universitaria
            
Para 2030, aumentar sustancialmente el número de jóvenes y adultos que tienen las competencias necesarias, en particular técnicas y profesionales, para acceder al empleo, el trabajo decente y el emprendimiento
            
Para 2030, eliminar las disparidades de género en la educación y garantizar el acceso en condiciones de igualdad de las personas vulnerables, incluidas las personas con discapacidad, los pueblos indígenas y los niños en situaciones de vulnerabilidad, a todos los niveles de la enseñanza y la formación profesional
            
Para 2030, garantizar que todos los jóvenes y al menos una proporción sustancial de los adultos, tanto hombres como mujeres, tengan competencias de lectura, escritura y aritmética
            
Para 2030, garantizar que todos los alumnos adquieran los conocimientos teóricos y prácticos necesarios para promover el desarrollo sostenible, entre otras cosas mediante la educación para el desarrollo sostenible y la adopción de estilos de vida sostenibles, los derechos humanos, la igualdad entre los géneros, la promoción de una cultura de paz y no violencia, la ciudadanía mundial y la valoración de la diversidad cultural y de la contribución de la cultura al desarrollo sostenible, entre otros medios
            
Construir y adecuar instalaciones escolares que respondan a las necesidades de los niños y las personas discapacitadas y tengan en cuenta las cuestiones de género, y que ofrezcan entornos de aprendizaje seguros, no violentos, inclusivos y eficaces para todos
            
Para 2020, aumentar sustancialmente a nivel mundial el número de becas disponibles para los países en desarrollo, en particular los países menos adelantados, los pequeños Estados insulares en desarrollo y los países de África, para que sus estudiantes puedan matricularse en programas de estudios superiores, incluidos programas de formación profesional y programas técnicos, científicos, de ingeniería y de tecnología de la información y las comunicaciones, en países desarrollados y otros países en desarrollo
            
Para 2030, aumentar sustancialmente la oferta de maestros calificados, entre otras cosas mediante la cooperación internacional para la formación de docentes en los países en desarrollo, especialmente los países menos adelantados y los pequeños Estados insulares en desarrollo',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 5: Lograr la igualdad entre los géneros y empoderar a todas las mujeres y las niñas',
            'descripcion'   => 'Poner fin a todas las formas de discriminación contra todas las mujeres y las niñas en todo el mundo
            
Eliminar todas las formas de violencia contra todas las mujeres y las niñas en los ámbitos público y privado, incluidas la trata y la explotación sexual y otros tipos de explotación

Eliminar todas las prácticas nocivas, como el matrimonio infantil, precoz y forzado y la mutilación genital femenina

Reconocer y valorar los cuidados no remunerados y el trabajo doméstico no remunerado mediante la prestación de servicios públicos, la provisión de infraestructuras y la formulación de políticas de protección social, así como mediante la promoción de la responsabilidad compartida en el hogar y la familia, según proceda en cada país

Velar por la participación plena y efectiva de las mujeres y la igualdad de oportunidades de liderazgo a todos los niveles de la adopción de decisiones en la vida política, económica y pública

Garantizar el acceso universal a la salud sexual y reproductiva y los derechos reproductivos, de conformidad con el Programa de Acción de la Conferencia Internacional sobre la Población y el Desarrollo, la Plataforma de Acción de Beijing y los documentos finales de sus conferencias de examen

Emprender reformas que otorguen a las mujeres el derecho a los recursos económicos en condiciones de igualdad , así como el acceso a la propiedad y al control de las tierras y otros bienes, los servicios financieros, la herencia y los recursos naturales, de conformidad con las leyes nacionales

Mejorar el uso de la tecnología instrumental, en particular la tecnología de la información y las comunicaciones, para promover el empoderamiento de la mujer

Aprobar y fortalecer políticas acertadas y leyes aplicables para promover la igualdad entre los géneros y el empoderamiento de las mujeres y las niñas a todos los niveles',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 6: Garantizar la disponibilidad de agua y su gestión sostenible y el saneamiento para todos',
            'descripcion'   => 'De aquí a 2030, lograr el acceso universal y equitativo al agua potable a un precio asequible para todos.
            
De aquí a 2030, lograr el acceso a servicios de saneamiento e higiene adecuados y equitativos para todos y poner fin a la defecación al aire libre, prestando especial atención a las necesidades de las mujeres y las niñas y las personas en situaciones de vulnerabilidad.

De aquí a 2030, mejorar la calidad del agua reduciendo la contaminación, eliminando el vertimiento y minimizando la emisión de productos químicos y materiales peligrosos, reduciendo a la mitad el porcentaje de aguas residuales sin tratar y aumentando considerablemente el reciclado y la reutilización sin riesgos a nivel mundial.

De aquí a 2030, aumentar considerablemente el uso eficiente de los recursos hídricos en todos los sectores y asegurar la sostenibilidad de la extracción y el abastecimiento de agua dulce para hacer frente a la escasez de agua y reducir considerablemente el número de personas que sufren falta de agua.

De aquí a 2030, implementar la gestión integrada de los recursos hídricos a todos los niveles, incluso mediante la cooperación transfronteriza, según proceda.

De aquí a 2020, proteger y restablecer los ecosistemas relacionados con el agua, incluidos los bosques, las montañas, los humedales, los ríos, los acuíferos y los lagos
6.a  De aquí a 2030, ampliar la cooperación internacional y el apoyo prestado a los países en desarrollo para la creación de capacidad en actividades y programas relativos al agua y el saneamiento, como los de captación de agua, desalinización, uso eficiente de los recursos hídricos, tratamiento de aguas residuales, reciclado y tecnologías de reutilización
6.b  Apoyar y fortalecer la participación de las comunidades locales en la mejora de la gestión del agua y el saneamiento',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 7: Garantizar el acceso a una energía asequible, segura, sostenible y moderna para todos',
            'descripcion'   => 'Para 2030, garantizar el acceso universal a servicios de energía asequibles, confiables y modernos
            
Para 2030, aumentar sustancialmente el porcentaje de la energía renovable en el conjunto de fuentes de energía

Para 2030, duplicar la tasa mundial de mejora de la eficiencia energética

Para 2030, aumentar la cooperación internacional a fin de facilitar el acceso a la investigación y las tecnologías energéticas no contaminantes, incluidas las fuentes de energía renovables, la eficiencia energética y las tecnologías avanzadas y menos contaminantes de combustibles fósiles, y promover la inversión en infraestructuras energéticas y tecnologías de energía no contaminante

Para 2030, ampliar la infraestructura y mejorar la tecnología para prestar servicios de energía modernos y sostenibles para todos en los países en desarrollo, en particular los países menos adelantados, los pequeños Estados insulares en desarrollo y los países en desarrollo sin litoral, en consonancia con sus respectivos programas de apoyo',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 8: Promover el crecimiento económico sostenido, inclusivo y sostenible, el empleo pleno y productivo y el trabajo decente para todos',
            'descripcion'   => 'Mantener el crecimiento económico per capita de conformidad con las circunstancias nacionales y, en particular, un crecimiento del producto interno bruto de al menos un 7% anual en los países menos adelantados
            
Lograr niveles más elevados de productividad económica mediante la diversificación, la modernización tecnológica y la innovación, entre otras cosas centrando la atención en sectores de mayor valor añadido y uso intensivo de mano de obra

Promover políticas orientadas al desarrollo que apoyen las actividades productivas, la creación de empleo decente, el emprendimiento, la creatividad y la innovación, y alentar la oficialización y el crecimiento de las microempresas y las pequeñas y medianas empresas, entre otras cosas mediante el acceso a servicios financieros

Mejorar progresivamente, para 2030, la producción y el consumo eficientes de los recursos mundiales y procurar desvincular el crecimiento económico de la degradación del medio ambiente, de conformidad con el marco decenal de programas sobre modalidades sostenibles de consumo y producción, empezando por los países desarrollados

Para 2030, lograr el empleo pleno y productivo y garantizar un trabajo decente para todos los hombres y mujeres, incluidos los jóvenes y las personas con discapacidad, y la igualdad de remuneración por trabajo de igual valor

Para 2020, reducir sustancialmente la proporción de jóvenes que no están empleados y no cursan estudios ni reciben capacitación

Adoptar medidas inmediatas y eficaces para erradicar el trabajo forzoso, poner fin a las formas modernas de esclavitud y la trata de seres humanos y asegurar la prohibición y eliminación de las peores formas de trabajo infantil, incluidos el reclutamiento y la utilización de niños soldados, y, a más tardar en 2025, poner fin al trabajo infantil en todas sus formas,

Proteger los derechos laborales y promover un entorno de trabajo seguro y protegido para todos los trabajadores, incluidos los trabajadores migrantes, en particular las mujeres migrantes y las personas con empleos precarios

Para 2030, elaborar y poner en práctica políticas encaminadas a promover un turismo sostenible que cree puestos de trabajo y promueva la cultura y los productos locales

Fortalecer la capacidad de las instituciones financieras nacionales para alentar y ampliar el acceso a los servicios bancarios, financieros y de seguros para todos

Aumentar el apoyo a la iniciativa de ayuda para el comercio en los países en desarrollo, en particular los países menos adelantados, incluso en el contexto del Marco Integrado Mejorado de Asistencia Técnica Relacionada con el Comercio para los Países Menos Adelantados

Para 2020, desarrollar y poner en marcha una estrategia mundial para el empleo de los jóvenes y aplicar el Pacto Mundial para el Empleo de la Organización Internacional del Trabajo',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 9: Construir infraestructuras resilientes, promover la industrialización inclusiva y sostenible y fomentar la innovación',
            'descripcion'   => 'Desarrollar infraestructuras fiables, sostenibles, resilientes y de calidad, incluidas infraestructuras regionales y transfronterizas, para apoyar el desarrollo económico y el bienestar humano, con especial hincapié en el acceso equitativo y asequible para todos
            
Promover una industrialización inclusiva y sostenible y, a más tardar en 2030, aumentar de manera significativa la contribución de la industria al empleo y al producto interno bruto, de acuerdo con las circunstancias nacionales, y duplicar esa contribución en los países menos adelantados

Aumentar el acceso de las pequeñas empresas industriales y otras empresas, en particular en los países en desarrollo, a los servicios financieros, incluido el acceso a créditos asequibles, y su integración en las cadenas de valor y los mercados

Para 2030, mejorar la infraestructura y reajustar las industrias para que sean sostenibles, usando los recursos con mayor eficacia y promoviendo la adopción de tecnologías y procesos industriales limpios y ambientalmente racionales, y logrando que todos los países adopten medidas de acuerdo con sus capacidades respectivas

Aumentar la investigación científica y mejorar la capacidad tecnológica de los sectores industriales de todos los países, en particular los países en desarrollo, entre otras cosas fomentando la innovación y aumentando sustancialmente el número de personas que trabajan en el campo de la investigación y el desarrollo por cada millón de personas, así como aumentando los gastos en investigación y desarrollo de los sectores público y privado para 2013

Facilitar el desarrollo de infraestructuras sostenibles y resilientes en los países en desarrollo con un mayor apoyo financiero, tecnológico y técnico a los países de África, los países menos adelantados, los países en desarrollo sin litoral y los pequeños Estados insulares en desarrollo

Apoyar el desarrollo de tecnologías nacionales, la investigación y la innovación en los países en desarrollo, en particular garantizando un entorno normativo propicio a la diversificación industrial y la adición de valor a los productos básicos, entre otras cosas

Aumentar de forma significativa el acceso a la tecnología de la información y las comunicaciones y esforzarse por facilitar el acceso universal y asequible a Internet en los países menos adelantados a más tardar en 2020',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 10: Reducir la desigualdad en y entre los países',
            'descripcion'   => 'Para 2030, lograr progresivamente y mantener el crecimiento de los ingresos del 40% más pobre de la población a una tasa superior a la media nacional

Para 2030, potenciar y promover la inclusión social, económica y política de todas las personas, independientemente de su edad, sexo, discapacidad, raza, etnia, origen, religión o situación económica u otra condición

Garantizar la igualdad de oportunidades y reducir la desigualdad de los resultados, en particular mediante la eliminación de las leyes, políticas y prácticas discriminatorias y la promoción de leyes, políticas y medidas adecuadas a ese respecto

Adoptar políticas, en especial fiscales, salariales y de protección social, y lograr progresivamente una mayor igualdad

Mejorar la reglamentación y vigilancia de las instituciones y los mercados financieros mundiales y fortalecer la aplicación de esa reglamentación

Velar por una mayor representación y voz de los países en desarrollo en la adopción de decisiones en las instituciones económicas y financieras internacionales para que estas sean más eficaces, fiables, responsables y legítimas

Facilitar la migración y la movilidad ordenadas, seguras, regulares y responsables de las personas, entre otras cosas mediante la aplicación de políticas migratorias planificadas y bien gestionadas

Aplicar el principio del trato especial y diferenciado para los países en desarrollo, en particular los países menos adelantados, de conformidad con los acuerdos de la Organización Mundial del Comercio

Alentar la asistencia oficial para el desarrollo y las corrientes financieras, incluida la inversión extranjera directa, para los Estados con mayores necesidades, en particular los países menos adelantados, los países de África, los pequeños Estados insulares en desarrollo y los países en desarrollo sin litoral, en consonancia con sus planes y programas nacionales

Para 2030, reducir a menos del 3% los costos de transacción de las remesas de los migrantes y eliminar los canales de envío de remesas con un costo superior al 5%',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 11: Lograr que las ciudades y los asentamientos humanos sean inclusivos, seguros, resilientes y sostenibles',
            'descripcion'   => 'Para 2030, asegurar el acceso de todas las personas a viviendas y servicios básicos adecuados, seguros y asequibles y mejorar los barrios marginales
            
Para 2030, proporcionar acceso a sistemas de transporte seguros, asequibles, accesibles y sostenibles para todos y mejorar la seguridad vial, en particular mediante la ampliación del transporte público, prestando especial atención a las necesidades de las personas en situación vulnerable, las mujeres, los niños, las personas con discapacidad y las personas de edad

Para 2030, aumentar la urbanización inclusiva y sostenible y la capacidad para una planificación y gestión participativas, integradas y sostenibles de los asentamientos humanos en todos los países

Redoblar los esfuerzos para proteger y salvaguardar el patrimonio cultural y natural del mundo

Para 2030, reducir de forma significativa el número de muertes y de personas afectadas por los desastres, incluidos los relacionados con el agua, y reducir sustancialmente las pérdidas económicas directas vinculadas al producto interno bruto mundial causadas por los desastres, haciendo especial hincapié en la protección de los pobres y las personas en situaciones vulnerables

Para 2030, reducir el impacto ambiental negativo per capita de las ciudades, incluso prestando especial atención a la calidad del aire y la gestión de los desechos municipales y de otro tipo

Para 2030, proporcionar acceso universal a zonas verdes y espacios públicos seguros, inclusivos y accesibles, en particular para las mujeres y los niños, las personas de edad y las personas con discapacidad

Apoyar los vínculos económicos, sociales y ambientales positivos entre las zonas urbanas, periurbanas y rurales mediante el fortalecimiento de la planificación del desarrollo nacional y regional

Para 2020, aumentar sustancialmente el número de ciudades y asentamientos humanos que adoptan y ponen en marcha políticas y planes integrados para promover la inclusión, el uso eficiente de los recursos, la mitigación del cambio climático y la adaptación a él y la resiliencia ante los desastres, y desarrollar y poner en práctica, en consonancia con el Marco de Sendai para la Reducción del Riesgo de Desastres 2015-2030, la gestión integral de los riesgos de desastre a todos los niveles

Proporcionar apoyo a los países menos adelantados, incluso mediante la asistencia financiera y técnica, para que puedan construir edificios sostenibles y resilientes utilizando materiales locales',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 12: Garantizar modalidades de consumo y producción sostenibles',
            'descripcion'   => 'Aplicar el Marco Decenal de Programas sobre Modalidades de Consumo y Producción Sostenibles, con la participación de todos los países y bajo el liderazgo de los países desarrollados, teniendo en cuenta el grado de desarrollo y las capacidades de los países en desarrollo
            
Para 2030, lograr la gestión sostenible y el uso eficiente de los recursos naturales

Para 2030, reducir a la mitad el desperdicio mundial de alimentos per capita en la venta al por menor y a nivel de los consumidores y reducir las pérdidas de alimentos en las cadenas de producción y distribución, incluidas las pérdidas posteriores a las cosechas

Para 2020, lograr la gestión ecológicamente racional de los productos químicos y de todos los desechos a lo largo de su ciclo de vida, de conformidad con los marcos internacionales convenidos, y reducir de manera significativa su liberación a la atmósfera, el agua y el suelo a fin de reducir al mínimo sus efectos adversos en la salud humana y el medio ambiente

Para 2030, disminuir de manera sustancial la generación de desechos mediante políticas de prevención, reducción, reciclaje y reutilización

Alentar a las empresas, en especial las grandes empresas y las empresas transnacionales, a que adopten prácticas sostenibles e incorporen información sobre la sostenibilidad en su ciclo de presentación de informes

Promover prácticas de contratación pública que sean sostenibles, de conformidad con las políticas y prioridades nacionales

Para 2030, velar por que las personas de todo el mundo tengan información y conocimientos pertinentes para el desarrollo sostenible y los estilos de vida en armonía con la naturaleza

Apoyar a los países en desarrollo en el fortalecimiento de su capacidad científica y tecnológica a fin de avanzar hacia modalidades de consumo y producción más sostenibles

Elaborar y aplicar instrumentos que permitan seguir de cerca los efectos en el desarrollo sostenible con miras a lograr un turismo sostenible que cree puestos de trabajo y promueva la cultura y los productos locales

Racionalizar los subsidios ineficientes a los combustibles fósiles que alientan el consumo antieconómico mediante la eliminación de las distorsiones del mercado, de acuerdo con las circunstancias nacionales, incluso mediante la reestructuración de los sistemas tributarios y la eliminación gradual de los subsidios perjudiciales, cuando existan, para que se ponga de manifiesto su impacto ambiental, teniendo plenamente en cuenta las necesidades y condiciones particulares de los países en desarrollo y reduciendo al mínimo los posibles efectos adversos en su desarrollo, de manera que se proteja a los pobres y las comunidades afectadas',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 13: Adoptar medidas urgentes para combatir el cambio climático y sus efectos',
            'descripcion'   => 'Fortalecer la resiliencia y la capacidad de adaptación a los riesgos relacionados con el clima y los desastres naturales en todos los países

Incorporar medidas relativas al cambio climático en las políticas, estrategias y planes nacionales

Mejorar la educación, la sensibilización y la capacidad humana e institucional en relación con la mitigación del cambio climático, la adaptación a él, la reducción de sus efectos y la alerta temprana

Poner en práctica el compromiso contraído por los países desarrollados que son parte en la Convención Marco de las Naciones Unidas sobre el Cambio Climático con el objetivo de movilizar conjuntamente 100.000 millones de dólares anuales para el año 2020, procedentes de todas las fuentes, a fin de atender a las necesidades de los países en desarrollo, en el contexto de una labor significativa de mitigación y de una aplicación transparente, y poner en pleno funcionamiento el Fondo Verde para el Clima capitalizándolo lo antes posible

Promover mecanismos para aumentar la capacidad de planificación y gestión eficaces en relación con el cambio climático en los países menos adelantados y los pequeños Estados insulares en desarrollo, centrándose en particular en las mujeres, los jóvenes y las comunidades locales y marginadas',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 14: Conservar y utilizar en forma sostenible los océanos, los mares y los recursos marinos para el desarrollo sostenible',
            'descripcion'   => 'Para 2025, prevenir y reducir de manera significativa la contaminación marina de todo tipo, en particular la contaminación producida por actividades realizadas en tierra firme, incluidos los detritos marinos y la contaminación por nutrientes
            
Para 2020, gestionar y proteger de manera sostenible los ecosistemas marinos y costeros con miras a evitar efectos nocivos importantes, incluso mediante el fortalecimiento de su resiliencia, y adoptar medidas para restaurarlos con objeto de restablecer la salud y la productividad de los océanos

Reducir al mínimo los efectos de la acidificación de los océanos y hacerles frente, incluso mediante la intensificación de la cooperación científica a todos los niveles

Para 2020, reglamentar eficazmente la explotación pesquera y poner fin a la pesca excesiva, la pesca ilegal, la pesca no declarada y no reglamentada y las prácticas de pesca destructivas, y aplicar planes de gestión con fundamento científico a fin de restablecer las poblaciones de peces en el plazo más breve posible, por lo menos a niveles que puedan producir el máximo rendimiento sostenible de acuerdo con sus características biológicas

Para 2020, conservar por lo menos el 10% de las zonas costeras y marinas, de conformidad con las leyes nacionales y el derecho internacional y sobre la base de la mejor información científica disponible

Para 2020, prohibir ciertas formas de subvenciones a la pesca que contribuyen a la capacidad de pesca excesiva y la sobreexplotación pesquera, eliminar las subvenciones que contribuyen a la pesca ilegal, no declarada y no reglamentada y abstenerse de introducir nuevas subvenciones de esa índole, reconociendo que la negociación sobre las subvenciones a la pesca en el marco de la Organización Mundial del Comercio debe incluir un trato especial y diferenciado, apropiado y efectivo para los países en desarrollo y los países menos adelantados

Para 2030, aumentar los beneficios económicos que los pequeños Estados insulares en desarrollo y los países menos adelantados reciben del uso sostenible de los recursos marinos, en particular mediante la gestión sostenible de la pesca, la acuicultura y el turismo

Aumentar los conocimientos científicos, desarrollar la capacidad de investigación y transferir la tecnología marina, teniendo en cuenta los criterios y directrices para la transferencia de tecnología marina de la Comisión Oceanográfica Intergubernamental, a fin de mejorar la salud de los océanos y potenciar la contribución de la biodiversidad marina al desarrollo de los países en desarrollo, en particular los pequeños Estados insulares en desarrollo y los países menos adelantados

Facilitar el acceso de los pescadores artesanales en pequeña escala a los recursos marinos y los mercados

Mejorar la conservación y el uso sostenible de los océanos y sus recursos aplicando el derecho internacional reflejado en la Convención de las Naciones Unidas sobre el Derecho del Mar, que proporciona el marco jurídico para la conservación y la utilización sostenible de los océanos y sus recursos, como se recuerda en el párrafo 158 del documento «El futuro que queremos»',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 15: Proteger, restablecer y promover el uso sostenible de los ecosistemas terrestres, gestionar los bosques de forma sostenible, luchar contra la desertificación, detener e invertir la degradación de las tierras y poner freno a la pérdida de la diversidad biológica',
            'descripcion'   => 'Para 2020, velar por la conservación, el restablecimiento y el uso sostenible de los ecosistemas terrestres y los ecosistemas interiores de agua dulce y los servicios que proporcionan, en particular los bosques, los humedales, las montañas y las zonas áridas, en consonancia con las obligaciones contraídas en virtud de acuerdos internacionales
            
Para 2020, promover la gestión sostenible de todos los tipos de bosques, poner fin a la deforestación, recuperar los bosques degradados e incrementar la forestación y la reforestación a nivel mundial

Para 2030, luchar contra la desertificación, rehabilitar las tierras y los suelos degradados, incluidas las tierras afectadas por la desertificación, la sequía y las inundaciones, y procurar lograr un mundo con una degradación neutra del suelo

Para 2030, velar por la conservación de los ecosistemas montañosos, incluida su diversidad biológica, a fin de mejorar su capacidad de proporcionar beneficios esenciales para el desarrollo sostenible

Adoptar medidas urgentes y significativas para reducir la degradación de los hábitats naturales, detener la pérdida de la diversidad biológica y, para 2020, proteger las especies amenazadas y evitar su extinción

Promover la participación justa y equitativa en los beneficios que se deriven de la utilización de los recursos genéticos y promover el acceso adecuado a esos recursos, como se ha convenido internacionalmente

Adoptar medidas urgentes para poner fin a la caza furtiva y el tráfico de especies protegidas de flora y fauna y abordar la demanda y la oferta ilegales de productos silvestres

Para 2020, adoptar medidas para prevenir la introducción de especies exóticas invasoras y reducir de forma significativa sus efectos en los ecosistemas terrestres y acuáticos y controlar o erradicar las especies prioritarias

Para 2020, integrar los valores de los ecosistemas y la diversidad biológica en la planificación nacional y local, los procesos de desarrollo, las estrategias de reducción de la pobreza y la contabilidad

Movilizar y aumentar de manera significativa los recursos financieros procedentes de todas las fuentes para conservar y utilizar de forma sostenible la diversidad biológica y los ecosistemas

Movilizar un volumen apreciable de recursos procedentes de todas las fuentes y a todos los niveles para financiar la gestión forestal sostenible y proporcionar incentivos adecuados a los países en desarrollo para que promuevan dicha gestión, en particular con miras a la conservación y la reforestación

Aumentar el apoyo mundial a la lucha contra la caza furtiva y el tráfico de especies protegidas, en particular aumentando la capacidad de las comunidades locales para promover oportunidades de subsistencia sostenibles',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 16: Promover sociedades pacíficas e inclusivas para el desarrollo sostenible, facilitar el acceso a la justicia para todos y crear instituciones eficaces, responsables e inclusivas a todos los niveles',
            'descripcion'   => 'Promover sociedades pacíficas e inclusivas para el desarrollo sostenible, facilitar el acceso a la justicia para todos y crear instituciones eficaces, responsables e inclusivas a todos los niveles.

Reducir considerablemente todas las formas de violencia y las tasas de mortalidad conexas en todo el mundo

Poner fin al maltrato, la explotación, la trata, la tortura y todas las formas de violencia contra los niños

Promover el estado de derecho en los planos nacional e internacional y garantizar la igualdad de acceso a la justicia para todos

Para 2030, reducir de manera significativa las corrientes financieras y de armas ilícitas, fortalecer la recuperación y devolución de bienes robados y luchar contra todas las formas de delincuencia organizada

Reducir sustancialmente la corrupción y el soborno en todas sus formas

Crear instituciones eficaces, responsables y transparentes a todos los niveles

Garantizar la adopción de decisiones inclusivas, participativas y representativas que respondan a las necesidades a todos los niveles

Ampliar y fortalecer la participación de los países en desarrollo en las instituciones de gobernanza mundial

Para 2030, proporcionar acceso a una identidad jurídica para todos, en particular mediante el registro de nacimientos

Garantizar el acceso público a la información y proteger las libertades fundamentales, de conformidad con las leyes nacionales y los acuerdos internacionales

Fortalecer las instituciones nacionales pertinentes, incluso mediante la cooperación internacional, con miras a crear capacidad a todos los niveles, en particular en los países en desarrollo, para prevenir la violencia y combatir el terrorismo y la delincuencia

Promover y aplicar leyes y políticas no discriminatorias en favor del desarrollo sostenible

¿Cómo lo lograremos? Sociedad: No participes en actos de corrupción y denúncialos. Iniciativa privada: No participes en actos de soborno y corrupción. Academia: Fortalece la investigación, colabora para crear soluciones innovadoras y apoya en la medición del impacto. Gobiernos: Garantiza la seguridad de las y los ciudadanos y sus Derechos Humanos, crea instituciones eficaces, responsables y transparentes a todos los niveles.',
        ]);

        RefOdsObjetivo::create([
            'nombre'        => 'Objetivo 17: Fortalecer los medios de ejecución y revitalizar la Alianza Mundial para el Desarrollo Sostenible',
            'descripcion'   => 'Finanzas
Fortalecer la movilización de recursos internos, incluso mediante la prestación de apoyo internacional a los países en desarrollo, con el fin de mejorar la capacidad nacional para recaudar ingresos fiscales y de otra índole
Velar por que los países desarrollados cumplan cabalmente sus compromisos en relación con la asistencia oficial para el desarrollo, incluido el compromiso de numerosos países desarrollados de alcanzar el objetivo de destinar el 0,7% del ingreso nacional bruto a la asistencia oficial para el desarrollo y del 0,15% al 0,20% del ingreso nacional bruto a la asistencia oficial para el desarrollo de los países menos adelantados; y alentar a los proveedores de asistencia oficial para el desarrollo a que consideren fijar una meta para destinar al menos el 0,20% del ingreso nacional bruto a la asistencia oficial para el desarrollo de los países menos adelantados
Movilizar recursos financieros adicionales procedentes de múltiples fuentes para los países en desarrollo
Ayudar a los países en desarrollo a lograr la sostenibilidad de la deuda a largo plazo con políticas coordinadas orientadas a fomentar la financiación, el alivio y la reestructuración de la deuda, según proceda, y hacer frente a la deuda externa de los países pobres muy endeudados a fin de reducir el endeudamiento excesivo
Adoptar y aplicar sistemas de promoción de las inversiones en favor de los países menos adelantados

Tecnología
Mejorar la cooperación regional e internacional Norte-Sur, Sur-Sur y triangular en materia de ciencia, tecnología e innovación y el acceso a ellas y aumentar el intercambio de conocimientos en condiciones mutuamente convenidas, entre otras cosas mejorando la coordinación entre los mecanismos existentes, en particular en el ámbito de las Naciones Unidas, y mediante un mecanismo mundial de facilitación de la tecnología
Promover el desarrollo de tecnologías ecológicamente racionales y su transferencia, divulgación y difusión a los países en desarrollo en condiciones favorables, incluso en condiciones concesionarias y preferenciales, por mutuo acuerdo
Poner en pleno funcionamiento, a más tardar en 2017, el banco de tecnología y el mecanismo de apoyo a la ciencia, la tecnología y la innovación para los países menos adelantados y aumentar la utilización de tecnología instrumental, en particular de la tecnología de la información y las comunicacioneseación de capacidad
Aumentar el apoyo internacional a la ejecución de programas de fomento de la capacidad eficaces y con objetivos concretos en los países en desarrollo a fin de apoyar los planes nacionales orientados a aplicar todos los Objetivos de Desarrollo Sostenible, incluso mediante la cooperación Norte-Sur, Sur-Sur y triangular

Comercio
Promover un sistema de comercio multilateral universal, basado en normas, abierto, no discriminatorio y equitativo en el marco de la Organización Mundial del Comercio, incluso mediante la conclusión de las negociaciones con arreglo a su Programa de Doha para el Desarrollo
Aumentar de manera significativa las exportaciones de los países en desarrollo, en particular con miras a duplicar la participación de los países menos adelantados en las exportaciones mundiales para 2020
Lograr la consecución oportuna del acceso a los mercados, libre de derechos y de contingentes, de manera duradera para todos los países menos adelantados, de conformidad con las decisiones de la Organización Mundial del Comercio, entre otras cosas velando por que las normas de origen preferenciales aplicables a las importaciones de los países menos adelantados sean transparentes y sencillas y contribuyan a facilitar el acceso a los mercados
            
Cuestiones sistémicas - Coherencia normativa e institucional
Aumentar la estabilidad macroeconómica mundial, incluso mediante la coordinación y coherencia normativas
Mejorar la coherencia normativa para el desarrollo sostenible
Respetar el liderazgo y el margen normativo de cada país para establecer y aplicar políticas orientadas a la erradicación de la pobreza y la promoción del desarrollo sostenible

Cuestiones sistémicas - Alianzas entre múltiples interesados
Fortalecer la Alianza Mundial para el Desarrollo Sostenible, complementada por alianzas entre múltiples interesados que movilicen y promuevan el intercambio de conocimientos, capacidad técnica, tecnología y recursos financieros, a fin de apoyar el logro de los Objetivos de Desarrollo Sostenible en todos los países, en particular los países en desarrollo
Alentar y promover la constitución de alianzas eficaces en las esferas pública, público-privada y de la sociedad civil, aprovechando la experiencia y las estrategias de obtención de recursos de las asociaciones
            
Datos, supervisión y rendición de cuentas
Para 2020, mejorar la prestación de apoyo para el fomento de la capacidad a los países en desarrollo, incluidos los países menos adelantados y los pequeños Estados insulares en desarrollo, con miras a aumentar de forma significativa la disponibilidad de datos oportunos, fiables y de alta calidad desglosados por grupos de ingresos, género, edad, raza, origen étnico, condición migratoria, discapacidad, ubicación geográfica y otras características pertinentes en los contextos nacionales
Para 2030, aprovechar las iniciativas existentes para elaborar indicadores que permitan medir progresos logrados en materia de desarrollo sostenible y que complementen los utilizados para medir el producto interno bruto, y apoyar el fomento de la capacidad estadística en los países en desarrollo',
        ]);
    }
}
