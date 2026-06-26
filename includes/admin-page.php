<?php
/**
 * Admin panel and tabs
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register WordPress menu
 */
function mailscope_register_main_menu() {
    add_menu_page(
        'MailScope',
        'MailScope',
        'manage_options',
        'mailscope-dashboard',
        'wp_mailscope_render_admin_page',
        'dashicons-admin-generic',
        25
    );
}
add_action( 'admin_menu', 'mailscope_register_main_menu' );

/**
 * Renderiza el contenido de la página con su sistema de pestañas
 */
function wp_mailscope_render_admin_page() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    // Definición de pestañas
    $tabs = array(
        'dashboard'     => 'Dashboard',
        'contactos'     => 'Contactos',
        'plantillas'    => 'Plantillas',
        'campanas'      => 'Campañas',
        'estadisticas'  => 'Estadísticas',
        'configuracion' => 'Configuración',
    );

    $current_tab = isset( $_GET['tab'] ) && array_key_exists( $_GET['tab'], $tabs ) ? sanitize_text_field( $_GET['tab'] ) : 'dashboard';
    $page_url = admin_url( 'admin.php?page=mi-plugin-base-slug' );
    ?>
    
    <div class="wrap">
        <h1>WP Mailscope - Panel de Administración</h1>
        <hr class="wp-header-end">

        <nav class="nav-tab-wrapper" style="margin-bottom: 20px;">
            <?php foreach ( $tabs as $tab_slug => $tab_title ) : ?>
                <?php 
                $active_class = ( $current_tab === $tab_slug ) ? 'nav-tab-active' : '';
                $tab_url      = add_query_arg( array( 'tab' => $tab_slug ), $page_url );
                ?>
                <a href="<?php echo esc_url( $tab_url ); ?>" class="nav-tab <?php echo esc_attr( $active_class ); ?>">
                    <?php echo esc_html( $tab_title ); ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <div class="plugin-tab-content">
            <?php
            switch ( $current_tab ) {
                case 'dashboard':
                    echo '<h2>Dashboard</h2>';
                    echo '<p>Bienvenido al panel principal de control. Aquí verás un resumen general.</p>';
                    break;
                    
                case 'contactos':
                    echo '<h2>Gestión de Contactos</h2>';
                    echo '<p>Aquí se listarán y administrarán los contactos capturados.</p>';
                    break;
                    
                case 'plantillas':
                    echo '<h2>Plantillas</h2>';
                    echo '<p>Administra las plantillas de diseño y correos desde esta sección.</p>';
                    break;
                    
                case 'campanas':
                    echo '<h2>Campañas</h2>';
                    echo '<p>Configuración, programación y envío de campañas activas.</p>';
                    break;
                    
                case 'estadisticas':
                    echo '<h2>Estadísticas e Informes</h2>';
                    echo '<p>Gráficas de rendimiento, aperturas, clics y métricas clave.</p>';
                    break;
                    
                case 'configuracion':
                    echo '<h2>Configuración General</h2>';
                    echo '<p>Ajustes del sistema, claves de API y preferencias del plugin.</p>';
                    break;
            }
            ?>
        </div>
    </div>
    <?php
}