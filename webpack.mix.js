let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/app/js/app.js', 'public/js')
   .sass('resources/assets/app/sass/app.scss', 'public/css')
    .options({
            processCssUrls: false
    });

mix.js('resources/assets/admin/js/admin.js', 'public/js')
    .sass('resources/assets/admin/sass/admin.scss', 'public/css');
