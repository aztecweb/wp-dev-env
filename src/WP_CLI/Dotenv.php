<?php
/**
 * Dotenv WP CLI command hooks
 *
 * @package AztecWpDevEnv
 */

namespace AztecWpDevEnv\WP_CLI;

/**
 * Add new functionalities to the WP CLI dot env command
 */
class Dotenv {

	/**
	 * Ensure that the salts file exist
	 *
	 * If the file salts doesn't exist, the salts aren't generated
	 */
	public function ensure_salts_file() {
		$salts_file = __DIR__ . '/../../.salts';

		if ( ! file_exists( $salts_file ) ) {
			if ( ! touch( $salts_file ) ) {
				\WP_CLI::error( 'Cannot create the salts file.' );
			}
		}
	}
}
