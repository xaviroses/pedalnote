<?php
/**
 * Google Analytics 4 (gtag.js), con el modo de consentimiento de Google.
 *
 * - El ID de medición NO va en el repositorio: se define en el wp-config.php del servidor
 *   ( define( 'PEDALNOTE_GA_ID', 'G-XXXXXXXXXX' ); ). Sin él (p. ej. en local) no se carga nada.
 * - Modo de consentimiento de Google: por defecto todo «denegado»; se concede la analítica
 *   solo si el visitante la acepta en CookieYes (cookie «cookieyes-consent» al cargar, y el
 *   evento «cookieyes_consent_update» cuando cambia). Mientras no acepte, GA no guarda cookies.
 *   (El modo de consentimiento propio de CookieYes solo funciona con la cuenta conectada;
 *   si algún día se conecta y se activa ahí, quitar el bloque de consentimiento de aquí.)
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
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
(function () {
	function analyticsOk() {
		try {
			if (typeof window.getCkyConsent === 'function') {
				var c = window.getCkyConsent();
				if (c && c.categories) { return !!c.categories.analytics; }
			}
		} catch (e) {}
		var m = document.cookie.match(/(?:^|; )cookieyes-consent=([^;]*)/);
		return !!(m && /(^|,)analytics:yes(,|$)/.test(decodeURIComponent(m[1])));
	}
	var denied = { ad_storage: 'denied', ad_user_data: 'denied', ad_personalization: 'denied', analytics_storage: 'denied' };
	gtag('consent', 'default', Object.assign({ wait_for_update: 500 }, denied));
	if (analyticsOk()) { gtag('consent', 'update', { analytics_storage: 'granted' }); }
	document.addEventListener('cookieyes_consent_update', function () {
		gtag('consent', 'update', { analytics_storage: analyticsOk() ? 'granted' : 'denied' });
	});
})();
gtag('js', new Date());
gtag('config', '<?php echo esc_js( $id ); ?>');
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $id ); ?>"></script>
	<?php
}, 5 );
