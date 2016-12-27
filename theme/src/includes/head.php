<?php

// Remove feed links.
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);

// Remove services links.
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// Remove post related links.
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Remove generator.
remove_action('wp_head', 'wp_generator');

// Add this file function in the `wp_head` hook.
add_action( 'wp_head', 'head_viewport' );

if( ! function_exists( 'head_viewport' ) ) :
/**
 * Add the reponsive meta tag.
 */
function head_viewport() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">' . PHP_EOL;
}
endif;
