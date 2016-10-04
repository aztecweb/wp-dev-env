<?php

namespace MyEnvPress\Extra;

use MyEnvPress\Helper\CommandHelper;
use MyEnvPress\Entity\Plugin;

class Data extends Extra {
	
	/**
	 * Define data extra specification.
	 */
	public function __construct() {
		$this->resourceDir = 'data';
		$this->resourceExtension = 'xml';
	}
	
	/**
	 * Install the plugins that are inner the extra directory. The import 
	 * command needs the WordPress Importer plugin. This function verify if it is
	 * installed. If it isn't, the plugin is installed and after uninstalled.
	 * 
	 * {@inheritDoc}
	 * @see \MyEnvPress\Extra\Extra::execute()
	 */
	public function execute()
	{
		$command = new CommandHelper();
		
		$importPlugin = new Plugin('wordpress-importer');
		$isInstalled = $importPlugin->isInstalled();
		
		if (!$isInstalled) {
			$importPlugin->install();
		}

		foreach ($this->getResources() as $resource) {
			$command->run('import ' . $resource->getPathname() . ' --authors=create');
		}

		if (!$isInstalled) {
			$importPlugin->uninstall();
		}
	}
}
