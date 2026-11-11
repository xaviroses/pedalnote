<?php
/**
 * Sección 5: Transformation / Make it Happen.
 *
 * Espejo de Innovation: etiqueta lateral a la derecha (se lee de arriba abajo)
 * y rótulo horizontal arriba. Posiciones en px del XD, relativas a la sección (1920 × 895).
 *
 * @package pedalnote
 */
?>
<section class="concept concept--transformation" id="transformation" aria-labelledby="transformation-title">
	<div class="concept__canvas xd-canvas">
		<?php
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo pedalnote_lettering( 'rotulo-transformation', 598, 96, 'lettering--horizontal', 92, 18 );
		?>

		<h2 id="transformation-title" class="side-label side-label--down"<?php echo pedalnote_xy( 1818, 179 ); // phpcs:ignore ?>>
			<span class="side-label__kicker"><?php echo esc_html( pedalnote_home( 'transformation_kicker' ) ); ?></span>
			<span class="side-label__line" aria-hidden="true"></span>
			<span class="side-label__title"><?php echo esc_html( pedalnote_home( 'transformation_title' ) ); ?></span>
		</h2>

		<p class="concept__lead"<?php echo pedalnote_xy( 235, 188 ); // phpcs:ignore ?>>
			<span class="diagram__bar" aria-hidden="true"></span>
			<span><?php echo esc_html( pedalnote_home( 'transformation_lead' ) ); ?> <strong><?php echo esc_html( pedalnote_home( 'transformation_lead_highlight' ) ); ?></strong></span>
		</p>

		<?php
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		// Posición de cada barra en el XD (fija); los textos salen del campo «transformation_steps».
		echo pedalnote_diagram(
			pedalnote_diagram_steps(
				array(
					array( 'x' => 875, 'y' => 340 ),
					array( 'x' => 525, 'y' => 415 ),
					array( 'x' => 705, 'y' => 513 ),
					array( 'x' => 1130, 'y' => 613, 'side' => 'left', 'long' => true ),
					array( 'x' => 1610, 'y' => 676, 'side' => 'left', 'long' => true ),
				),
				'transformation_steps'
			)
		);
		?>

		<div class="swatches" aria-hidden="true"<?php echo pedalnote_xy( 913, 850 ); // phpcs:ignore ?>>
			<span style="background:var(--color-red)"></span>
			<span style="background:var(--color-sky)"></span>
			<span style="background:var(--color-light-grey)"></span>
			<span style="background:var(--color-yellow)"></span>
			<span style="background:var(--color-green)"></span>
		</div>
	</div>
</section>
