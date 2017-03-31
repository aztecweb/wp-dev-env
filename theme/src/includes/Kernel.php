<?php
/**
 * Init class
 *
 * @package MyEnvPress
 */

namespace MyEnvPress;

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
			\MyEnvPress\Setup\Assets::class,
			\MyEnvPress\Setup\DisableEmoji::class,
			\MyEnvPress\Setup\Head::class,
			\MyEnvPress\Setup\HttpHeader::class,
		];

		foreach ( $init_classes as $class ) {
			$this->container->get( $class )->init();
		}
	}
}
