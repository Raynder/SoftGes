const mix = require('laravel-mix');

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

mix.copy('resources/css/adminlte.min.css', 'public/css/adminlte.min.css')
    .copy('resources/css/adminlte.min.css.map', 'public/css/adminlte.min.css.map');

mix.copy('resources/js/adminlte.min.js', 'public/js/adminlte.min.js')
    .copy('resources/js/adminlte.min.js.map', 'public/js/adminlte.min.js.map');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.css('resources/css/app.css', 'public/css');


mix.version();
