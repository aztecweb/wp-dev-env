<?php
/**
 * Filter sent HTTP headers by WordPress.
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_headers/
 *
 * @package WordPress
 * @subpackage MyEnvPress
 * @since 0.1.0
 * @version 0.1.0
 */

add_filter( 'wp_headers', 'http_headers_x_ua_compatible', 10, 2 );

if ( ! function_exists( 'http_headers_x_ua_compatible' ) ) :
	/**
	 * Add X-UA-Compatible as response header instead HTML tag. The header is added
	 * only if the browser is Internet Explorer.
	 *
	 * @param array   $headers The list of headers to be sent.
	 * @param unknown $wp Current WordPress environment instance.
	 * @return array The list of headers to be sent.
	 */
	function http_headers_x_ua_compatible( $headers, $wp ) {
		if ( ! empty( $_SERVER['HTTP_USER_AGENT'] ) && $agent = sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ) ) {
			if ( preg_match( '/MSIE/', $agent ) ) {
				$headers['X-UA-Compatible'] = 'IE=edge,chrome=1';
			}
		}

		return $headers;
	}
endif;
