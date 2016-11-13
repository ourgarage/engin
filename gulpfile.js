const elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.copy('node_modules/jquery/dist', 'public/libs/downloaded/jquery');
    mix.copy('node_modules/bootstrap/dist', 'public/libs/downloaded/bootstrap');
    mix.copy('node_modules/font-awesome/css', 'public/libs/downloaded/font-awesome/css');
    mix.copy('node_modules/font-awesome/fonts', 'public/libs/downloaded/font-awesome/fonts');
    mix.copy('node_modules/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css', 'public/libs/downloaded/awesome-bootstrap-checkbox');
    mix.copy('node_modules/tinymce', 'public/libs/downloaded/tinymce');
    mix.copy('node_modules/vue/dist', 'public/libs/downloaded/vue');
    mix.copy('node_modules/vue-resource/dist', 'public/libs/downloaded/vue-resource');
    mix.copy('node_modules/bootstrap-datepicker/dist', 'public/libs/downloaded/bootstrap-datepicker');
    mix.copy('node_modules/spinline/src', 'public/libs/downloaded/spinline');
});
