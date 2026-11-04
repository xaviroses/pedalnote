<?php
/**
 * Sección 6: Tipos de proyecto (transformación). 5 servicios en 2 columnas.
 *
 * @package pedalnote
 */

$pedalnote_col_1 = array(
	array(
		'name' => 'Culture & behaviour change',
		'text' => 'La cultura se juega en lo que pasa cada día. Crear las condiciones para que la seguridad, la colaboración, la innovación o la mirada al cliente cobren vida en conversaciones, decisiones y hábitos compartidos.',
	),
	array(
		'name' => 'Strategy activation',
		'text' => 'Una dirección empieza a mover algo cuando las personas encuentran su lugar en ella. Trabajar con los equipos para darle sentido, hacerla propia y llevarla a las decisiones de cada día.',
	),
);
$pedalnote_col_2 = array(
	array(
		'name' => 'Team integration & high-uncertainty moments',
		'text' => 'Cuando cambia el mapa, también cambia la forma de estar juntos. Abrir conversaciones que permitan a los equipos reconocerse, construir confianza y encontrar un rumbo compartido en fusiones, reorganizaciones y momentos de incertidumbre.',
	),
	array(
		'name' => 'Collective intelligence & alignment',
		'text' => 'Hay conocimiento repartido por toda la organización que rara vez llega a encontrarse. Diseñar espacios de trabajo donde esas miradas se crucen, aparezcan nuevas respuestas y las decisiones puedan construirse entre quienes tendrán que hacerlas realidad.',
	),
	array(
		'name' => 'Commercial transformation',
		'text' => 'Una propuesta cobra valor en la conversación con el cliente. Trabajar con los equipos para que el entendimiento del mercado transforme la forma de escuchar, proponer y vender, y se sostenga en la práctica comercial.',
	),
);
?>
<section class="services services--transformation" id="servicios-transformation" aria-labelledby="servicios-transformation-title">
	<div class="services__media parallax" aria-hidden="true">
		<div class="parallax__layer" data-parallax>
			<?php
			echo pedalnote_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'servicios-transformation',
				'',
				'(max-width: 1023px) and (orientation: portrait) 400vw, (max-width: 767px) 400vw, 100vw'
			);
			?>
		</div>
	</div>

	<div class="services__canvas xd-canvas">
		<p class="side-label side-label--down" aria-hidden="true"<?php echo pedalnote_xy( 1818, 84 ); // phpcs:ignore ?>>
			<span class="side-label__kicker">TRANSFORMATION</span>
			<span class="side-label__line"></span>
			<span class="side-label__title">MAKE IT HAPPEN</span>
		</p>

		<div class="services__col" style="--x:178;--y:55;--w:468">
			<h2 id="servicios-transformation-title" class="services__title">Tipos de proyecto</h2>
			<?php get_template_part( 'template-parts/services-list', null, array( 'items' => $pedalnote_col_1 ) ); ?>
		</div>
		<div class="services__col services__col--side" style="--x:1130;--y:143;--w:528">
			<?php get_template_part( 'template-parts/services-list', null, array( 'items' => $pedalnote_col_2 ) ); ?>
		</div>
	</div>
</section>
