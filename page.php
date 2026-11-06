<?php
/**
 * Páginas legales (aviso legal, privacidad, cookies): sencilla y legible.
 * Franja negra arriba con el sello (header.php) y el mismo pie que la portada.
 *
 * @package pedalnote
 */

get_header();
?>
<main id="main" class="inner">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class( 'inner__content' ); ?>>
			<?php the_title( '<h1 class="inner__title">', '</h1>' ); ?>
			<?php the_content(); ?>
		</article>
		<?php
	endwhile;
	?>
</main>
<?php
get_template_part( 'template-parts/contacto' );
get_footer();
