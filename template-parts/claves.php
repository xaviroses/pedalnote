<?php
/**
 * Sección 2: Banda de claves.
 *
 * Foto a sangre con parallax (data-parallax) y la lista de claves encima.
 *
 * @package pedalnote
 */
?>
<section class="claves" id="claves" aria-label="Claves">
	<div class="claves__media parallax" aria-hidden="true">
		<div class="parallax__layer" data-parallax>
			<?php
			echo pedalnote_home_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'claves_image',
				'claves',
				'',
				'(max-width: 1023px) and (orientation: portrait) 217vw, (max-width: 767px) 217vw, 100vw',
				array( 'class' => 'claves__photo' )
			);
			?>
		</div>
	</div>

	<p class="claves__text"><?php echo pedalnote_lines( pedalnote_home( 'claves_text' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
</section>
