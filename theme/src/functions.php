<?php

use MyEnvPress\Kernel;

/**
 * Theme functionalities bootstrap
 *
 * This theme use PHP-DI to manage the classes dependencies. To access the
 * container object, use the global variable `$container`.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link http://php-di.org/doc/
 *
 * @package WordPress
 */

/**
 * Require the Composer autoload file
 */
require_once __DIR__ . '/../../../../vendor/autoload.php';

/**
 * The theme container object
 *
 * @global DI\Container $container
 */
global $container;

$builder = new \DI\ContainerBuilder();
$container = $builder->build();

$container->get( Kernel::class )->init();
