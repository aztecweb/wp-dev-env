<?php

/**
 * Enque the theme style.
 */
function myenvpress_enqueue_scripts() {
	wp_enqueue_style( 'myenvpress', get_stylesheet_directory_uri() . '/assets/css/style.css' );
	
	wp_enqueue_script( 'myenvpress', get_stylesheet_directory_uri() . '/assets/js/script.js' );
}
add_action( 'wp_enqueue_scripts', 'myenvpress_enqueue_scripts' );
