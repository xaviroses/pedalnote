<?php
/**
 * Sección 4: Tipos de proyecto (innovación).
 *
 * @package pedalnote
 */

$pedalnote_services = array(
	array(
		'name' => 'Human insight & behaviour',
		'text' => 'Investigar lo que las personas hacen, lo que dicen y lo que no siempre saben explicar. Descubrir las tensiones, motivaciones y significados que pueden abrir una nueva posibilidad para el negocio.',
	),
	array(
		'name' => 'Complex systems understanding',
		'text' => 'Mirar más allá de cada pieza para entender qué está pasando entre ellas. Conectar personas, contexto y dinámicas para encontrar dónde se juega realmente el cambio.',
	),
	array(
		'name' => 'New products, services & experiences',
		'text' => 'Dar forma a lo que todavía no existe desde una comprensión profunda de las personas. Co-crear y contrastar productos, servicios y experiencias que encuentren un lugar en su vida.',
	),
	array(
		'name' => 'Future opportunities & strategic direction',
		'text' => 'Leer las señales de lo que está cambiando y explorar qué posibilidades abren. Dar criterio a las apuestas de futuro: dónde hay una oportunidad que merece la pena y qué hacer con ella.',
	),
);
?>
<section class="services services--innovation" id="servicios-innovation" aria-labelledby="servicios-innovation-title">
	<div class="services__media parallax" aria-hidden="true">
		<div class="parallax__layer" data-parallax>
			<?php
			echo pedalnote_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'servicios-innovation',
				'',
				'(max-width: 1023px) and (orientation: portrait) 400vw, (max-width: 767px) 400vw, 100vw'
			);
			?>
		</div>
	</div>

	<div class="services__canvas xd-canvas">
		<p class="side-label" aria-hidden="true"<?php echo pedalnote_xy( 61, 63 ); // phpcs:ignore ?>>
			<span class="side-label__kicker">INNOVATION</span>
			<span class="side-label__line"></span>
			<span class="side-label__title">DEFINING TOMORROW</span>
		</p>

		<div class="services__col"<?php echo pedalnote_xy( 178, 63 ); // phpcs:ignore ?>>
			<h2 id="servicios-innovation-title" class="services__title">Tipos de proyecto</h2>
			<?php get_template_part( 'template-parts/services-list', null, array( 'items' => $pedalnote_services ) ); ?>
		</div>
	</div>
</section>
