<?php

namespace MyEnvPress\Command;

use Symfony\Component\Process\Process;

class Command {
	
	/**
	 * Run a WP-CLI command.
	 * 
	 * @param unknown $wpCommand The command string without the executable
	 */
	public function run($wpCommand)
	{
		$process = new Process(sprintf('%s %s', self::getWPCLIBin(), $wpCommand));
		$process->run();
		echo $process->getOutput();
	}
	
	/**
	 * Get the WP-CLI executable.
	 * 
	 * @return string The executable path.
	 */
	public static function getWpCliBin()
	{
		return dirname(__FILE__) . '/../../vendor/bin/wp';
	}
}
