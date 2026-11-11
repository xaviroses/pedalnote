<?php
/**
 * Contenido por defecto de la portada (el del XD).
 *
 * Es el respaldo de los campos ACF: si un campo está vacío (o ACF no está activo),
 * la portada muestra este texto. También lo usa tools/acf-seed-home.php para
 * rellenar los campos la primera vez.
 *
 * Las claves son los nombres de los campos de inc/acf-home.php.
 *
 * @package pedalnote
 */

defined( 'ABSPATH' ) || exit;

return array(
	// 1 · Hero.
	'hero_title'        => 'Innovation&Transformation',
	'hero_tagline'      => 'We help organisations understand what matters, define what comes next and make it happen.',
	'hero_intro_1'      => 'Nos adaptamos a la frecuencia de cada cliente: a sus retos, su contexto y su cultura.',
	'hero_intro_mobile' => "Defining Tomorrow — identificar qué importa y definir qué viene.\nMake it Happen — activar a las personas para convertir las decisiones en una realidad compartida.",
	'hero_intro_2'      => 'Combinamos innovación, estrategia y transformación desde una mirada humana, curiosa y práctica.',
	'hero_photo_text'   => 'nota pedal: acorde, nota sostenida que ayuda a impulsarlo o a cambiarlo de una forma suave; llevarlo más allá o ser el punto de apoyo para que cambie.',
	'hero_image'        => 0,

	// 2 · Banda de claves.
	'claves_text'  => 'Human understanding · behavioural insight · creativity & co-creation · business strategy · strategic facilitation · organisational transformation.',
	'claves_image' => 0,

	// 3 · Innovation.
	'innovation_kicker'         => 'INNOVATION',
	'innovation_title'          => 'DEFINING TOMORROW',
	'innovation_lead'           => 'From Entender lo que importa to',
	'innovation_lead_highlight' => 'DEFINIR LO QUE VIENE.',
	'innovation_steps'          => array(
		array( 'label' => 'INVESTIGAR' ),
		array( 'label' => 'CONTRASTAR' ),
		array( 'label' => 'Propuesta de VALOR' ),
		array( 'label' => 'CO-CREAR' ),
		array( 'label' => 'Producto o servicio' ),
		array( 'label' => 'Experiencia' ),
		array( 'label' => 'Estrategia' ),
	),

	// 4 · Tipos de proyecto (innovación).
	'services_innovation_title' => 'Tipos de proyecto',
	'services_innovation_items' => array(
		array(
			'name' => 'Human insight & behaviour',
			'text' => 'Investigar lo que las personas hacen, lo que dicen y lo que no siempre saben explicar. Descubrir las tensiones, motivaciones y significados que pueden abrir una nueva posibilidad para el negocio.',
		),
		array(
			'name' => 'Complex systems understanding',
			'text' => 'Mirar más allá de cada pieza para entender qué está pasando entre ellas. Conectar personas, contexto y dinámicas para encontrar dónde se juega realmente el cambio.',
		),
		array(
			'name' => 'New products, services & experiences',
			'text' => 'Dar forma a lo que todavía no existe desde una comprensión profunda de las personas. Co-crear y contrastar productos, servicios y experiencias que encuentren un lugar en su vida.',
		),
		array(
			'name' => 'Future opportunities & strategic direction',
			'text' => 'Leer las señales de lo que está cambiando y explorar qué posibilidades abren. Dar criterio a las apuestas de futuro: dónde hay una oportunidad que merece la pena y qué hacer con ella.',
		),
	),
	'services_innovation_image' => 0,

	// 5 · Transformation.
	'transformation_kicker'         => 'TRANSFORMATION',
	'transformation_title'          => 'MAKE IT HAPPEN',
	'transformation_lead'           => 'From Idea to',
	'transformation_lead_highlight' => 'REALIDAD',
	'transformation_steps'          => array(
		array( 'label' => 'IMPLICAR' ),
		array( 'label' => 'ALINEAR' ),
		array( 'label' => 'ACTIVAR' ),
		array( 'label' => 'Para que los equipos la entiendan, la hagan suya y cambien conversaciones, comportamientos y rituales.' ),
		array( 'label' => 'Para que una estrategia, una integración, una transformación comercial o un cambio cultural empiece a formar parte del día a día.' ),
	),

	// 6 · Tipos de proyecto (transformación): dos columnas.
	'services_transformation_title'  => 'Tipos de proyecto',
	'services_transformation_items'  => array(
		array(
			'name' => 'Culture & behaviour change',
			'text' => 'La cultura se juega en lo que pasa cada día. Crear las condiciones para que la seguridad, la colaboración, la innovación o la mirada al cliente cobren vida en conversaciones, decisiones y hábitos compartidos.',
		),
		array(
			'name' => 'Strategy activation',
			'text' => 'Una dirección empieza a mover algo cuando las personas encuentran su lugar en ella. Trabajar con los equipos para darle sentido, hacerla propia y llevarla a las decisiones de cada día.',
		),
	),
	'services_transformation_items_2' => array(
		array(
			'name' => 'Team integration & high-uncertainty moments',
			'text' => 'Cuando cambia el mapa, también cambia la forma de estar juntos. Abrir conversaciones que permitan a los equipos reconocerse, construir confianza y encontrar un rumbo compartido en fusiones, reorganizaciones y momentos de incertidumbre.',
		),
		array(
			'name' => 'Collective intelligence & alignment',
			'text' => 'Hay conocimiento repartido por toda la organización que rara vez llega a encontrarse. Diseñar espacios de trabajo donde esas miradas se crucen, aparezcan nuevas respuestas y las decisiones puedan construirse entre quienes tendrán que hacerlas realidad.',
		),
		array(
			'name' => 'Commercial transformation',
			'text' => 'Una propuesta cobra valor en la conversación con el cliente. Trabajar con los equipos para que el entendimiento del mercado transforme la forma de escuchar, proponer y vender, y se sostenga en la práctica comercial.',
		),
	),
	'services_transformation_image' => 0,

	// 7 · Selected Work: 6 casos (el orden es el de lectura del XD; la posición de cada uno en la rejilla va en la plantilla).
	'work_title'    => 'Selected work',
	'work_subtitle' => 'Notes from real projects.',
	'work_cases'    => array(
		array(
			'color' => 'red',
			'name'  => 'Banc Sabadell · Zurich',
			'claim' => 'When the channel isn’t the real question.',
			'text'  => 'Ayudando a incorporar la perspectiva del cliente en la definición de productos, servicios y canales aseguradores — desde protección y salud hasta ahorro para la jubilación y experiencia digital.',
		),
		array(
			'color' => 'sky',
			'name'  => 'Holaluz',
			'claim' => 'Understand first. Sell differently afterwards.',
			'text'  => 'Una colaboración continuada alrededor de la comprensión del cliente, la propuesta de valor, nuevos productos, la experiencia comercial y formas concretas de llevar el customer centricity al negocio.',
		),
		array(
			'color' => 'light-grey',
			'name'  => 'Vidal & Vidal',
			'claim' => 'Jewellery doesn’t just decorate a moment. It gives it meaning.',
			'text'  => 'Entendiendo cómo la identidad, los rituales y los momentos de vida moldean el significado, la elección y la experiencia de la joyería.',
		),
		array(
			'color' => 'green',
			'name'  => 'Verifait / Wardians',
			'claim' => 'The technology was already there. The value wasn’t visible yet',
			'text'  => 'Convirtiendo capacidades complejas de vídeo e inteligencia artificial en una propuesta más clara, ofertas específicas por sector y un modelo comercial más accionable.',
		),
		array(
			'color' => 'yellow',
			'name'  => 'Codorníu',
			'claim' => 'People don’t consume categories. They live moments.',
			'text'  => 'Explorando personas, ocasiones y contextos para descubrir nuevas oportunidades de consumo y convertirlas en ideas de producto, experiencia y comunicación.',
		),
		array(
			'color' => 'red',
			'name'  => 'Exide Technologies',
			'claim' => 'From safety as a priority to safety as a way of leading.',
			'text'  => 'Ayudando a que la seguridad pase de la política a la cultura a través del liderazgo, el aprendizaje compartido, la experimentación local y prácticas capaces de extenderse entre plantas.',
		),
	),
	'work_image' => 0,

	// 8 · Banda de marca.
	'brand_alt'   => 'Pedal Note, escrito a mano sobre una cinta',
	'brand_image' => 0,

	// 9 · Fundador.
	'founder_name'  => 'Coe Lejarza',
	'founder_lead'  => 'Coe Lejarza es fundador de Pedal Note y lleva más de veinte años trabajando en innovación, estrategia y transformación.',
	'founder_bio'   => "Ingeniero químico de formación, empezó su trayectoria profesional en Siemens, pasó después por la publicidad y acabó encontrando su sitio en la consultoría. Desde entonces ha trabajado con organizaciones y sectores muy diversos, desde farma a utilities, desde aerolíneas a fabricantes de cerveza, de ONGs a empresas de joyería.\n\nA lo largo de su carrera ha trabajado con equipos internacionales y multidisciplinares, combinando cosas que no siempre aparecen juntas: negocio y ciencias sociales, estrategia y creatividad, investigación y activación, pensamiento y movimiento.\n\nDe ahí nace Pedal Note: una forma de ayudar a organizaciones y equipos a identificar qué importa, definir qué viene y activar a las personas para convertir las decisiones en una realidad compartida.\n\nCompagina su actividad profesional con la docencia en EADA Business School. Y una forma humana de hacer que las cosas se muevan.",
	'founder_image' => 0,

	// 10 · Contacto.
	'contact_title'    => 'Parlem?',
	'contact_email'    => 'coe@pedalnote.co',
	'contact_phone'    => '+34 625 97 64 53',
	'contact_linkedin' => 'https://www.linkedin.com/company/146620487/',
);
