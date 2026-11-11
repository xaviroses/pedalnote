<?php
/**
 * Sección 4: Tipos de proyecto (innovación).
 *
 * @package pedalnote
 */

$pedalnote_services = pedalnote_home( 'services_innovation_items' );
?>
<section class="services services--innovation" id="servicios-innovation" aria-labelledby="servicios-innovation-title">
	<div class="services__media parallax" aria-hidden="true">
		<div class="parallax__layer" data-parallax>
			<?php
			echo pedalnote_home_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'services_innovation_image',
				'servicios-innovation',
				'',
				'(max-width: 1023px) and (orientation: portrait) 400vw, (max-width: 767px) 400vw, 100vw'
			);
			?>
		</div>
	</div>

	<div class="services__canvas xd-canvas">
		<p class="side-label" aria-hidden="true"<?php echo pedalnote_xy( 61, 63 ); // phpcs:ignore ?>>
			<span class="side-label__kicker"><?php echo esc_html( pedalnote_home( 'innovation_kicker' ) ); ?></span>
			<span class="side-label__line"></span>
			<span class="side-label__title"><?php echo esc_html( pedalnote_home( 'innovation_title' ) ); ?></span>
		</p>

		<div class="services__col"<?php echo pedalnote_xy( 178, 63 ); // phpcs:ignore ?>>
			<h2 id="servicios-innovation-title" class="services__title"><?php echo esc_html( pedalnote_home( 'services_innovation_title' ) ); ?></h2>
			<?php get_template_part( 'template-parts/services-list', null, array( 'items' => $pedalnote_services ) ); ?>
		</div>
	</div>
</section>
