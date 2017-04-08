<?php

use AztecWpDevEnv\WP_CLI\Dotenv as Aztec_WP_CLI_Dotenv;

require_once __DIR__ . '/../../vendor/autoload.php';

if ( ! class_exists( WP_CLI::class ) ) {
	require_once __DIR__ . '/../../vendor/wp-cli/wp-cli/php/class-wp-cli.php';
}

$dot_env = new Aztec_WP_CLI_Dotenv();

\WP_CLI::add_hook( 'before_invoke:dotenv salts generate', array( $dot_env, 'ensure_salts_file' ) );
