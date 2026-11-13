<?php
/**
 * Pedal Note — functions.
 *
 * @package pedalnote
 */

defined( 'ABSPATH' ) || exit;

define( 'PEDALNOTE_DIR', get_template_directory() );
define( 'PEDALNOTE_URI', get_template_directory_uri() );

require PEDALNOTE_DIR . '/inc/setup.php';
require PEDALNOTE_DIR . '/inc/enqueue.php';
require PEDALNOTE_DIR . '/inc/helpers.php';
require PEDALNOTE_DIR . '/inc/branding.php';
require PEDALNOTE_DIR . '/inc/acf-home.php';
require PEDALNOTE_DIR . '/inc/analytics.php';
require PEDALNOTE_DIR . '/inc/mail.php';
