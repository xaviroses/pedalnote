<?php
/**
 * Sección 10: Contacto (pie).
 *
 * Igual en todas las pantallas: fondo blanco con la franja negra «Parlem?» y los
 * datos de contacto; debajo, centrados, los enlaces a los textos legales.
 *
 * @package pedalnote
 */

// Pendiente: URL exacta de LinkedIn (ver CLAUDE.md). Mientras esté vacía, se muestra sin enlace.
$pedalnote_linkedin = '';

$pedalnote_legal = array(
	'aviso-legal'            => 'Aviso legal',
	'politica-de-privacidad' => 'Política de privacidad',
	'politica-de-cookies'    => 'Política de cookies',
);
?>
<section class="contact" id="contacto" aria-labelledby="contacto-title">
	<div class="contact__bar">
		<h2 id="contacto-title" class="contact__title">Parlem?</h2>
		<ul class="contact__list" role="list">
			<li><a href="mailto:coe@pedalnote.co">coe@pedalnote.co</a></li>
			<li><a href="tel:+34625976453">+34 625 97 64 53</a></li>
			<li>
				<?php if ( $pedalnote_linkedin ) : ?>
					<a href="<?php echo esc_url( $pedalnote_linkedin ); ?>" target="_blank" rel="noopener">Linkedin</a>
				<?php else : ?>
					Linkedin
				<?php endif; ?>
			</li>
		</ul>
	</div>

	<nav class="contact__legal" aria-label="Textos legales">
		<ul role="list">
			<?php foreach ( $pedalnote_legal as $pedalnote_slug => $pedalnote_label ) : ?>
				<li><a href="<?php echo esc_url( home_url( '/' . $pedalnote_slug . '/' ) ); ?>"><?php echo esc_html( $pedalnote_label ); ?></a></li>
			<?php endforeach; ?>
		</ul>
	</nav>
</section>
