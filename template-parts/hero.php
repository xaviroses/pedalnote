<?php
/**
 * Sección 1: Hero.
 *
 * Escritorio: una sola foto a sangre (composición color + B/N del XD).
 * Móvil: la misma foto en dos encuadres apilados (mitad color arriba, mitad B/N abajo),
 * con los textos en columna, como en la pantalla móvil del XD.
 *
 * @package pedalnote
 */

// Igual en las dos <picture> para que solo se descargue un archivo. En vertical, la mitad B/N
// se ve a 263 % del ancho (también en tableta vertical); en horizontal, a sangre.
$pedalnote_hero_sizes = '(max-width: 767px) 263vw, (max-width: 1023px) and (orientation: portrait) 263vw, 100vw';
?>
<section class="hero" id="hero" aria-labelledby="hero-title">
	<div class="hero__media" aria-hidden="true">
		<?php
		echo pedalnote_home_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'hero_image',
			'hero',
			'',
			$pedalnote_hero_sizes,
			array(
				'class'    => 'hero__photo hero__photo--color',
				'priority' => true,
			)
		);
		echo pedalnote_home_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'hero_image',
			'hero',
			'',
			$pedalnote_hero_sizes,
			array( 'class' => 'hero__photo hero__photo--bw' )
		);
		?>
	</div>

	<div class="hero__content">
		<h1 id="hero-title" class="hero__title"><?php echo esc_html( pedalnote_home( 'hero_title' ) ); ?></h1>
		<p class="hero__tagline"><?php echo esc_html( pedalnote_home( 'hero_tagline' ) ); ?></p>

		<p class="hero__intro hero__intro--first"><?php echo pedalnote_lines( pedalnote_home( 'hero_intro_1' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
		<p class="hero__intro hero__intro--mobile"><?php echo pedalnote_lines( pedalnote_home( 'hero_intro_mobile' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
		<p class="hero__intro hero__intro--second"><?php echo pedalnote_lines( pedalnote_home( 'hero_intro_2' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
	</div>

	<?php // Texto incrustado en la foto B/N: se repite aquí para buscadores y lectores de pantalla. ?>
	<p class="visually-hidden"><?php echo esc_html( pedalnote_home( 'hero_photo_text' ) ); ?></p>
</section>
