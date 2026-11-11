<?php
/**
 * Sección 6: Tipos de proyecto (transformación). 5 servicios en 2 columnas.
 *
 * @package pedalnote
 */

$pedalnote_col_1 = pedalnote_home( 'services_transformation_items' );
$pedalnote_col_2 = pedalnote_home( 'services_transformation_items_2' );
?>
<section class="services services--transformation" id="servicios-transformation" aria-labelledby="servicios-transformation-title">
	<div class="services__media parallax" aria-hidden="true">
		<div class="parallax__layer" data-parallax>
			<?php
			echo pedalnote_home_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'services_transformation_image',
				'servicios-transformation',
				'',
				'(max-width: 1023px) and (orientation: portrait) 400vw, (max-width: 767px) 400vw, 100vw'
			);
			?>
		</div>
	</div>

	<div class="services__canvas xd-canvas">
		<p class="side-label side-label--down" aria-hidden="true"<?php echo pedalnote_xy( 1818, 84 ); // phpcs:ignore ?>>
			<span class="side-label__kicker"><?php echo esc_html( pedalnote_home( 'transformation_kicker' ) ); ?></span>
			<span class="side-label__line"></span>
			<span class="side-label__title"><?php echo esc_html( pedalnote_home( 'transformation_title' ) ); ?></span>
		</p>

		<div class="services__col" style="--x:178;--y:55;--w:468">
			<h2 id="servicios-transformation-title" class="services__title"><?php echo esc_html( pedalnote_home( 'services_transformation_title' ) ); ?></h2>
			<?php get_template_part( 'template-parts/services-list', null, array( 'items' => $pedalnote_col_1 ) ); ?>
		</div>
		<div class="services__col services__col--side" style="--x:1130;--y:143;--w:528">
			<?php get_template_part( 'template-parts/services-list', null, array( 'items' => $pedalnote_col_2 ) ); ?>
		</div>
	</div>
</section>
