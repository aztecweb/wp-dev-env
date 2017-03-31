/**
 * The RequireJS main file.
 * 
 * Config the app and libs paths. The libs is automagically loaded with the 
 * grunt-bower task.
 */
requirejs.config({
    baseUrl: myenvpress.base_url,
    paths: {
        app: '../app',
        libs: '../libs'
    }
});

// define the WordPress jQuery as a module
if (typeof jQuery === 'function') {
	define('jquery', function() {
		return jQuery;
	});
}

// start the application
requirejs( [ 'jquery', 'app/sub' ], function( $, sub ) {
	// example function calls
	console.log( $.fn.jquery );
	sub.print();
});
