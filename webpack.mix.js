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

mix
  //----------------------------------------------------------------------
  // App
  //----------------------------------------------------------------------
  // AdminLte - CSS
  .copy('./node_modules/admin-lte/dist/css/adminlte.min.css', './public/assets/app/css/adminlte.min.css')
  .copy('./node_modules/admin-lte/dist/css/adminlte.min.css.map', './public/assets/app/css/adminlte.min.css.map')

  // AdminLte - JS
  .copy('./node_modules/admin-lte/dist/js/adminlte.min.js', './public/assets/app/js/adminlte.min.js')
  .copy('./node_modules/admin-lte/dist/js/adminlte.min.js.map', './public/assets/app/js/adminlte.min.js.map')

  // AdminLte - Plugin: jquery
  .copy('./node_modules/admin-lte/plugins/jquery/jquery.min.js', './public/assets/app/plugins/jquery/jquery.min.js')
  .copy('./node_modules/admin-lte/plugins/jquery/jquery.min.map', './public/assets/app/plugins/jquery/jquery.min.map')

  // AdminLte - Plugin: bootstrap
  .copy('./node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js', './public/assets/app/plugins/bootstrap/js/bootstrap.bundle.min.js')
  .copy('./node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js.map', './public/assets/app/plugins/bootstrap/js/bootstrap.bundle.min.js.map')

  // AdminLte - Plugin: Fontawesome
  .copyDirectory('./node_modules/admin-lte/plugins/fontawesome-free', './public/assets/app/plugins/fontawesome-free')

  // AdminLte - Plugin: overlayScrollbars
  .copyDirectory('./node_modules/admin-lte/plugins/overlayScrollbars', './public/assets/app/plugins/overlayScrollbars')

  // AdminLte - Plugin: SweetAlert2
  .copyDirectory('./node_modules/admin-lte/plugins/sweetalert2', './public/assets/app/plugins/sweetalert2')

  .js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css');
