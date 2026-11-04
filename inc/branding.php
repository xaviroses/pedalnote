<?php
/**
 * Marca: favicon (web, escritorio de WP y acceso) y logo en la pantalla de acceso.
 *
 * Favicon: cuadrado blanco con la «P» del sello calada/transparente (assets/svg/favicon.svg),
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
	// ?ver=fecha del archivo: se renuevan solos si se regeneran (los navegadores cachean mucho el favicon)
	$url = static fn( $rel ) => PEDALNOTE_URI . '/assets/' . $rel . '?ver=' . pedalnote_asset_ver( 'assets/' . $rel );
	printf( '<link rel="icon" href="%s" type="image/svg+xml">' . "\n", esc_url( $url( 'svg/favicon.svg' ) ) );
	printf( '<link rel="icon" href="%s" type="image/png" sizes="32x32">' . "\n", esc_url( $url( 'img/favicon-32.png' ) ) );
	printf( '<link rel="apple-touch-icon" href="%s">' . "\n", esc_url( $url( 'img/apple-touch-icon.png' ) ) );
}
add_action( 'wp_head', 'pedalnote_favicon_links', 2 );
add_action( 'admin_head', 'pedalnote_favicon_links' );
add_action( 'login_head', 'pedalnote_favicon_links' );

// Logo de la pantalla de acceso: el sello del XD (blanco, letras caladas), 167 px.
add_action(
	'login_enqueue_scripts',
	function () {
		$logo = PEDALNOTE_URI . '/assets/svg/sello.svg?ver=' . pedalnote_asset_ver( 'assets/svg/sello.svg' );
		?>
		<style>
			#login h1 a,
			.login h1 a {
				width: 167px;
				height: 34px;
				background: url(<?php echo esc_url( $logo ); ?>) center / contain no-repeat;
			}
		</style>
		<?php
	}
);

// El logo enlaza a la web (no a wordpress.org) y se anuncia con el nombre del sitio.
add_filter( 'login_headerurl', static fn() => home_url( '/' ) );
add_filter( 'login_headertext', static fn() => get_bloginfo( 'name' ) );
