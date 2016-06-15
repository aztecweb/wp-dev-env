# MyEnvPress

My WordPress theme development environment.

## Defining plugins and themes

This project use the WPackagist to manage the plugins and themes instalation. Read the [WPackagist](http://wpackagist.org/) home page to see how to define the themes that you want in your installation.

## Installation

Execute the command:

	$ composer install

The WordPress installation will be available in the /public directory.

## Update

To update plugins and themes, execute:

	$ composer update

## Starting development

The project was started early. My idea is publish my WordPress theme development workflow. I use a toolbox to automated the installation and management of the project. Some features that I use in my project:

* [Composer webroot installer](https://github.com/fancyguy/webroot-installer) - manage WP core installations and updates
* [WPackagist](http://wpackagist.org/) - manage plugins and themes installations and updates
* [Grunt](http://gruntjs.com/) - To run dist package creation and another project necessary tasks
* [Stylus](http://stylus-lang.com/) - CSS preprocessor
* Manage WP configuration values, database connection and basic site informations with a project config file.
* Console commands to manage the installation
