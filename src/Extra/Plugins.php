<?php

namespace MyEnvPress\Extra;

use MyEnvPress\Helper\CommandHelper;

class Plugins extends Extra {
	
	/**
	 * Define plugin extra packages specification.
	 */
	public function __construct() {
		$this->resourceDir = 'plugins';
		$this->resourceExtension = 'zip';
	}
	
	/**
	 * Install the plugins that are inner the extra directory.
	 * 
	 * {@inheritDoc}
	 * @see \MyEnvPress\Extra\Extra::execute()
	 */
	public function execute()
	{
		$command = new CommandHelper();
		
		foreach ($this->getResources() as $resource) {
			$command->run('plugin install ' . $resource->getPathname() . ' --activate --force');
		}
	}
}
