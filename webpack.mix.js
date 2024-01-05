const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/pallet.js', 'public/js')
    .js('resources/js/accordion.js', 'public/js')
    .autoload({ "jquery": ['$', 'window.jQuery'], })
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ])
    .postCss('resources/css/accordion.css', 'public/css')
    .styles('resources/css/pallet.css', 'public/css/pallet.css'); // .postCssではエラー発生するので注意
