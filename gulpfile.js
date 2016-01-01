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

elixir(function (mix) {
    mix.styles(
        [
            'bootstrap.css',
            'font-awesome.css',
            'select2.css',
            'custom.css',
        ]);

    mix.scripts(
        [
            'jquery-2.1.4.js',
            'bootstrap.js',
            'select2.js',
            'include.js',
        ]
    );

    mix.version(['js/all.js', 'css/all.css']);
});

elixir(function (mix) {
    mix.styles(['octicons.css'], 'public/css/octicons.css');
    mix.styles(['github-activity.css'], 'public/css/github-activity.css');
    mix.styles(['summernote.css'], 'public/css/summernote.css');

    mix.scripts('mustache.js', 'public/js/mustache.js');
    mix.scripts('summernote.js', 'public/js/summernote.js');
    mix.scripts('github-activity.js', 'public/js/github-activity.js');

    mix.copy('resources/assets/fonts', 'public/build/fonts');
    mix.copy('resources/assets/img', 'public/build/img');

});
