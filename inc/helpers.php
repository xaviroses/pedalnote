<?php
/**
 * Helpers del tema.
 *
 * @package pedalnote
 */

defined( 'ABSPATH' ) || exit;

/**
 * Anchos disponibles de una foto en assets/img ({nombre}-{ancho}.jpg), de menor a mayor.
 *
 * @param string $name Nombre base (p. ej. 'hero').
 * @return int[]
 */
function pedalnote_image_widths( string $name ): array {
	static $cache = array();
	if ( ! isset( $cache[ $name ] ) ) {
		$widths = array();
		foreach ( glob( PEDALNOTE_DIR . '/assets/img/' . $name . '-*.jpg' ) ?: array() as $file ) {
			if ( preg_match( '/-(\d+)\.jpg$/', $file, $m ) ) {
				$widths[] = (int) $m[1];
			}
		}
		sort( $widths );
		$cache[ $name ] = $widths;
	}
	return $cache[ $name ];
}

/**
 * <picture> responsive con AVIF, WebP y JPG de respaldo.
 *
 * @param string $name  Nombre base de la foto en assets/img.
 * @param string $alt   Texto alternativo ('' si es decorativa).
 * @param string $sizes Atributo sizes.
 * @param array  $args  class, img_class, priority (bool: hero), aria_hidden (bool).
 */
function pedalnote_picture( string $name, string $alt = '', string $sizes = '100vw', array $args = array() ): string {
	$widths = pedalnote_image_widths( $name );
	if ( ! $widths ) {
		return '';
	}

	$base   = PEDALNOTE_URI . '/assets/img/' . $name;
	$srcset = static function ( string $ext ) use ( $widths, $base ): string {
		return implode( ', ', array_map( static fn( $w ) => "{$base}-{$w}.{$ext} {$w}w", $widths ) );
	};

	// Proporción real a partir del JPG más grande (evita saltos de maquetación).
	$largest = end( $widths );
	$dims    = getimagesize( PEDALNOTE_DIR . "/assets/img/{$name}-{$largest}.jpg" );
	$height  = $dims ? (int) round( $largest * $dims[1] / $dims[0] ) : '';
	$priority = ! empty( $args['priority'] );

	$img_attrs = array(
		'src'           => "{$base}-" . ( in_array( 1440, $widths, true ) ? 1440 : $largest ) . '.jpg',
		'srcset'        => $srcset( 'jpg' ),
		'sizes'         => $sizes,
		'width'         => $largest,
		'height'        => $height,
		'alt'           => $alt,
		'class'         => $args['img_class'] ?? '',
		'loading'       => $priority ? 'eager' : 'lazy',
		'decoding'      => $priority ? 'sync' : 'async',
		'fetchpriority' => $priority ? 'high' : '',
	);

	$img = '<img';
	foreach ( $img_attrs as $attr => $value ) {
		if ( '' === $value && 'alt' !== $attr ) {
			continue;
		}
		$img .= sprintf( ' %s="%s"', $attr, esc_attr( (string) $value ) );
	}
	$img .= '>';

	return sprintf(
		'<picture%s%s><source type="image/avif" srcset="%s" sizes="%s"><source type="image/webp" srcset="%s" sizes="%s">%s</picture>',
		empty( $args['class'] ) ? '' : ' class="' . esc_attr( $args['class'] ) . '"',
		empty( $args['aria_hidden'] ) ? '' : ' aria-hidden="true"',
		esc_attr( $srcset( 'avif' ) ),
		esc_attr( $sizes ),
		esc_attr( $srcset( 'webp' ) ),
		esc_attr( $sizes ),
		$img
	);
}

/**
 * Atributo style con la posición de un elemento en el lienzo del XD (escritorio, 1920 px).
 *
 * @param int $x Izquierda en px del XD (relativa a la sección).
 * @param int $y Arriba en px del XD (relativa a la sección).
 */
function pedalnote_xy( int $x, int $y ): string {
	return sprintf( ' style="--x:%d;--y:%d"', $x, $y );
}

/**
 * Diagrama de barras escalonadas (secciones Innovation y Transformation).
 *
 * @param array $steps Lista de pasos, en orden de lectura (de arriba abajo):
 *                     [ 'label' => string, 'x' => int, 'y' => int, 'side' => 'right'|'left' ].
 *                     x/y = esquina superior izquierda de la barra en el XD; side = lado de la etiqueta;
 *                     long = true para frases largas (en móvil, sin sangría y con salto de línea).
 */
function pedalnote_diagram( array $steps ): string {
	$items = '';
	foreach ( $steps as $step ) {
		$left   = 'left' === ( $step['side'] ?? 'right' );
		$items .= sprintf(
			'<li class="diagram__step%s"%s><span class="diagram__bar" aria-hidden="true"></span><span class="diagram__label">%s</span></li>',
			( $left ? ' diagram__step--label-left' : '' ) . ( empty( $step['long'] ) ? '' : ' diagram__step--long' ),
			pedalnote_xy( $step['x'], $step['y'] ),
			esc_html( $step['label'] )
		);
	}
	return '<ol class="diagram">' . $items . '</ol>';
}

/**
 * Rótulo manuscrito (WebP con PNG de respaldo). Decorativo: el título real va en el <h2>.
 *
 * @param string $name Nombre en assets/img (rotulo-innovation…).
 * @param int    $w    Ancho en px del XD (1x).
 * @param int    $h    Alto en px del XD (1x).
 * @param string $class Clases extra.
 * @param int    $x    Posición en el XD.
 * @param int    $y    Posición en el XD.
 */
function pedalnote_lettering( string $name, int $w, int $h, string $class, int $x, int $y ): string {
	$base = PEDALNOTE_URI . '/assets/img/' . $name;
	$ver  = '?ver=' . pedalnote_asset_ver( 'assets/img/' . $name . '.png' ); // se refresca si se regenera
	return sprintf(
		'<picture class="lettering %1$s"%2$s aria-hidden="true"><source type="image/webp" srcset="%3$s"><img src="%4$s" width="%5$d" height="%6$d" alt="" loading="lazy" decoding="async"></picture>',
		esc_attr( $class ),
		pedalnote_xy( $x, $y ),
		esc_url( $base . '.webp' . $ver ),
		esc_url( $base . '.png' . $ver ),
		$w,
		$h
	);
}

/**
 * Valor de un campo de la portada (ACF), con el contenido del XD como respaldo.
 *
 * Si el campo nunca se ha guardado (o ACF no está activo) devuelve el valor de
 * inc/home-defaults.php. Si se ha guardado, devuelve lo guardado aunque esté vacío
 * (así se puede vaciar a propósito, p. ej. el enlace de LinkedIn).
 *
 * @param string $name Nombre del campo (ver inc/acf-home.php).
 * @return mixed
 */
function pedalnote_home( string $name ) {
	static $defaults = null;
	if ( null === $defaults ) {
		$defaults = require PEDALNOTE_DIR . '/inc/home-defaults.php';
	}
	$default = $defaults[ $name ] ?? null;
	$post_id = (int) get_option( 'page_on_front' );

	if ( ! function_exists( 'get_field' ) || ! $post_id || ! metadata_exists( 'post', $post_id, $name ) ) {
		return $default;
	}

	$value = get_field( $name, $post_id );

	// Repetidores: si se han quedado sin filas, mejor el contenido del diseño que un hueco.
	if ( is_array( $default ) && ( ! is_array( $value ) || ! $value ) ) {
		return $default;
	}
	return $value ?? $default;
}

/**
 * Foto de una sección: la elegida en la portada (Medios) o, si no hay, la del tema.
 *
 * @param string $field Campo de imagen (ACF, devuelve ID).
 * @param string $name  Foto del tema en assets/img (respaldo).
 * @param string $alt   Texto alternativo ('' si es decorativa).
 * @param string $sizes Atributo sizes.
 * @param array  $args  Los de pedalnote_picture().
 */
function pedalnote_home_picture( string $field, string $name, string $alt = '', string $sizes = '100vw', array $args = array() ): string {
	$id = (int) pedalnote_home( $field );
	if ( ! $id || ! wp_attachment_is_image( $id ) ) {
		return pedalnote_picture( $name, $alt, $sizes, $args );
	}

	$priority = ! empty( $args['priority'] );
	$img      = wp_get_attachment_image(
		$id,
		'full',
		false,
		array_filter(
			array(
				'alt'           => $alt,
				'sizes'         => $sizes,
				'class'         => $args['img_class'] ?? '',
				'loading'       => $priority ? 'eager' : 'lazy',
				'decoding'      => $priority ? 'sync' : 'async',
				'fetchpriority' => $priority ? 'high' : '',
			),
			static fn( $v, $k ) => '' !== $v || 'alt' === $k,
			ARRAY_FILTER_USE_BOTH
		)
	);

	// Mismo envoltorio <picture> que las fotos del tema: los estilos no cambian.
	return sprintf(
		'<picture%s%s>%s</picture>',
		empty( $args['class'] ) ? '' : ' class="' . esc_attr( $args['class'] ) . '"',
		empty( $args['aria_hidden'] ) ? '' : ' aria-hidden="true"',
		$img
	);
}

/**
 * Texto con saltos de línea respetados (escapado).
 *
 * @param string $text Texto plano.
 */
function pedalnote_lines( string $text ): string {
	return nl2br( esc_html( trim( $text ) ), false );
}

/**
 * Párrafos <p> a partir de un texto con líneas en blanco entre párrafos (escapado).
 *
 * @param string $text  Texto plano.
 * @param string $class Clase opcional de cada <p>.
 */
function pedalnote_paragraphs( string $text, string $class = '' ): string {
	$out = '';
	foreach ( preg_split( '/\R\s*\R/', trim( $text ) ) ?: array() as $para ) {
		$para = trim( $para );
		if ( '' !== $para ) {
			$out .= sprintf( '<p%s>%s</p>', $class ? ' class="' . esc_attr( $class ) . '"' : '', pedalnote_lines( $para ) );
		}
	}
	return $out;
}

/**
 * Une la posición fija de cada paso de un diagrama (del XD) con su texto (campo ACF).
 *
 * @param array  $layout Pasos con x, y, side, long (sin label), en orden de lectura.
 * @param string $field  Repetidor de textos (sub-campo «label»).
 */
function pedalnote_diagram_steps( array $layout, string $field ): array {
	$labels = array_values( (array) pedalnote_home( $field ) );
	$steps  = array();
	foreach ( $layout as $i => $step ) {
		if ( isset( $labels[ $i ]['label'] ) && '' !== trim( (string) $labels[ $i ]['label'] ) ) {
			$steps[] = $step + array( 'label' => $labels[ $i ]['label'] );
		}
	}
	return $steps;
}
