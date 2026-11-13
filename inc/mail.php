<?php
/**
 * Remitente de los emails que envía WordPress (recuperar contraseña, avisos…).
 *
 * Por defecto WordPress firma como «WordPress <wordpress@pedalnote.co>».
 * Se usa el nombre y el email de contacto de la empresa.
 *
 * @package pedalnote
 */

defined( 'ABSPATH' ) || exit;

const PEDALNOTE_MAIL_FROM      = 'coe@pedalnote.co';
const PEDALNOTE_MAIL_FROM_NAME = 'Pedal Note';

add_filter( 'wp_mail_from', static fn() => PEDALNOTE_MAIL_FROM );
add_filter( 'wp_mail_from_name', static fn() => PEDALNOTE_MAIL_FROM_NAME );
