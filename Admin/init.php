<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die();
}

add_action( 'admin_enqueue_scripts', 'da_enqueue_styles' );
function da_enqueue_styles( $hook ) {
    if( is_admin() ) {
        wp_enqueue_style( 'da-gen-bootstrap-style', da_gen_plugin_url( 'assets/css/bootstrap.min.css' ), array() );
        wp_enqueue_style( 'da-gen-bootstrap-formhelpers-style', da_gen_plugin_url( 'assets/css/bootstrap-formhelpers.min.css' ), array() );
        wp_enqueue_style( 'da-gen-spass-admin', da_gen_plugin_url( 'assets/css/admin.css' ), array('wp-color-picker') );
    }
}

add_action( 'admin_enqueue_scripts', 'da_enqueue_scripts' );
function da_enqueue_scripts( $hook ) {
    if( is_admin() ) {
        wp_enqueue_script( 'da-gen-bootstrap-script', da_gen_plugin_url( 'assets/js/bootstrap.min.js' ), array( 'jquery' ), '', true ); 
        wp_enqueue_script( 'da-gen-bootstrap-formhelpers-script', da_gen_plugin_url( 'assets/js/bootstrap-formhelpers.min.js' ), '', true ); 
        wp_enqueue_script( 'da-gen-spass-admin', da_gen_plugin_url( 'assets/js/admin.js' ), array( 'jquery', 'wp-color-picker' ), '', true ); 
    }
}

add_action( 'admin_init', 'register_settings_cb' );
function register_settings_cb(){
    // - register_setting( $option_group, $option_name, $sanitize_callback );
    register_setting('da-gen-pass-settings', 'da_gen_spass_color' );
    register_setting('da-gen-pass-settings', 'da_gen_spass_font1' );
    register_setting('da-gen-pass-settings', 'da_gen_spass_font2' );
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