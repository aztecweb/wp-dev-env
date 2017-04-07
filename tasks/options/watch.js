/**
 * Watch for changes for files and execute an execute a task
 */
module.exports = {
	livereload: {
		files: [ 'public/**/*', '!**/*.log'],
		options: {
			livereload: true
		}
	},
	theme: {
		files: 'theme/src/**/*',
		tasks: [ 'sync:theme' ]
	},
	stylus: {
		files: [ '.stylintrc', 'theme/stylus/**/*.styl' ],
		tasks: [ 'stylint', 'stylus:dev' ]
	},
	js: {
		files: [ 'theme/js/**/*' ],
		tasks: [ 'sync:requirejs' ]
	},
	bower: {
		files: [ 'bower_components/**/*' ],
		tasks: [ 'bower:dev' ]
	}
};
