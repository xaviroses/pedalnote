<?php
/**
 * Marca: favicon (web, escritorio de WP y acceso) y logo en la pantalla de acceso.
 *
 * Favicon: la «P» del sello PEDALNOTE en blanco sobre negro (assets/svg/favicon.svg),
 * con PNG de respaldo y icono para la pantalla de inicio de iOS.
 *
 * @package pedalnote
 */

defined( 'ABSPATH' ) || exit;

/**
 * Etiquetas <link> del favicon. Si se define un «Icono del sitio» en Ajustes, manda ese.
 */
function pedalnote_favicon_links(): void {
	if ( has_site_icon() ) {
		return;
	}
	$uri = PEDALNOTE_URI . '/assets';
	printf( '<link rel="icon" href="%s" type="image/svg+xml">' . "\n", esc_url( $uri . '/svg/favicon.svg' ) );
	printf( '<link rel="icon" href="%s" type="image/png" sizes="32x32">' . "\n", esc_url( $uri . '/img/favicon-32.png' ) );
	printf( '<link rel="apple-touch-icon" href="%s">' . "\n", esc_url( $uri . '/img/apple-touch-icon.png' ) );
}
add_action( 'wp_head', 'pedalnote_favicon_links', 2 );
add_action( 'admin_head', 'pedalnote_favicon_links' );
add_action( 'login_head', 'pedalnote_favicon_links' );

// Logo de la pantalla de acceso: el sello del XD (negro, letras caladas).
add_action(
	'login_enqueue_scripts',
	function () {
		$logo = PEDALNOTE_URI . '/assets/svg/sello.svg';
		?>
		<style>
			#login h1 a,
			.login h1 a {
				width: 292px;
				max-width: 100%;
				height: 60px;
				background: url(<?php echo esc_url( $logo ); ?>) center / contain no-repeat;
			}
		</style>
		<?php
	}
);

// El logo enlaza a la web (no a wordpress.org) y se anuncia con el nombre del sitio.
add_filter( 'login_headerurl', static fn() => home_url( '/' ) );
add_filter( 'login_headertext', static fn() => get_bloginfo( 'name' ) );
