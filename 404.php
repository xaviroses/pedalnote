<?php
/**
 * Página no encontrada (404): mismo esquema que las páginas legales.
 *
 * @package pedalnote
 */

get_header();
?>
<main id="main" class="inner">
	<div class="inner__content">
		<h1 class="inner__title">Página no encontrada</h1>
		<p>La página que buscas no existe o ha cambiado de dirección.</p>
		<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Volver al inicio</a></p>
	</div>
</main>
<?php
get_template_part( 'template-parts/contacto' );
get_footer();
