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
