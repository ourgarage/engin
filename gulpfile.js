const elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.copy('node_modules/jquery/dist', 'public/libs/jquery');
    mix.copy('node_modules/bootstrap/dist', 'public/libs/bootstrap');
    mix.copy('node_modules/font-awesome/css', 'public/libs/font-awesome/css');
    mix.copy('node_modules/font-awesome/fonts', 'public/libs/font-awesome/fonts');
    mix.copy('node_modules/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css', 'public/libs/awesome-bootstrap-checkbox');
    mix.copy('node_modules/tinymce', 'public/libs/tinymce');
});
