<?php
/**
 * Sección 10: Contacto.
 *
 * Escritorio: barra negra «Parlem?» + email, teléfono y LinkedIn.
 * Móvil (pantalla 2 del XD): email y teléfono sobre la foto del brazo.
 *
 * @package pedalnote
 */

// Pendiente: URL exacta de LinkedIn (ver CLAUDE.md). Mientras esté vacía, se muestra sin enlace.
$pedalnote_linkedin = '';
?>
<section class="contact" id="contacto" aria-labelledby="contacto-title">
	<div class="contact__media" aria-hidden="true">
		<?php
		// Misma foto y mismo sizes que la banda de claves: en móvil no se descarga dos veces.
		echo pedalnote_picture( 'claves', '', '(max-width: 1023px) and (orientation: portrait) 217vw, (max-width: 767px) 217vw, 100vw', array( 'class' => 'contact__photo' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>
	</div>

	<div class="contact__bar">
		<h2 id="contacto-title" class="contact__title">Parlem?</h2>
		<ul class="contact__list" role="list">
			<li><a href="mailto:coe@pedalnote.co">coe@pedalnote.co</a></li>
			<li><a href="tel:+34625976453">+34 625 97 64 53</a></li>
			<li class="contact__linkedin">
				<?php if ( $pedalnote_linkedin ) : ?>
					<a href="<?php echo esc_url( $pedalnote_linkedin ); ?>" target="_blank" rel="noopener">Linkedin</a>
				<?php else : ?>
					Linkedin
				<?php endif; ?>
			</li>
		</ul>
	</div>
</section>
