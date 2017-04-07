/**
 * Compile stylus file
 */
module.exports = {
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
}
