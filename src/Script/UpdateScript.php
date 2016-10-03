<?php

namespace MyEnvPress\Script;

use Composer\Script\Event;
use MyEnvPress\Command\Command;

class UpdateScript
{
	/**
	 * Update the WordPress before composer packages update.
	 * 
	 * @param Event $event The pre-update command event.
	 */
	public static function preUpdate(Event $event)
	{
		$command = new Command();
		
		echo "Updating WordPress...\n";
		$command->run('core update');
	}
}
