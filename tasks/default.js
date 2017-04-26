/**
 * Build for development environment
 *
 * @param {object} grunt The Grunt object.
 */
module.exports = function ( grunt ) {
	grunt.task.registerTask( 'default', [
		'stylint',
		'composer:update',
		'copy:config',
		'shell:bower',
		'sync:theme',
		'stylus:dev',
		'bower:copy',
		'sync:requirejs'
	] );
};
