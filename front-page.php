<?php
/**
 * One page: monta los parciales en orden.
 *
 * @package pedalnote
 */

get_header();
?>
<main id="main">
	<?php
	$pedalnote_sections = array(
		'hero',
		'claves',
		'innovation',
		'servicios-innovation',
		'transformation',
		'servicios-transformation',
		'selected-work',
		'banda-marca',
		'fundador',
		'contacto',
	);
	foreach ( $pedalnote_sections as $pedalnote_section ) {
		get_template_part( 'template-parts/' . $pedalnote_section );
	}
	?>
</main>
<?php
get_footer();
