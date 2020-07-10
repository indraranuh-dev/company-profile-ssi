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

mix.options({
    processCssUrls: false
});

mix.js('resources/assets/static/js/app.js', 'public/js')
    .js('resources/assets/static/js/main.js', 'public/js')
    .sass('resources/assets/static/sass/app.scss', 'public/css')
    .sass('resources/assets/static/sass/preloader.scss', 'public/css');

mix.styles([
    'resources/assets/static/vendor/icofont/icofont.css',
    'resources/assets/static/vendor/remixicon/remixicon.css',
    'resources/assets/static/vendor/boxicons/boxicons.css',
    'resources/assets/static/vendor/owl.carousel/assets/owl.carousel.css',
    'resources/assets/static/vendor/venobox/venobox.css',
    'resources/assets/static/vendor/aos/aos.css',
], 'public/css/vendor.css').version();

mix.js([
    'resources/assets/static/vendor/jquery.easing/jquery.easing.min.js',
    'resources/assets/static/vendor/waypoints/jquery.waypoints.min.js',
    'resources/assets/static/vendor/counterup/counterup.min.js',
    'resources/assets/static/vendor/owl.carousel/owl.carousel.min.js',
    'resources/assets/static/vendor/venobox/venobox.min.js',
], 'public/js/vendor.js').version();

mix.js('resources/assets/admin/js/app.js', 'public/js/main')
    .sass('resources/assets/admin/sass/app.scss', 'public/css/main');

mix.js([
    'resources/assets/admin/js/main/waves.js',
    'resources/assets/admin/js/main/sidebarmenu.js',
    'resources/assets/admin/js/main/custom.js',
], 'public/js/main/main.js').version();

mix.copyDirectory([
    'resources/assets/admin/js/libs'
], 'public/libs');

// mix.minify([
//     'public/css/app.css',
//     'public/css/preloader.css',
//     'public/css/vendor.css',
//     'public/css/main/app.css',
//     'public/css/main/datatables.css',
//     'public/css/main/fonts.css',
//     'public/js/app.js',
//     'public/js/main.js',
//     'public/js/vendor.js',
//     'public/js/main/app.js',
//     'public/js/main/stack.js',
// ])
