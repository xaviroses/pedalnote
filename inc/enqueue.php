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
} );

// Fuera estilos de bloques de Gutenberg que no usamos en la one page.
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
add_action( 'wp_enqueue_scripts', function () {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'classic-theme-styles' );
}, 100 );

// Precarga de la fuente principal (evita el salto de tipografía al cargar).
add_action( 'wp_head', function () {
	printf(
		'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
		esc_url( PEDALNOTE_URI . '/assets/fonts/' . ( file_exists( PEDALNOTE_DIR . '/assets/fonts/suisse-intl-book.woff2' ) ? 'suisse-intl-book.woff2' : 'inter-400-latin.woff2' ) )
	);
}, 1 );

// Marca <html class="js-anim"> antes de pintar, para que los textos del hero no
// «parpadeen» antes de su animación de entrada. Si el JS falla, el CSS los muestra a los 2,5 s.
add_action( 'wp_head', function () {
	echo "<script>document.documentElement.classList.add('js-anim')</script>\n";
}, 0 );
