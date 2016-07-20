# MyEnvPress

My WordPress theme development environment.

## Defining plugins and themes

This project use the WPackagist to manage the plugins and themes instalation. Read the [WPackagist](http://wpackagist.org/) home page to see how to define the themes that you want in your installation.

## Installation

Install PHP dependencies

	$ composer install
	
Install Node dependencies

	$ npm install

The WordPress installation will be available in the /public directory.

## Update

To update plugins and themes, execute:

	$ composer update
	
## Grunt tasks

The Grunt task runner is used to automate the common tasks of the project.

### default

The default task update the project with the server. Execute this task before starting the development ou after git synchronization.

	$ grunt
	
### watch

Listen all changes in the project files. This command is integrated with the [Livereload](http://livereload.com/extensions/) browser extension. To any server file change, the browser automatically refresh the page. This command maintain alive until you kill it with a `ctrl + c`. Maintain alive while you work in the development.

	$ grunt watch
	
## Stylus

This env use stylus to preprocess the CSS styles. The files stay inner the `theme/stylus`. The files is processed by grunt tasks. Read the [Stylus documentation](http://stylus-lang.com/).

## RequireJS

The env is ready to use RequireJS. The main script is `theme/js/app.js`. It is loaded in the `theme/src/includes/myenvpress.php` file.

## Bower

The front-end libraries is managed by Bower. They are managed in the `bower.json` file. The Grunt bower tasks automagically copy the libs to the server. The server path is configured in RequireJS to be loaded as a module. 

## Starting development

The project was started early. My idea is publish my WordPress theme development workflow. I use a toolbox to automated the installation and management of the project. Some features that I use in my project:

* [Composer webroot installer](https://github.com/fancyguy/webroot-installer) - manage WP core installations and updates
* [WPackagist](http://wpackagist.org/) - manage plugins and themes installations and updates
* [Grunt](http://gruntjs.com/) - To run dist package creation and another project necessary tasks
* [Stylus](http://stylus-lang.com/) - CSS preprocessor
* Manage WP configuration values, database connection and basic site informations with a project config file.
* Console commands to manage the installation
