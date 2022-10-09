/*
 * Five Star Clean uses Laravel Mix
 *
 * Check the documentation at
 * https://laravel-mix.com/docs/6.0/what-is-mix
 */

let mix = require( 'laravel-mix' );

// Autloading jQuery to make it accessible to all the packages.
mix.autoload({
	jquery: ['$', 'window.jQuery', 'jQuery'],
});

// mix.browserSync( 'http://localhost:10008' );

mix.setPublicPath( './assets/dist' );

mix.options({
	processCssUrls: false,
});

mix.disableSuccessNotifications();

// Compile assets
mix.js( 'assets/src/scripts/app.js', 'assets/dist/js' )
	//  .js( 'assets/src/scripts/admin/check_before_theme-custom-css-page.js', 'assets/dist/js/admin' )
	 .sass( 'assets/src/sass/style.scss', 'assets/dist/css' )
	//  .sass( 'assets/src/sass/admin/check_before_theme-custom-css-page.scss', 'assets/dist/css/admin' )
	 .copy( 'node_modules/@fortawesome/fontawesome-free/webfonts', 'assets/dist/webfonts' )
	//  .copy( 'assets/src/scripts/admin/ace', 'assets/dist/js/admin/ace' );

// Add versioning to assets in production environment
if ( mix.inProduction() ) {
	mix.version();
}
