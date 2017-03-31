<?php
/**
 * HttpHeader class.
 *
 * @package MyEnvPress
 */

namespace MyEnvPress\Setup;

use MyEnvPress\Base;

/**
 * Manipulate elements inner the head tag
 *
 * Some WordPress native tags are disabled, like feeds, services and post
 * related links.
 */
class HttpHeader extends Base {

	/**
	 * Execute hooks
	 */
	public function init() {
	    add_filter( 'wp_headers', $this->callback( 'http_headers_x_ua_compatible' ), 10, 2 );
	}

	/**
	 * Add X-UA-Compatible as response header instead HTML tag. The header is
	 * added only if the browser is Internet Explorer.
	 *
	 * @param array   $headers The list of headers to be sent.
	 * @param unknown $wp Current WordPress environment instance.
	 * @return array The list of headers to be sent.
	 */
	public function http_headers_x_ua_compatible( $headers, $wp ) {
		if ( ! empty( $_SERVER['HTTP_USER_AGENT'] ) && $agent = sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ) ) {
			if ( preg_match( '/MSIE/', $agent ) ) {
				$headers['X-UA-Compatible'] = 'IE=edge,chrome=1';
			}
		}

		return $headers;
	}
}
