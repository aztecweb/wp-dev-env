/**
 * Sync the files with local test wordpress
 */
module.exports = {
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
};
