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

		// Suisse Intl solo donde esté su archivo (con licencia): si no, ni se pide.
		if ( file_exists( PEDALNOTE_DIR . '/assets/fonts/suisse-intl-book.woff2' ) ) {
			wp_add_inline_style(
				'pedalnote',
				sprintf(
					"@font-face{font-family:'Suisse Intl';font-style:normal;font-weight:400;font-display:swap;src:url('%s') format('woff2')}",
					esc_url( PEDALNOTE_URI . '/assets/fonts/suisse-intl-book.woff2' )
				)
			);
		}
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

/**
 * Archivo de la fuente principal disponible: Suisse (con licencia) > Inter.
 */
function pedalnote_main_font(): string {
	foreach ( array( 'suisse-intl-book.woff2' ) as $file ) {
		if ( file_exists( PEDALNOTE_DIR . '/assets/fonts/' . $file ) ) {
			return $file;
		}
	}
	return 'inter-400-latin.woff2';
}

// Precarga de la fuente principal (evita el salto de tipografía al cargar).
add_action( 'wp_head', function () {
	printf(
		'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
		esc_url( PEDALNOTE_URI . '/assets/fonts/' . pedalnote_main_font() )
	);
}, 1 );

// Marca <html class="js-anim"> antes de pintar, para que los textos del hero no
// «parpadeen» antes de su animación de entrada. Si el JS falla, el CSS los muestra a los 2,5 s.
add_action( 'wp_head', function () {
	echo "<script>document.documentElement.classList.add('js-anim')</script>\n";
}, 0 );
