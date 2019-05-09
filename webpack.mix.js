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
// mix.scripts([
//             'resources/js/app.js', // this is webpack js
//             'resources/lottery/app.js', // this is jquery included js
//         ],
//         'public/dist/js/app.js')
//     .sass('resources/sass/app.scss', 'public/dist/css');
mix.js('resources/js/app.js', 'public/dist/js/app.js')
    .sass('resources/sass/app.scss', 'public/dist/css');
