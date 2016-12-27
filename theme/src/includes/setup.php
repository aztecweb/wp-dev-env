<?php

// Add this file function in the `after_setup_theme` hook.
add_action( 'after_setup_theme', 'theme_setup' );

if( ! function_exists( 'theme_setup' ) ) :
/**
 * The theme setup.
 */
function theme_setup() {
	// Generate title tag.
	add_theme_support( 'title-tag' );
}
endif;
