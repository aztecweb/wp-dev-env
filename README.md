# MyEnvPress

My WordPress theme development environment.

## WordPress Management

The project use [WP-CLI](http://wp-cli.org/) and [WPackagist](http://wpackagist.org/) to manage the WordPress Core, plugins and themes installation.

The WP-CLI manage the core updates and maintenance tasks, like wp-config generation and database installation. The plugins and themes of the official WordPress repository is defined in the composer.json. Read the [WPackagist](http://wpackagist.org/) home page to see how to define them.

## The public directory

The public directory contain the WordPress installation. This directory is not part of the project. The files in this directory cannot be modified. They can overrid during an install or update command.

Configure your webserver to the public directory to be the root directory of the server.

## Configuration

The project configuration is managed by WP-CLI. [Click here](http://wp-cli.org/config/) to read more about WP-CLI configuration.

Create a copy of the .wp-cli.yml file called .wp-cli.local.yml and configure with your local parameters.

## Installation

Execute the command

	$ bin/install
	
This command will

* Download the latest WordPress version
* Create the database, if doen't exist
* Generate the wp-config.php file
* Install the WordPress
* Install plugins and themes inner the `extra` directory
* Install plugins and themes defined in `composer.json` file
* Import XML files inner the `extra/data` directory 
* Update language packages
* Install NPM and Bower dependencies
* Build the theme

## Run the application

Use the PHP built-in server to run the application. The WP-CLI wrap the server command adding a specific router for the WordPress. To up the server, run the command:

	$ vendor/bin/wp server
	
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
