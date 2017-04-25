/**
 * Build for development environment
 *
 * @param {object} grunt The Grunt object.
 */
module.exports = function ( grunt ) {
	grunt.task.registerTask( 'default', [
			'shell:install',
			'sync:theme',
			'stylint',
			'stylus:dev',
			'bower:copy',
			'sync:requirejs',
			'shell:data'
	]);
};
