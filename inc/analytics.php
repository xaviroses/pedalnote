<?php
/**
 * Google Analytics 4 (gtag.js), con el modo de consentimiento de Google.
 *
 * - El ID de medición NO va en el repositorio: se define en el wp-config.php del servidor
 *   ( define( 'PEDALNOTE_GA_ID', 'G-XXXXXXXXXX' ); ). Sin él (p. ej. en local) no se carga nada.
 * - CookieYes (con «Google Consent Mode» activado) declara antes, en wp_head prioridad 1,
 *   el consentimiento por defecto «denegado» y lo actualiza cuando el visitante acepta.
 *   Mientras no acepte la categoría de analítica, GA no guarda cookies.
 * - No se mide a los usuarios con sesión iniciada (editores y administradores).
 *
 * @package pedalnote
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_head', function () {
	$id = defined( 'PEDALNOTE_GA_ID' ) ? (string) PEDALNOTE_GA_ID : '';
	if ( ! preg_match( '/^G-[A-Z0-9]+$/', $id ) || is_user_logged_in() ) {
		return;
	}
	?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $id ); ?>"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', '<?php echo esc_js( $id ); ?>');
</script>
	<?php
}, 5 );
