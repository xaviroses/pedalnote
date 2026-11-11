<?php
/**
 * Sección 3: Innovation / Defining Tomorrow.
 *
 * Posiciones (--x / --y) en px del XD, relativas a la sección (1920 × 806).
 *
 * @package pedalnote
 */
?>
<section class="concept concept--innovation" id="innovation" aria-labelledby="innovation-title">
	<div class="concept__canvas xd-canvas">
		<h2 id="innovation-title" class="side-label"<?php echo pedalnote_xy( 61, 84 ); // phpcs:ignore ?>>
			<span class="side-label__kicker"><?php echo esc_html( pedalnote_home( 'innovation_kicker' ) ); ?></span>
			<span class="side-label__line" aria-hidden="true"></span>
			<span class="side-label__title"><?php echo esc_html( pedalnote_home( 'innovation_title' ) ); ?></span>
		</h2>

		<p class="concept__lead"<?php echo pedalnote_xy( 268, 219 ); // phpcs:ignore ?>>
			<span class="diagram__bar" aria-hidden="true"></span>
			<span><?php echo esc_html( pedalnote_home( 'innovation_lead' ) ); ?> <strong><?php echo esc_html( pedalnote_home( 'innovation_lead_highlight' ) ); ?></strong></span>
		</p>

		<?php
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		// Posición de cada barra en el XD (fija); los textos salen del campo «innovation_steps».
		echo pedalnote_diagram(
			pedalnote_diagram_steps(
				array(
					array( 'x' => 759, 'y' => 315 ),
					array( 'x' => 648, 'y' => 365 ),
					array( 'x' => 1354, 'y' => 435, 'side' => 'left' ),
					array( 'x' => 400, 'y' => 479 ),
					array( 'x' => 1462, 'y' => 479, 'side' => 'left' ),
					array( 'x' => 1293, 'y' => 594, 'side' => 'left' ),
					array( 'x' => 1121, 'y' => 694, 'side' => 'left' ),
				),
				'innovation_steps'
			)
		);

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo pedalnote_lettering( 'rotulo-innovation', 114, 513, 'lettering--vertical', 1788, 498 );
		?>
	</div>
</section>
