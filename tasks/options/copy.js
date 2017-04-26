/**
 * Copy files to some destination
 */
module.exports = {
	config: {
		files: [
			{
				expand: true,
				flatten: true,
				src: [ 'extra/wp-config.php' ],
				dest: 'public/'
			}
		]
	}
};
