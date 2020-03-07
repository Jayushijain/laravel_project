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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

   mix.styles([
    'resources/assets/backend/css/bootstrap.css',
    'resources/assets/backend/css/custom.css',
    'resources/assets/backend/css/neon-core.css',
    'resources/assets/backend/css/neon-forms.css',
    'resources/assets/backend/css/neon-theme.css',
    'resources/assets/frontend/css/bootstrap.min.css',
    'resources/assets/frontend/css/style.css'

], 'public/css/libs.css');

mix.scripts([
    'resources/assets/backend/js/bootstrap.js',
    'resources/assets/backend/js/fileinput.js',
    'resources/assets/backend/js/neon-chat.js',
    'resources/assets/backend/js/neon-custom.js',
    'resources/assets/frontend/js/custom_scripts.js'

], 'public/js/libs.js');