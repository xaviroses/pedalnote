<?php
/**
 * Lista de servicios (secciones 4 y 6). Recibe $args['items']: [ name, text ].
 *
 * @package pedalnote
 */

$pedalnote_items = $args['items'] ?? array();
?>
<ul class="services__list" role="list">
	<?php foreach ( $pedalnote_items as $pedalnote_item ) : ?>
		<li class="services__item">
			<h3 class="services__name"><?php echo esc_html( $pedalnote_item['name'] ?? '' ); ?></h3>
			<p class="services__text"><?php echo pedalnote_lines( (string) ( $pedalnote_item['text'] ?? '' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
		</li>
	<?php endforeach; ?>
</ul>
