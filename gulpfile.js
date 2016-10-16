var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass([
        'awt.scss',
        'srs.scss'
    ], 'public/assets/css/awt.css');

    // mix.less('materialadmin.less', 'public/assets/css');

    mix.scripts('awt.js', 'public/assets/js');

    mix.scripts('stats.js', 'public/assets/js');

    mix.scripts('domain.validation.js', 'public/assets/js');

    mix.scripts('ssl.info.js', 'public/assets/js');

    mix.scripts('domain.check.js', 'public/assets/js');

    mix.styles([
        'bootstrap.css',
        'font-awesome.css',
        'animate.css',
        'slick.css',
        'toastr.css',
        'materialadmin.css',
        'material.iconic.min.css'
    ], 'public/assets/css/dep.css');

    mix.scripts([
        'jquery.min.js',
        'bootstrap.js',
        'bootbox.min.js',
        'jquery.validate.js',
        'additional-methods.js',
        'jquery.nanoscroller.js',
        'slick.js',
        'spin.js',
        'toastr.js',
        'App.js',
        'AppCard.js',
        'AppForm.js',
        'AppOffcanvas.js',
        'AppToast.js',
        'AppVendor.js'
    ], 'public/assets/js/dep.js');

    mix.scripts([
        'node_modules/vue/dist/vue.js'
    ], 'public/assets/js/vue.js', './')
});