const elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */
/*
elixir((mix) => {
    mix.sass('app.scss') //sass brakes gulp :S
       .webpack('app.js');
});
*/
elixir((mix) => {
    mix.webpack('app.js')
        .webpack('admin.js');
});
