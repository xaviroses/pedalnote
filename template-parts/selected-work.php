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

// Sitio de cada caso en la rejilla (del XD, fijo), en orden de lectura. El contenido
// (color, cliente, frase y texto) sale del campo «work_cases», en el mismo orden.
$pedalnote_layout = array(
	array( 'col' => 1, 'dx' => 84, 'mt' => 76, 'x' => 338 ),
	array( 'col' => 2, 'dx' => 87, 'mt' => 0, 'x' => 911 ),
	array( 'col' => 3, 'dx' => 118, 'mt' => 133, 'x' => 1512 ),
	array( 'col' => 2, 'dx' => 117, 'mt' => 61, 'x' => 941 ),
	array( 'col' => 1, 'dx' => 197, 'mt' => 143, 'x' => 451 ),
	array( 'col' => 3, 'dx' => 0, 'mt' => 112, 'x' => 1394 ),
);
$pedalnote_colors = array( 'red', 'sky', 'light-grey', 'yellow', 'green' );

$pedalnote_cases = array();
foreach ( array_values( (array) pedalnote_home( 'work_cases' ) ) as $pedalnote_i => $pedalnote_case ) {
	if ( ! isset( $pedalnote_layout[ $pedalnote_i ] ) ) {
		break;
	}
	$pedalnote_case['order'] = $pedalnote_i + 1;
	$pedalnote_case['color'] = in_array( $pedalnote_case['color'] ?? '', $pedalnote_colors, true ) ? $pedalnote_case['color'] : 'red';
	$pedalnote_cases[]       = $pedalnote_layout[ $pedalnote_i ] + $pedalnote_case;
}

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
			echo pedalnote_home_picture( 'work_image', 'selected-work', '', '(max-width: 899px) 230vw, 100vw' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</div>
	</div>

	<div class="work__canvas">
		<header class="work__header">
			<h2 id="selected-work-title" class="work__title"><?php echo esc_html( pedalnote_home( 'work_title' ) ); ?></h2>
			<p class="work__subtitle"><?php echo esc_html( pedalnote_home( 'work_subtitle' ) ); ?></p>
		</header>

		<div class="work__grid">
			<?php foreach ( $pedalnote_cols as $pedalnote_col ) : ?>
				<ul class="work__col" role="list">
					<?php foreach ( $pedalnote_col as $pedalnote_case ) : ?>
						<li class="work__case<?php echo 0 === $pedalnote_case['order'] % 2 ? ' work__case--even' : ''; ?>" style="<?php echo esc_attr( sprintf( '--dx:%d;--mt:%d;--x:%d;order:%d', $pedalnote_case['dx'], $pedalnote_case['mt'], $pedalnote_case['x'], $pedalnote_case['order'] ) ); ?>">
							<span class="work__swatch" style="background:var(--color-<?php echo esc_attr( $pedalnote_case['color'] ); ?>)" aria-hidden="true"></span>
							<h3 class="work__name"><?php echo esc_html( $pedalnote_case['name'] ?? '' ); ?></h3>
							<p class="work__claim"><?php echo esc_html( $pedalnote_case['claim'] ?? '' ); ?></p>
							<p class="work__text"><?php echo pedalnote_lines( (string) ( $pedalnote_case['text'] ?? '' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endforeach; ?>
		</div>
	</div>
</section>
