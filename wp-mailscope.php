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

/**
 * Register in WordPress menu
 */
function mailscope_register_main_menu() {
    add_menu_page(
        'MailScope',
        'MailScope',
        'manage_options',
        'mailscope-dashboard',
        'mailscope_render_admin_page',
        'dashicons-email',
        25
    );
}
add_action( 'admin_menu', 'mailscope_register_main_menu' );

/**
 * Admin page
 */
function mailscope_render_admin_page() {
    // Security permissions
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1>MailScope</h1>
        <div class="notice notice-info">
            <p>Hello World</p>
        </div>
    </div>
    <?php
}
