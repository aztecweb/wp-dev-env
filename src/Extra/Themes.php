<?php

namespace MyEnvPress\Extra;

use MyEnvPress\Helper\CommandHelper;

class Themes extends Extra {
	
	/**
	 * Define theme extra packages specification.
	 */
	public function __construct() {
		$this->resourceDir = 'themes';
		$this->resourceExtension = 'zip';
	}
	
	/**
	 * Install the themes that are inner the extra directory.
	 * 
	 * {@inheritDoc}
	 * @see \MyEnvPress\Extra\Extra::execute()
	 */
	public function execute()
	{
		$command = new CommandHelper();
		
		foreach ($this->getResources() as $resource) {
			$command->run('theme install ' . $resource->getPathname() . ' --activate --force');
		}
	}
}
