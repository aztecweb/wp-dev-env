/**
 * Build for distribution environment
 *
 * @param {object} grunt The Grunt object.
 */
module.exports = function ( grunt ) {
	grunt.task.registerTask( 'dist', [
			'shell:install',
			'sync:theme',
			'stylint',
			'stylus:dist',
			'bower:copy',
			'sync:requirejs'
	]);
};
