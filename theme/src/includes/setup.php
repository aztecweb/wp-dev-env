<?php
/**
 * Configure theme after the its setup.
 *
 * @link https://developer.wordpress.org/reference/hooks/after_setup_theme/
 *
 * @package WordPress
 * @subpackage MyEnvPress
 * @since 0.1.0
 * @version 0.1.0
 */

add_action( 'after_setup_theme', 'theme_setup' );

if ( ! function_exists( 'theme_setup' ) ) :
	/**
	 * The theme setup.
	 */
	function theme_setup() {
		// Generate title tag.
		add_theme_support( 'title-tag' );
	}
endif;
