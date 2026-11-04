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
			<span class="side-label__kicker">INNOVATION</span>
			<span class="side-label__line" aria-hidden="true"></span>
			<span class="side-label__title">DEFINING TOMORROW</span>
		</h2>

		<p class="concept__lead"<?php echo pedalnote_xy( 268, 219 ); // phpcs:ignore ?>>
			<span class="diagram__bar" aria-hidden="true"></span>
			<span>From Entender lo que importa to <strong>DEFINIR LO QUE VIENE.</strong></span>
		</p>

		<?php
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo pedalnote_diagram(
			array(
				array( 'label' => 'INVESTIGAR', 'x' => 759, 'y' => 315 ),
				array( 'label' => 'CONTRASTAR', 'x' => 648, 'y' => 365 ),
				array( 'label' => 'Propuesta de VALOR', 'x' => 1354, 'y' => 435, 'side' => 'left' ),
				array( 'label' => 'CO-CREAR', 'x' => 400, 'y' => 479 ),
				array( 'label' => 'Producto o servicio', 'x' => 1462, 'y' => 479, 'side' => 'left' ),
				array( 'label' => 'Experiencia', 'x' => 1293, 'y' => 594, 'side' => 'left' ),
				array( 'label' => 'Estrategia', 'x' => 1121, 'y' => 694, 'side' => 'left' ),
			)
		);

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo pedalnote_lettering( 'rotulo-innovation', 114, 513, 'lettering--vertical', 1788, 498 );
		?>
	</div>
</section>
