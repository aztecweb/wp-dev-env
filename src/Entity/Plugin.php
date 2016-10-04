<?php

namespace MyEnvPress\Entity;

use MyEnvPress\Helper\CommandHelper;

class Plugin
{
	/**
	 * 
	 * @var string The plugin slug name
	 */
	private $name;
	
	/**
	 * Init the object and get its status.
	 * 
	 * @param string $name The plugin slug name.
	 */
	public function __construct($name)
	{
		$this->name = $name;
	}
	
	/**
	 * Get the status of the plugin using the WP-CLI command.
	 * 
	 * @return string|bool The name of the status if is installed. False, otherwise.
	 */
	public function getStatus()
	{
		$commandHelper = new CommandHelper();
		$command = sprintf('plugin list --name=%s --fields=status --format=json', $this->name);
		$commandReturn = $commandHelper->run($command, true);
		$pluginJson = json_decode($commandReturn);
		
		if (empty($pluginJson)) {
			return false;
		}
		
		return $pluginJson[0]->status;
	}
	
	/**
	 * Verify if the plugin is installed. The verification is made if the 
	 * plugin status is a string. This ensures that the plugin is installed. 
	 * 
	 * @return boolean True if is installed. False, otherwise. 
	 */
	public function isInstalled()
	{		
		return is_string($this->getStatus());
	}
	
	/**
	 * Install the plugin.
	 * 
	 * @param bool $activate Activate after the installation. Default: True.
	 */
	public function install($activate = true)
	{
		$commandHelper = new CommandHelper();
		$command = sprintf('plugin install %s', $this->name);
		if ($activate) {
			$command .= ' --activate';
		}
		$commandHelper->run($command);
	}
	
	/**
	 * Uninstall the plugin.
	 */
	public function uninstall()
	{
		$commandHelper = new CommandHelper();
		$command = sprintf('plugin deactivate %s --uninstall', $this->name);
		$commandHelper->run($command);
	}
}
