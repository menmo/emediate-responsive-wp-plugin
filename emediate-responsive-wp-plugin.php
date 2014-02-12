<?php
/*
Plugin Name: Emediate Responsive WordPress Plugin
Description: Integrates the website with Emediate ad manager
Version: 0.1
Author: norvkab <https://github.com/norvkab/>
*/


define('ERWP_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ERWP_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
define('ERWP_PLUGIN_VERSION', '0.1.1');

require_once ERWP_PLUGIN_PATH.'/classes/class-loader.php';

if(is_admin()){
    add_action('admin_menu', function() {
        $js_hook = add_options_page(
            'Emediate',
            'Emediate',
            'manage_options',
            'emediate-settings',
            function() {
                require_once ERWP_PLUGIN_PATH.'/templates/admin/settings-page.php';
            }
        );
        wp_enqueue_script('admin-'.$js_hook, ERWP_PLUGIN_URL.'templates/admin/admin-ui.js', array('jquery'), ERWP_PLUGIN_VERSION);
    });
}