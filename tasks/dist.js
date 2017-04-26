/**
 * Build for distribution environment
 *
 * @param {object} grunt The Grunt object.
 */
module.exports = function ( grunt ) {
	grunt.task.registerTask( 'dist', [
		'stylint',
		'composer:install',
		'copy:config',
		'shell:bower',
		'sync:theme',
		'stylus:dist',
		'bower:copy',
		'sync:requirejs'
	] );
};
