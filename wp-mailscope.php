<?php
/**
 * Plugin Name: WP MailScope
 * Plugin URI: https://#
 * Description: Integración del sistema de email marketing MailScope en WordPress.
 * Version: 1.0.0
 * Author: Andrés Beraldo
 * Author URI: https://#
 * Text Domain: mailscope
 * Requires at least: 6.0
 * Requires PHP: 8.1
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Definir constante con la ruta base del plugin para inclusiones seguras
define( 'AL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Cargar la interfaz de administración solo si estamos en el backend de WP
if ( is_admin() ) {
    require_once AL_PLUGIN_DIR . 'includes/admin-page.php';
}
