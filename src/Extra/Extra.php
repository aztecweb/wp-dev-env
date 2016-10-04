<?php

namespace MyEnvPress\Extra;

use Symfony\Component\Finder\Finder;

/**
 * An abstract class used as base to get the extra packages resources. 
 */
abstract class Extra {
	
	/**
	 * 
	 * @var string The extra package resource base directory.
	 */
	public static $extraDirPath = __DIR__ . '/../../extra';
	
	/**
	 * 
	 * @var string The name of the resource directory.
	 */
	protected $resourceDir;
	
	/**
	 * 
	 * @var string The extension of the resources that is inner the directory.
	 */
	protected $resourceExtension;
	
	/**
	 * Execute the process to insert the resource inner the WordPress installation.
	 */
	abstract function execute();
	
	/**
	 * Get the resources inner the package directory.
	 * 
	 * @throws Exception If the resource directory and extension isn't set.
	 * @return \Symfony\Component\Finder\Finder The resources.
	 */
	public function getResources()
	{
		if (is_null($this->resourceDir) || is_null($this->resourceExtension)) {
			throw new Exception('The resource directory and extension cannot be null');
		}

		$dir = self::$extraDirPath . '/' .  $this->resourceDir;

		$finder = new Finder();
		$finder->files()
			->in($dir)
			->name('*.' . $this->resourceExtension);
		
		return $finder;
	}
}