<?php

namespace MyEnvPress\Helper;

use Symfony\Component\Process\Process;

class CommandHelper {
	
	/**
	 * Run a WP-CLI command.
	 * 
	 * @param string $wpCommand The command string without the executable.
	 * @param bool $return Return the output instead print. Default: false
	 * @return string The output, if $return is true.
	 */
	public function run($wpCommand, $return = false)
	{
        $process = new Process(sprintf('%s %s', $this->getWPCLIBin(), $wpCommand));
        $process->setTimeout(3600);
        $process->run(function ($type, $buffer) use ($return) {
            if (!$return) {
                echo $buffer;
            }
        });
		
		if($return) {
            $output = $process->getOutput() . $process->getErrorOutput();
			return $output;
		}
	}
	
	/**
	 * Get the WP-CLI executable.
	 * 
	 * @return string The executable path.
	 */
	public function getWpCliBin()
	{
		return __DIR__ . '/../../vendor/bin/wp';
	}
}
