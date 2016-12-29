<?php
/**
 * Manipulate the scripts and javascripts
 *
 * Load the theme style and the RequireJS application.
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 *
 * @package WordPress
 * @subpackage MyEnvPress
 * @since 0.1.0
 * @version 0.1.0
 */

/**
 * Enqueue the theme style.
 *
 * Enqueue the RequireJS library file. Define the base url to the library file
 * url path.
 */
function myenvpress_enqueue_scripts() {
	wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/assets/css/style.css' );

	wp_enqueue_script( 'requirejs', get_stylesheet_directory_uri() . '/assets/js/libs/require.js', array( 'jquery' ), false, true );
	wp_localize_script( 'requirejs', 'myenvpress_requirejs', array(
		'base_url' => get_stylesheet_directory_uri() . '/assets/js/libs',
	) );
}
add_action( 'wp_enqueue_scripts', 'myenvpress_enqueue_scripts' );

/**
 * Add the main application script to the RequireJS script tag.
 *
 * @param string $tag The HTML tag.
 * @param string $handle The script handle.
 * @param string $src The script source.
 * @return string The HTML tag adding the main application script.
 */
function myenvpress_script_loader_tag( $tag, $handle, $src ) {
	if ( 'requirejs' !== $handle ) {
		return $tag;
	}

	$require_main = get_stylesheet_directory_uri() . '/assets/js/app';
	return '<script data-main="' . $require_main . '" src="' . $src . '"></script>';
}
add_filter( 'script_loader_tag', 'myenvpress_script_loader_tag', 10, 3 );
