<?php

namespace MyEnvPress\Script;

use Composer\Script\Event;
use MyEnvPress\Helper\CommandHelper;
use MyEnvPress\Extra\Themes;
use MyEnvPress\Extra\Plugins;
use MyEnvPress\Extra\Data;

class UpdateScript
{
	/**
	 * Update the WordPress before composer packages update.
	 * 
	 * @param Event $event The pre-update command event.
	 */
	public static function preUpdate(Event $event)
	{
		$command = new CommandHelper();
		
		echo "Updating WordPress...\n";
		$command->run('core update');
		
		echo "Configuring site...\n";
		// remove wp-config file to override it
		exec('rm public/wp-config.php');
		$command->run('core config');

		echo "Installing extra packages and data...\n";
		$themes = new Themes();
		$themes->execute();
		
		$plugins = new Plugins();
		$plugins->execute();
		
		$data = new Data();
		$data->execute();
	}
}
