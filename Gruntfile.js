/* jshint node:true */
'use strict';

module.exports = function( grunt ) {
	
	// auto load grunt tasks
	require( 'load-grunt-tasks' )( grunt );

	grunt.initConfig({
		pkg: grunt.file.readJSON( 'package.json' ),
		
		// watch for changes for files and execute an execute a task
		watch: {
			livereload: {
				files: 'public/**/*',
				options: {
					livereload: true
				}
			},
			theme: {
				files: 'theme/**/*',
				tasks: ['sync:theme']
			},
		},
	
		// sync the files with local test wordpress
		sync : {
			theme : {
				files : [ {
					cwd : 'theme',
					src : '**',
					dest : 'public/wp-content/themes/<%= pkg.name %>'
				} ],
				pretend : false,
				verbose: true,
				updateAndDelete: true
			}
		}
	});
	
	// default task: build and sync files with the blog test
	grunt.task.registerTask( 'default', [ 'sync:theme' ] );
};
