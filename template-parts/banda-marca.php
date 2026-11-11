<?php
/**
 * Sección 8: Banda de marca. Foto de la cinta con «PEDALNOTE» escrito a mano (con parallax).
 *
 * @package pedalnote
 */
?>
<section class="brand" id="banda-marca" aria-label="Pedal Note">
	<div class="brand__media parallax">
		<div class="parallax__layer" data-parallax>
			<?php
			echo pedalnote_home_picture( 'brand_image', 'banda-marca', (string) pedalnote_home( 'brand_alt' ), '100vw' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</div>
	</div>
</section>
