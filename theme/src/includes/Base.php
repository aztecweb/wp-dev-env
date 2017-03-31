<?php
/**
 * Base class
 *
 * @package MyEnvPress
 */

namespace MyEnvPress;

use DI\Container;

/**
 * Base class for manipulate hooks using dependency injection
 */
abstract class Base {

	/**
	 * The dependency injection container
	 *
	 * @var Container
	 */
	protected $container;

	/**
	 * Setting the container
	 *
	 * @param Container $container The container.
	 */
	public function __construct( Container $container ) {
		$this->container = $container;
	}

	/**
	 * Get class function inner the container
	 *
	 * Using the container to inject a callback to a hook is possible remove it
	 * any time.
	 *
	 * To add a function to a hook.
	 *
	 *     add_action( 'hook_name', $this->callback( 'function_name' ) );
	 *
	 * To remove a function. Its possible use the code in any part of the
	 * application.
	 *
	 *     remove_action(
	 *         'wp_headers',
	 *         [
	 *             $container->get( ClassName::class ),
	 *             'function_name'
	 *         ]
	 *     );
	 *
	 * @param string $function The function name.
	 * @return callable The function to be called.
	 */
	public function callback( $function ) {
		return [ $this->container->get( get_class( $this ) ), $function ];
	}
}
