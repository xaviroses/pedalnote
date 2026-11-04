<?php
/**
 * Sección 7: Selected Work («Notes from real projects.»).
 *
 * 6 casos en rejilla asimétrica, en 3 columnas (2 casos por columna) que fluyen:
 * nunca se solapan. Rectángulo 97 × 122 centrado 61 px sobre un texto de 372 px.
 *
 * Por caso (medidas del XD a 1920):
 *   col   = columna en escritorio (1–3)
 *   dx    = desplazamiento horizontal dentro de su columna
 *   mt    = espacio por encima (primer caso: desde la línea base; segundo: desde el caso anterior)
 *   order = orden de lectura del XD (filas), usado en 1 y 2 columnas
 *   x     = posición x del rectángulo en el XD (escalera en móvil)
 *
 * @package pedalnote
 */

$pedalnote_cases = array(
	array(
		'col'   => 1,
		'dx'    => 84,
		'mt'    => 76,
		'order' => 1,
		'x'     => 338,
		'color' => 'red',
		'name'  => 'Banc Sabadell · Zurich',
		'claim' => 'When the channel isn’t the real question.',
		'text'  => 'Ayudando a incorporar la perspectiva del cliente en la definición de productos, servicios y canales aseguradores — desde protección y salud hasta ahorro para la jubilación y experiencia digital.',
	),
	array(
		'col'   => 2,
		'dx'    => 87,
		'mt'    => 0,
		'order' => 2,
		'x'     => 911,
		'color' => 'sky',
		'name'  => 'Holaluz',
		'claim' => 'Understand first. Sell differently afterwards.',
		'text'  => 'Una colaboración continuada alrededor de la comprensión del cliente, la propuesta de valor, nuevos productos, la experiencia comercial y formas concretas de llevar el customer centricity al negocio.',
	),
	array(
		'col'   => 3,
		'dx'    => 118,
		'mt'    => 133,
		'order' => 3,
		'x'     => 1512,
		'color' => 'light-grey',
		'name'  => 'Vidal & Vidal',
		'claim' => 'Jewellery doesn’t just decorate a moment. It gives it meaning.',
		'text'  => 'Entendiendo cómo la identidad, los rituales y los momentos de vida moldean el significado, la elección y la experiencia de la joyería.',
	),
	array(
		'col'   => 2,
		'dx'    => 117,
		'mt'    => 61,
		'order' => 4,
		'x'     => 941,
		'color' => 'green',
		'name'  => 'Verifait / Wardians',
		'claim' => 'The technology was already there. The value wasn’t visible yet',
		'text'  => 'Convirtiendo capacidades complejas de vídeo e inteligencia artificial en una propuesta más clara, ofertas específicas por sector y un modelo comercial más accionable.',
	),
	array(
		'col'   => 1,
		'dx'    => 197,
		'mt'    => 143,
		'order' => 5,
		'x'     => 451,
		'color' => 'yellow',
		'name'  => 'Codorníu',
		'claim' => 'People don’t consume categories. They live moments.',
		'text'  => 'Explorando personas, ocasiones y contextos para descubrir nuevas oportunidades de consumo y convertirlas en ideas de producto, experiencia y comunicación.',
	),
	array(
		'col'   => 3,
		'dx'    => 0,
		'mt'    => 112,
		'order' => 6,
		'x'     => 1394,
		'color' => 'red',
		'name'  => 'Exide Technologies',
		'claim' => 'From safety as a priority to safety as a way of leading.',
		'text'  => 'Ayudando a que la seguridad pase de la política a la cultura a través del liderazgo, el aprendizaje compartido, la experimentación local y prácticas capaces de extenderse entre plantas.',
	),
);

// Agrupados por columna (en el orden del array dentro de cada columna).
$pedalnote_cols = array( 1 => array(), 2 => array(), 3 => array() );
foreach ( $pedalnote_cases as $pedalnote_case ) {
	$pedalnote_cols[ $pedalnote_case['col'] ][] = $pedalnote_case;
}
?>
<section class="work" id="selected-work" aria-labelledby="selected-work-title">
	<div class="work__media parallax" aria-hidden="true">
		<div class="parallax__layer" data-parallax>
			<?php
			// Fondo desenfocado. En móvil la foto (fija al alto de pantalla) se ve a ~230 % del ancho.
			echo pedalnote_picture( 'selected-work', '', '(max-width: 899px) 230vw, 100vw' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</div>
	</div>

	<div class="work__canvas">
		<header class="work__header">
			<h2 id="selected-work-title" class="work__title">Selected work</h2>
			<p class="work__subtitle">Notes from real projects.</p>
		</header>

		<div class="work__grid">
			<?php foreach ( $pedalnote_cols as $pedalnote_col ) : ?>
				<ul class="work__col" role="list">
					<?php foreach ( $pedalnote_col as $pedalnote_case ) : ?>
						<li class="work__case<?php echo 0 === $pedalnote_case['order'] % 2 ? ' work__case--even' : ''; ?>" style="<?php echo esc_attr( sprintf( '--dx:%d;--mt:%d;--x:%d;order:%d', $pedalnote_case['dx'], $pedalnote_case['mt'], $pedalnote_case['x'], $pedalnote_case['order'] ) ); ?>">
							<span class="work__swatch" style="background:var(--color-<?php echo esc_attr( $pedalnote_case['color'] ); ?>)" aria-hidden="true"></span>
							<h3 class="work__name"><?php echo esc_html( $pedalnote_case['name'] ); ?></h3>
							<p class="work__claim"><?php echo esc_html( $pedalnote_case['claim'] ); ?></p>
							<p class="work__text"><?php echo esc_html( $pedalnote_case['text'] ); ?></p>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endforeach; ?>
		</div>
	</div>
</section>
