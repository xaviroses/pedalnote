<?php
/**
 * Encolado de CSS y JS (versión por filemtime).
 *
 * @package pedalnote
 */

defined( 'ABSPATH' ) || exit;

/**
 * Versión de un asset según su fecha de modificación.
 *
 * @param string $rel Ruta relativa al tema.
 */
function pedalnote_asset_ver( string $rel ): string {
	$path = PEDALNOTE_DIR . '/' . $rel;
	return file_exists( $path ) ? (string) filemtime( $path ) : wp_get_theme()->get( 'Version' );
}

add_action( 'wp_enqueue_scripts', function () {
	// Fuera estilos de bloques que no usamos en la one page.
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );

	if ( file_exists( PEDALNOTE_DIR . '/assets/css/main.css' ) ) {
		wp_enqueue_style( 'pedalnote', PEDALNOTE_URI . '/assets/css/main.css', array(), pedalnote_asset_ver( 'assets/css/main.css' ) );
	}

	if ( file_exists( PEDALNOTE_DIR . '/assets/js/main.js' ) ) {
		wp_enqueue_script(
			'pedalnote',
			PEDALNOTE_URI . '/assets/js/main.js',
			array(),
			pedalnote_asset_ver( 'assets/js/main.js' ),
			array( 'strategy' => 'defer', 'in_footer' => true )
		);
	}
}, 20 );
