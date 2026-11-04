<?php
/**
 * Sección 7: Selected Work («Notes from real projects.»).
 *
 * 6 casos en rejilla asimétrica. x/y = esquina del rectángulo de color en el XD
 * (relativa a la sección, 1920 × 1199); el texto va centrado debajo (61 px).
 *
 * @package pedalnote
 */

$pedalnote_cases = array(
	array(
		'x'     => 338,
		'y'     => 194,
		'color' => 'red',
		'name'  => 'Banc Sabadell · Zurich',
		'claim' => 'When the channel isn’t the real question.',
		'text'  => 'Ayudando a incorporar la perspectiva del cliente en la definición de productos, servicios y canales aseguradores — desde protección y salud hasta ahorro para la jubilación y experiencia digital.',
	),
	array(
		'x'     => 911,
		'y'     => 118,
		'color' => 'sky',
		'name'  => 'Holaluz',
		'claim' => 'Understand first. Sell differently afterwards.',
		'text'  => 'Una colaboración continuada alrededor de la comprensión del cliente, la propuesta de valor, nuevos productos, la experiencia comercial y formas concretas de llevar el customer centricity al negocio.',
	),
	array(
		'x'     => 1512,
		'y'     => 251,
		'color' => 'light-grey',
		'name'  => 'Vidal & Vidal',
		'claim' => 'Jewellery doesn’t just decorate a moment. It gives it meaning.',
		'text'  => 'Entendiendo cómo la identidad, los rituales y los momentos de vida moldean el significado, la elección y la experiencia de la joyería.',
	),
	array(
		'x'     => 941,
		'y'     => 603,
		'color' => 'green',
		'name'  => 'Verifait / Wardians',
		'claim' => 'The technology was already there. The value wasn’t visible yet',
		'text'  => 'Convirtiendo capacidades complejas de vídeo e inteligencia artificial en una propuesta más clara, ofertas específicas por sector y un modelo comercial más accionable.',
	),
	array(
		'x'     => 451,
		'y'     => 735,
		'color' => 'yellow',
		'name'  => 'Codorníu',
		'claim' => 'People don’t consume categories. They live moments.',
		'text'  => 'Explorando personas, ocasiones y contextos para descubrir nuevas oportunidades de consumo y convertirlas en ideas de producto, experiencia y comunicación.',
	),
	array(
		'x'     => 1394,
		'y'     => 735,
		'color' => 'red',
		'name'  => 'Exide Technologies',
		'claim' => 'From safety as a priority to safety as a way of leading.',
		'text'  => 'Ayudando a que la seguridad pase de la política a la cultura a través del liderazgo, el aprendizaje compartido, la experimentación local y prácticas capaces de extenderse entre plantas.',
	),
);
?>
<section class="work" id="selected-work" aria-labelledby="selected-work-title">
	<div class="work__media parallax" aria-hidden="true">
		<div class="parallax__layer" data-parallax>
			<?php
			// Fondo desenfocado: basta con una resolución menor que la pantalla.
			echo pedalnote_picture( 'selected-work', '', '(max-width: 1023px) 100vw, 60vw' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</div>
	</div>

	<div class="work__canvas xd-canvas">
		<header class="work__header"<?php echo pedalnote_xy( 117, 49 ); // phpcs:ignore ?>>
			<h2 id="selected-work-title" class="work__title">Selected work</h2>
			<p class="work__subtitle">Notes from real projects.</p>
		</header>

		<ul class="work__list" role="list">
			<?php foreach ( $pedalnote_cases as $pedalnote_case ) : ?>
				<li class="work__case"<?php echo pedalnote_xy( $pedalnote_case['x'], $pedalnote_case['y'] ); // phpcs:ignore ?>>
					<span class="work__swatch" style="background:var(--color-<?php echo esc_attr( $pedalnote_case['color'] ); ?>)" aria-hidden="true"></span>
					<h3 class="work__name"><?php echo esc_html( $pedalnote_case['name'] ); ?></h3>
					<p class="work__claim"><?php echo esc_html( $pedalnote_case['claim'] ); ?></p>
					<p class="work__text"><?php echo esc_html( $pedalnote_case['text'] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
