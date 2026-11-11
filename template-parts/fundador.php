<?php
/**
 * Sección 9: Fundador (bio de Coe Lejarza sobre foto).
 *
 * @package pedalnote
 */
?>
<section class="founder" id="fundador" aria-labelledby="fundador-title">
	<div class="founder__media parallax" aria-hidden="true">
		<div class="parallax__layer" data-parallax>
			<?php
			echo pedalnote_home_picture( 'founder_image', 'fundador', '', '(max-width: 1023px) and (orientation: portrait) 360vw, (max-width: 767px) 360vw, 100vw' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</div>
	</div>

	<div class="founder__canvas xd-canvas">
		<div class="founder__bio"<?php echo pedalnote_xy( 267, 110 ); // phpcs:ignore ?>>
			<h2 id="fundador-title" class="visually-hidden"><?php echo esc_html( pedalnote_home( 'founder_name' ) ); ?></h2>
			<p class="founder__lead"><?php echo pedalnote_lines( pedalnote_home( 'founder_lead' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php echo pedalnote_paragraphs( pedalnote_home( 'founder_bio' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
	</div>
</section>
