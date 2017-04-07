<?php
/**
 * Init class
 *
 * @package AztecWpDevEnv
 */

namespace AztecWpDevEnv;

use DI\Container;

/**
 * Main theme class
 */
class Kernel {

	/**
	 * The dependency injection container
	 *
	 * @var Container
	 */
	protected $container;

	public function __construct( Container $container ) {
		$this->container = $container;
	}

	/**
	 * Load classes that add or remove hooks
	 */
	public function init() {
		$init_classes = [
			\AztecWpDevEnv\Setup\Assets::class,
			\AztecWpDevEnv\Setup\DisableEmoji::class,
			\AztecWpDevEnv\Setup\Head::class,
			\AztecWpDevEnv\Setup\HttpHeader::class,
		];

		foreach ( $init_classes as $class ) {
			$this->container->get( $class )->init();
		}
	}
}
