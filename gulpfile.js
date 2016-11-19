const elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.copy('node_modules/jquery/dist', 'public/libs/jquery');
    mix.copy('node_modules/bootstrap/dist', 'public/libs/bootstrap');
    mix.copy('node_modules/font-awesome/css', 'public/libs/font-awesome/css');
    mix.copy('node_modules/font-awesome/fonts', 'public/libs/font-awesome/fonts');
    mix.copy('node_modules/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css', 'public/libs/awesome-bootstrap-checkbox');
    mix.copy('node_modules/tinymce', 'public/libs/tinymce');
    mix.copy('node_modules/vue/dist', 'public/libs/vue');
    mix.copy('node_modules/vue-resource/dist', 'public/libs/vue-resource');
    mix.copy('node_modules/eonasdan-bootstrap-datetimepicker/build', 'public/libs/eonasdan-bootstrap-datetimepicker');
    mix.copy('node_modules/spinline/src', 'public/libs/spinline');
    mix.copy('node_modules/admin-lte/dist', 'public/libs/adminLTE/dist');
    mix.copy('node_modules/admin-lte/plugins', 'public/libs/adminLTE/plugins');
    mix.copy('node_modules/moment/min/moment-with-locales.min.js', 'public/libs/moment');
    mix.copy('node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js', 'public/libs/bootstrap-tagsinput');
    mix.copy('node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css', 'public/libs/bootstrap-tagsinput');
});
