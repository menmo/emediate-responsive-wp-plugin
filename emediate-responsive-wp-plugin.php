<?php
/*
Plugin Name: Emediate Responsive Wordpress Plugin
Description: Integrates the website with Emediate ad manager
Version: 0.1.3
Author: norvkab <https://github.com/norvkab/>
*/
define('ERWP_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ERWP_PLUGIN_VERSION', '0.1.21');
define('ERWP_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
defined('ERWP_DEBUG') or define('ERWP_DEBUG', false);

require_once ERWP_PLUGIN_PATH.'/classes/class-loader.php';

if( is_admin() ) {

    // Remove all data saved to database when plugin is uninstalled
    register_uninstall_hook(__FILE__, 'ERWP_Options::clear');

    // Add settings page in wp-admin
    add_action('admin_menu', function() {
        add_options_page(
            'Emediate',
            'Emediate',
            'manage_options',
            'emediate-settings',
            function() {
                require_once ERWP_PLUGIN_PATH.'/templates/admin/settings-page.php';
            }
        );
    });

    add_action( 'admin_notices', 'erwp_admin_notice__success' );    
} else {

    // Theme implementation
    add_action('template_redirect', 'ERWP_Plugin::themeInit');

}

function erwp_admin_notice__success() {
    $screen = get_current_screen();
	if ($screen->id === 'settings_page_emediate-settings' && $_GET['saved'] == '1') {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php echo 'Saved!' ?></p>
    </div>
    <?php
    }
}
