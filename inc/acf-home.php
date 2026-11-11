<?php
/**
 * Campos ACF de la portada: un grupo con una pestaña por sección.
 *
 * Se registran desde el código (versionados con el tema): aparecen igual en local y
 * en producción sin importar nada. Solo se ven al editar la página de portada.
 *
 * Qué es editable: textos, imágenes de fondo y datos de contacto. Qué NO: la posición
 * de cada pieza (sale del XD) ni el número de pasos de los diagramas o de casos de
 * Selected Work, porque cada uno tiene su sitio fijo en el diseño.
 *
 * @package pedalnote
 */

defined( 'ABSPATH' ) || exit;

add_action( 'acf/include_fields', function () {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	// --- Constructores cortos (claves estables: field_pn_{nombre}) -------------------
	$tab = static fn( string $label ): array => array(
		'key'       => 'field_pn_tab_' . sanitize_title( $label ),
		'label'     => $label,
		'type'      => 'tab',
		'placement' => 'left',
	);

	$msg = static fn( string $name, string $text ): array => array(
		'key'     => 'field_pn_msg_' . $name,
		'label'   => '',
		'type'    => 'message',
		'message' => $text,
	);

	$text = static fn( string $name, string $label, string $instructions = '', array $extra = array() ): array => array_merge(
		array(
			'key'          => 'field_pn_' . $name,
			'name'         => $name,
			'label'        => $label,
			'type'         => 'text',
			'instructions' => $instructions,
		),
		$extra
	);

	$area = static fn( string $name, string $label, string $instructions = '', int $rows = 3 ): array => array(
		'key'          => 'field_pn_' . $name,
		'name'         => $name,
		'label'        => $label,
		'type'         => 'textarea',
		'rows'         => $rows,
		'new_lines'    => '', // el formato lo aplica la plantilla
		'instructions' => $instructions,
	);

	$image = static fn( string $name, string $label, string $instructions = '' ): array => array(
		'key'           => 'field_pn_' . $name,
		'name'          => $name,
		'label'         => $label,
		'type'          => 'image',
		'return_format' => 'id',
		'preview_size'  => 'medium',
		'library'       => 'all',
		'mime_types'    => 'jpg, jpeg, png, webp, avif',
		'instructions'  => $instructions . ( $instructions ? ' ' : '' ) . 'Si se deja vacía, se usa la foto original del diseño. Recomendado: 2560 px de ancho como mínimo.',
	);

	// Lista de pasos de un diagrama: número fijo (cada paso tiene su posición en el diseño).
	$steps = static fn( string $name, string $label, int $count ): array => array(
		'key'          => 'field_pn_' . $name,
		'name'         => $name,
		'label'        => $label,
		'type'         => 'repeater',
		'layout'       => 'table',
		'min'          => $count,
		'max'          => $count,
		'button_label' => 'Añadir paso',
		'instructions' => "Los {$count} textos del diagrama, de arriba abajo. El número de pasos es fijo: cada uno tiene su barra en el diseño.",
		'sub_fields'   => array(
			array(
				'key'   => 'field_pn_' . $name . '_label',
				'name'  => 'label',
				'label' => 'Texto',
				'type'  => 'text',
			),
		),
	);

	// Lista de servicios (nombre + texto).
	$services = static fn( string $name, string $label, string $instructions = '' ): array => array(
		'key'          => 'field_pn_' . $name,
		'name'         => $name,
		'label'        => $label,
		'type'         => 'repeater',
		'layout'       => 'block',
		'min'          => 1,
		'button_label' => 'Añadir servicio',
		'collapsed'    => 'field_pn_' . $name . '_name',
		'instructions' => $instructions,
		'sub_fields'   => array(
			array(
				'key'   => 'field_pn_' . $name . '_name',
				'name'  => 'name',
				'label' => 'Nombre',
				'type'  => 'text',
			),
			array(
				'key'       => 'field_pn_' . $name . '_text',
				'name'      => 'text',
				'label'     => 'Texto',
				'type'      => 'textarea',
				'rows'      => 3,
				'new_lines' => '',
			),
		),
	);

	$fields = array(
		// 1 · Hero ------------------------------------------------------------------
		$tab( '1 · Portada (hero)' ),
		$text( 'hero_title', 'Titular', 'Arriba a la izquierda. Ojo: en escritorio va en una sola línea; un texto mucho más largo invadiría la foto en blanco y negro.' ),
		$text( 'hero_tagline', 'Subtítulo', 'Debajo del titular (solo en escritorio).' ),
		$area( 'hero_intro_1', 'Texto de introducción 1', 'Abajo a la izquierda.', 2 ),
		$area( 'hero_intro_mobile', 'Texto solo para móvil', 'Aparece únicamente en móvil, entre los dos textos de introducción. Cada salto de línea se respeta.', 3 ),
		$area( 'hero_intro_2', 'Texto de introducción 2', '', 2 ),
		$image( 'hero_image', 'Foto', 'Composición completa (mitad color, mitad blanco y negro con el texto vertical incrustado).' ),
		$area( 'hero_photo_text', 'Texto incrustado en la foto', 'Copia del texto vertical que va dentro de la foto. No se ve: es para buscadores y lectores de pantalla.', 3 ),

		// 2 · Claves ------------------------------------------------------------------
		$tab( '2 · Banda de claves' ),
		$area( 'claves_text', 'Texto', '', 3 ),
		$image( 'claves_image', 'Foto de fondo' ),

		// 3 · Innovation --------------------------------------------------------------
		$tab( '3 · Innovation' ),
		$text( 'innovation_kicker', 'Etiqueta lateral (arriba)', 'Texto vertical. También se usa en la sección «Tipos de proyecto (innovación)».' ),
		$text( 'innovation_title', 'Etiqueta lateral (abajo)', 'Texto vertical. También se usa en «Tipos de proyecto (innovación)».' ),
		$text( 'innovation_lead', 'Frase guía', 'Primera parte, en gris.' ),
		$text( 'innovation_lead_highlight', 'Frase guía: final destacado', 'Segunda parte, en negro.' ),
		$steps( 'innovation_steps', 'Diagrama', 7 ),

		// 4 · Tipos de proyecto (innovación) -------------------------------------------
		$tab( '4 · Tipos de proyecto (innovación)' ),
		$text( 'services_innovation_title', 'Título' ),
		$services( 'services_innovation_items', 'Servicios' ),
		$image( 'services_innovation_image', 'Foto de fondo' ),

		// 5 · Transformation ----------------------------------------------------------
		$tab( '5 · Transformation' ),
		$text( 'transformation_kicker', 'Etiqueta lateral (arriba)', 'Texto vertical. También se usa en «Tipos de proyecto (transformación)».' ),
		$text( 'transformation_title', 'Etiqueta lateral (abajo)', 'Texto vertical. También se usa en «Tipos de proyecto (transformación)».' ),
		$text( 'transformation_lead', 'Frase guía', 'Primera parte, en gris.' ),
		$text( 'transformation_lead_highlight', 'Frase guía: final destacado', 'Segunda parte, en negro.' ),
		$steps( 'transformation_steps', 'Diagrama', 5 ),

		// 6 · Tipos de proyecto (transformación) ---------------------------------------
		$tab( '6 · Tipos de proyecto (transformación)' ),
		$text( 'services_transformation_title', 'Título' ),
		$services( 'services_transformation_items', 'Servicios: columna izquierda' ),
		$services( 'services_transformation_items_2', 'Servicios: columna derecha' ),
		$image( 'services_transformation_image', 'Foto de fondo' ),

		// 7 · Selected Work -----------------------------------------------------------
		$tab( '7 · Selected Work' ),
		$text( 'work_title', 'Título' ),
		$text( 'work_subtitle', 'Subtítulo' ),
		array(
			'key'          => 'field_pn_work_cases',
			'name'         => 'work_cases',
			'label'        => 'Casos',
			'type'         => 'repeater',
			'layout'       => 'block',
			'min'          => 6,
			'max'          => 6,
			'collapsed'    => 'field_pn_work_cases_name',
			'button_label' => 'Añadir caso',
			'instructions' => 'Los 6 casos, en orden de lectura (de izquierda a derecha y de arriba abajo). Son siempre 6: cada uno tiene su sitio en la rejilla del diseño. Se pueden reordenar arrastrándolos.',
			'sub_fields'   => array(
				array(
					'key'     => 'field_pn_work_cases_color',
					'name'    => 'color',
					'label'   => 'Color del rectángulo',
					'type'    => 'select',
					'choices' => array(
						'red'        => 'Rojo',
						'sky'        => 'Azul cielo',
						'light-grey' => 'Gris claro',
						'yellow'     => 'Amarillo',
						'green'      => 'Verde',
					),
					'wrapper' => array( 'width' => '30' ),
				),
				array(
					'key'     => 'field_pn_work_cases_name',
					'name'    => 'name',
					'label'   => 'Cliente',
					'type'    => 'text',
					'wrapper' => array( 'width' => '70' ),
				),
				array(
					'key'   => 'field_pn_work_cases_claim',
					'name'  => 'claim',
					'label' => 'Frase',
					'type'  => 'text',
				),
				array(
					'key'       => 'field_pn_work_cases_text',
					'name'      => 'text',
					'label'     => 'Texto',
					'type'      => 'textarea',
					'rows'      => 3,
					'new_lines' => '',
				),
			),
		),
		$image( 'work_image', 'Foto de fondo', 'Va desenfocada.' ),

		// 8 · Banda de marca ----------------------------------------------------------
		$tab( '8 · Banda de marca' ),
		$image( 'brand_image', 'Foto' ),
		$text( 'brand_alt', 'Descripción de la foto (texto alternativo)', 'Para buscadores y lectores de pantalla.' ),

		// 9 · Fundador ----------------------------------------------------------------
		$tab( '9 · Fundador' ),
		$text( 'founder_name', 'Nombre', 'No se ve: es el título de la sección para buscadores y lectores de pantalla.' ),
		$area( 'founder_lead', 'Entradilla', 'Primer párrafo, en letra más grande.', 3 ),
		$area( 'founder_bio', 'Biografía', 'Separa los párrafos con una línea en blanco.', 12 ),
		$image( 'founder_image', 'Foto de fondo' ),

		// 10 · Contacto ---------------------------------------------------------------
		$tab( '10 · Contacto' ),
		$msg( 'contact', 'Datos de la barra negra del pie. Aparecen también en las páginas legales.' ),
		$text( 'contact_title', 'Título' ),
		$text( 'contact_email', 'Email', '', array( 'type' => 'email' ) ),
		$text( 'contact_phone', 'Teléfono', 'Tal como se ve (p. ej. +34 625 97 64 53). El enlace para llamar se crea solo.' ),
		$text( 'contact_linkedin', 'LinkedIn (URL)', 'Si se deja vacío, «Linkedin» se muestra sin enlace.', array( 'type' => 'url' ) ),
	);

	acf_add_local_field_group(
		array(
			'key'                   => 'group_pn_home',
			'title'                 => 'Contenido de la portada',
			'fields'                => $fields,
			'location'              => array(
				array(
					array(
						'param'    => 'page_type',
						'operator' => '==',
						'value'    => 'front_page',
					),
				),
			),
			'position'              => 'acf_after_title',
			'style'                 => 'seamless',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			// La portada la pinta front-page.php: el editor de bloques no se usa.
			'hide_on_screen'        => array( 'the_content' ),
		)
	);
} );

// La portada no usa el editor de bloques: se edita solo con los campos.
add_filter( 'use_block_editor_for_post', function ( $use, $post ) {
	if ( $post && (int) get_option( 'page_on_front' ) === (int) $post->ID ) {
		return false;
	}
	return $use;
}, 10, 2 );
