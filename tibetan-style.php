<?php
/*
Plugin Name: Tibetan Style
Plugin URI:  https://github.com/bumpagyal/tibetan-style/
Description: This plugin can solve the problem that Tibetan fonts are inconsistent with the font sizes on the front-end web pages when the default Latin font of WordPress is unmodified.
Version:     3.1.2
Author:      Bumpa G. Rebkong
Author URI:  https://www.tibetitw.com/
License:     GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

// Direct Access Forbidden
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// WordPress Custom Font @ Admin Embed
if( ! function_exists( 'tibs_admin_custom_font' ) ):
    function tibs_admin_custom_font() {
        // Only on Windows
        if(preg_match("/(Win|WIN|Windows|win|winNT).*?([\d.]+)/",$_SERVER['HTTP_USER_AGENT'])){
            wp_register_style( 'tibs-win-style', plugins_url( 'css/index-win.css', __FILE__ ) );
            wp_enqueue_style( 'tibs-win-style');
        }
        // Google Font
        wp_enqueue_style( 'tibs-google-fonts-bo', 'https://fonts.googleapis.com/css2?family=Jomolhari&display=swap', false, '' );
        // Base style
        wp_register_style( 'tibs-style', plugins_url( 'css/base-style.css', __FILE__ ) );
        wp_enqueue_style( 'tibs-style' );
        $custom_css = "code, kbd, pre, samp{font-family:monospace,Consolas!important;}.wp-embed-share-description{font-family:Arial;}";
        wp_add_inline_style( 'tibs-style', $custom_css );
    }
endif;

add_action( 'wp_enqueue_scripts', 'tibs_admin_custom_font' );
add_action( 'login_enqueue_scripts', 'tibs_admin_custom_font' );
add_action( 'admin_enqueue_scripts', 'tibs_admin_custom_font' );
add_action( 'enqueue_embed_scripts', 'tibs_admin_custom_font' );