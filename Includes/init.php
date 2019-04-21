<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die();
}

function enqueueScripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'eqcss', da_gen_plugin_url( 'assets/js/EQCSS.min.js' ) );

    wp_enqueue_script( 'da-gen-spass', da_gen_plugin_url( 'assets/js/public.js' ), ( 'jquery' ), '1.0.0', true);
    wp_localize_script( 'da-gen-spass', 'data_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'enqueueScripts' );

function enqueueStyles() {
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' );
    wp_enqueue_style( 'da-gen-spass', da_gen_plugin_url( 'assets/css/lastpass.css' ), array() );
}
add_action( 'wp_enqueue_scripts', 'enqueueStyles', 999 );

// add ajax callback
add_action('wp_ajax_da_gen_check', 'da_gen_check_strength');
add_action('wp_ajax_nopriv_da_gen_check', 'da_gen_check_strength');

add_action('wp_ajax_da_gen_rand_pass', 'da_gen_random_password');
add_action('wp_ajax_nopriv_da_gen_rand_pass', 'da_gen_random_password');
