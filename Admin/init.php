<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die();
}

add_action( 'admin_enqueue_scripts', 'wptuts_add_color_picker' );
function wptuts_add_color_picker( $hook ) {
    if( is_admin() ) {
        // Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' ); 
        wp_enqueue_style( 'da-gen-spass-admin', da_gen_plugin_url( 'assets/css/admin.css' ), array() );
        
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'da-gen-spass-admin', da_gen_plugin_url( 'assets/js/admin.js' ), array( 'jquery', 'wp-color-picker' ), '', true ); 
    }
}

add_action( 'admin_init', 'register_settings_cb' );
function register_settings_cb(){
    // - register_setting( $option_group, $option_name, $sanitize_callback );
    register_setting('da-gen-pass-settings', 'da_gen_spass_color' );
    register_setting('da-gen-pass-settings', 'da_gen_spass_font_size' );
}


// registering admin menu
add_action('admin_menu', 'da_spass_setup_menu');
function da_spass_setup_menu(){
    add_menu_page( 'Secure Password Settings', 'Secure Password', 'manage_options', DA_GSP_PLUGIN_NAME.'-setting', 'settings', 'dashicons-admin-network');
}
function settings() {
    require(DA_GSP_PLUGIN_DIR . '/Admin/Views/Settings.php');
}
///

// mapping form actions
add_action('init', 'handleCommands');
function handleCommands() {
    if(isset($_REQUEST['da__cmd'])) {
        $cmd = $_REQUEST['da__cmd'];
        call_user_func($cmd);
    }
}

// form actions

///