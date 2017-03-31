<?php
/**
 * Head class.
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
class Head extends Base {

	/**
	 * Execute hooks
	 */
	public function init() {
		$this->remove_feed_links();
		$this->remove_services_links();
		$this->remove_post_related_links();
		$this->remove_generator();

		add_action( 'wp_head', $this->callback( 'profile' ), 1 );
		add_action( 'wp_head', $this->callback( 'viewport' ), 1 );
		add_action( 'wp_head', $this->callback( 'charset' ), 1 );
	}

	/**
	 * Remove RSS feed head links
	 */
	public function remove_feed_links() {
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		remove_action( 'wp_head', 'feed_links', 2 );
	}

	/**
	 * Remove services head links
	 */
	public function remove_services_links() {
		add_filter( 'xmlrpc_enabled', '__return_false' );

		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
	}

	/**
	 * Remove post related links
	 */
	public function remove_post_related_links() {
		remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
		remove_action( 'wp_head', 'rel_canonical' );
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	}

	/**
	 * Remove unecessary generator header tag
	 */
	public function remove_generator() {
		remove_action( 'wp_head', 'wp_generator' );
	}

	/**
	 * Add profile head profile link
	 */
	public function profile() {
	    echo '<link rel="profile" href="http://gmpg.org/xfn/11">' . esc_html( PHP_EOL );
	}

	/**
	 * Add vieport meata tag
	 */
	public function viewport() {
	    echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">' . esc_html( PHP_EOL );
	}

	/**
	 * Define document charset
	 */
	public function charset() {
	    echo sprintf( '<meta charset="%s">', esc_attr( get_bloginfo( 'charset' ) ) ) . esc_html( PHP_EOL );
	}
}
