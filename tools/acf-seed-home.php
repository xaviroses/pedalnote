<?php
/**
 * Rellena los campos ACF de la portada con el contenido del XD (inc/home-defaults.php).
 *
 * Solo escribe los campos que aún no tienen valor guardado: no pisa lo que haya
 * cambiado el cliente. Se puede lanzar las veces que haga falta.
 *
 * Uso (desde la carpeta de WordPress):
 *   wp eval-file wp-content/themes/pedalnote/tools/acf-seed-home.php
 *
 * @package pedalnote
 */

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	exit;
}
if ( ! function_exists( 'update_field' ) ) {
	WP_CLI::error( 'ACF no está activo.' );
}

$pedalnote_front = (int) get_option( 'page_on_front' );
if ( ! $pedalnote_front ) {
	WP_CLI::error( 'No hay una página asignada como portada (Ajustes → Lectura).' );
}

$pedalnote_defaults = require get_template_directory() . '/inc/home-defaults.php';
$pedalnote_written  = 0;

foreach ( $pedalnote_defaults as $pedalnote_name => $pedalnote_value ) {
	if ( metadata_exists( 'post', $pedalnote_front, $pedalnote_name ) ) {
		continue; // ya tiene valor: no se toca
	}
	if ( is_int( $pedalnote_value ) && 0 === $pedalnote_value ) {
		continue; // imagen vacía: se usa la foto del tema
	}

	$pedalnote_key = 'field_pn_' . $pedalnote_name;

	// Repetidores: filas con claves de sub-campo.
	if ( is_array( $pedalnote_value ) ) {
		$pedalnote_value = array_map(
			static function ( array $row ) use ( $pedalnote_name ): array {
				$out = array();
				foreach ( $row as $sub => $v ) {
					$out[ 'field_pn_' . $pedalnote_name . '_' . $sub ] = $v;
				}
				return $out;
			},
			$pedalnote_value
		);
	}

	if ( update_field( $pedalnote_key, $pedalnote_value, $pedalnote_front ) ) {
		++$pedalnote_written;
		WP_CLI::log( "  ✔ {$pedalnote_name}" );
	} else {
		WP_CLI::warning( "No se pudo guardar {$pedalnote_name}" );
	}
}

WP_CLI::success( "Campos rellenados: {$pedalnote_written} (portada: página {$pedalnote_front})." );
