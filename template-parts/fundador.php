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
			echo pedalnote_picture( 'fundador', '', '(max-width: 1023px) and (orientation: portrait) 360vw, (max-width: 767px) 360vw, 100vw' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</div>
	</div>

	<div class="founder__canvas xd-canvas">
		<div class="founder__bio"<?php echo pedalnote_xy( 267, 110 ); // phpcs:ignore ?>>
			<h2 id="fundador-title" class="visually-hidden">Coe Lejarza</h2>
			<p class="founder__lead">Coe Lejarza es fundador de Pedal Note y lleva más de veinte años trabajando en innovación, estrategia y transformación.</p>
			<p>Ingeniero químico de formación, empezó su trayectoria profesional en Siemens, pasó después por la publicidad y acabó encontrando su sitio en la consultoría. Desde entonces ha trabajado con organizaciones y sectores muy diversos, desde farma a utilities, desde aerolíneas a fabricantes de cerveza, de ONGs a empresas de joyería.</p>
			<p>A lo largo de su carrera ha trabajado con equipos internacionales y multidisciplinares, combinando cosas que no siempre aparecen juntas: negocio y ciencias sociales, estrategia y creatividad, investigación y activación, pensamiento y movimiento.</p>
			<p>De ahí nace Pedal Note: una forma de ayudar a organizaciones y equipos a identificar qué importa, definir qué viene y activar a las personas para convertir las decisiones en una realidad compartida.</p>
			<p>Compagina su actividad profesional con la docencia en EADA Business School. Y una forma humana de hacer que las cosas se muevan.</p>
		</div>
	</div>
</section>
