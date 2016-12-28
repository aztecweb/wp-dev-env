/* jshint node:true */
'use strict';

module.exports = function( grunt ) {
	
	// auto load grunt tasks
	require( 'load-grunt-tasks' )( grunt );

	grunt.initConfig({
		pkg: grunt.file.readJSON( 'package.json' ),
		config: {
			server: 'public/wp-content/themes/<%= pkg.name %>',
		},
		
		// watch for changes for files and execute an execute a task
		watch: {
			livereload: {
				files: ['public/**/*', '!**/*.log'],
				options: {
					livereload: true
				}
			},
			theme: {
				files: 'theme/src/**/*',
				tasks: ['sync:theme']
			},
			stylus: {
				files: ['.stylintrc', 'theme/stylus/**/*.styl'],
				tasks: ['stylint', 'stylus:dev']
			},
			js: {
				files: ['theme/js/**/*'],
				tasks: ['sync:requirejs']
			},
			bower: {
				files: ['bower_components/**/*'],
				tasks: ['bower:dev']
			}
		},
	
		// sync the files with local test wordpress
		sync : {
			theme : {
				files : [ {
					cwd : 'theme/src',
					src : '**',
					dest : '<%= config.server %>'
				} ],
				pretend : false,
				verbose: true,
				updateAndDelete: true,
				ignoreInDest: 'assets/**'
			},
			requirejs: {
				files : [ {
					cwd : 'theme/js',
					src : '**',
					dest : '<%= config.server %>/assets/js'
				} ],
				pretend : false,
				verbose: true,
				updateAndDelete: true,
				ignoreInDest: 'libs/**'
			}
		},
		
		// compile stylus file
		stylus: {
			dev: {
				options: {
					compress: false,
					linenos: true
				},
				files : {
					'<%= config.server %>/assets/css/style.css' : 'theme/stylus/style.styl'
				}
			},
			dist: {
				files : {
					'<%= config.server %>/assets/css/style.css' : 'theme/stylus/style.styl'
				}
			}
		},

		// lint stylus files
		stylint: {
			src: ['theme/stylus/**/*.styl']
		},

		// copy library dist files to the server js libs directory
		bower : {
			copy : {
				dest : '<%= config.server %>/assets/js/libs',
				options : {
					keepExpandedHierarchy: false
				}
			}
		}
	});
	
	// default task: build the theme to development
	grunt.task.registerTask('default', [
			'sync:theme', 
			'stylint', 
			'stylus:dev', 
			'bower:copy',
			'sync:requirejs'
	]);
	
	// dist task: build the theme to production
	grunt.task.registerTask('dist', [
			'sync:theme',
			'stylint',
			'stylus:dist', 
			'bower:copy',
			'sync:requirejs'
	]);
	
	grunt.task.registerTask('script', ['bower_concat', 'sync:requirejs']);
};
