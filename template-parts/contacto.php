<?php
/**
 * Sección 10: Contacto (pie).
 *
 * Igual en todas las pantallas: fondo blanco con la franja negra «Parlem?» y los
 * datos de contacto; debajo, centrados, los enlaces a los textos legales.
 *
 * @package pedalnote
 */

// Datos de contacto: campos de la portada (pestaña «10 · Contacto»). También salen en las páginas legales.
$pedalnote_email    = sanitize_email( (string) pedalnote_home( 'contact_email' ) );
$pedalnote_phone    = trim( (string) pedalnote_home( 'contact_phone' ) );
$pedalnote_tel      = preg_replace( '/[^\d+]/', '', $pedalnote_phone ); // enlace para llamar: solo dígitos y +
$pedalnote_linkedin = (string) pedalnote_home( 'contact_linkedin' );

$pedalnote_legal = array(
	'aviso-legal'            => 'Aviso legal',
	'politica-de-privacidad' => 'Política de privacidad',
	'politica-de-cookies'    => 'Política de cookies',
);
?>
<section class="contact" id="contacto" aria-labelledby="contacto-title">
	<div class="contact__bar">
		<h2 id="contacto-title" class="contact__title"><?php echo esc_html( pedalnote_home( 'contact_title' ) ); ?></h2>
		<ul class="contact__list" role="list">
			<?php if ( $pedalnote_email ) : ?>
				<li><a href="mailto:<?php echo esc_attr( $pedalnote_email ); ?>"><?php echo esc_html( $pedalnote_email ); ?></a></li>
			<?php endif; ?>
			<?php if ( $pedalnote_phone ) : ?>
				<li><a href="tel:<?php echo esc_attr( $pedalnote_tel ); ?>"><?php echo esc_html( $pedalnote_phone ); ?></a></li>
			<?php endif; ?>
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
