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
		echo pedalnote_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'hero',
			'',
			$pedalnote_hero_sizes,
			array(
				'class'    => 'hero__photo hero__photo--color',
				'priority' => true,
			)
		);
		echo pedalnote_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'hero',
			'',
			$pedalnote_hero_sizes,
			array( 'class' => 'hero__photo hero__photo--bw' )
		);
		?>
	</div>

	<div class="hero__content">
		<h1 id="hero-title" class="hero__title">Innovation&amp;Transformation</h1>
		<p class="hero__tagline">We help organisations understand what matters, define what comes next and make it happen.</p>

		<p class="hero__intro hero__intro--first">Nos adaptamos a la frecuencia de cada cliente: a sus retos, su contexto y su cultura.</p>
		<p class="hero__intro hero__intro--mobile">Defining Tomorrow — identificar qué importa y definir qué viene.<br>Make it Happen — activar a las personas para convertir las decisiones en una realidad compartida.</p>
		<p class="hero__intro hero__intro--second">Combinamos innovación, estrategia y transformación desde una mirada humana, curiosa y práctica.</p>
	</div>

	<?php // Texto incrustado en la foto B/N: se repite aquí para buscadores y lectores de pantalla. ?>
	<p class="visually-hidden">nota pedal: acorde, nota sostenida que ayuda a impulsarlo o a cambiarlo de una forma suave; llevarlo más allá o ser el punto de apoyo para que cambie.</p>
</section>
