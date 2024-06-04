const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .postCss('resources/css/sb-admin-2.min.css', 'public/css')
   .copy('resources/vendor/fontawesome-free', 'public/vendor/fontawesome-free')
   .copy('resources/vendor/jquery', 'public/vendor/jquery')
   .copy('resources/vendor/bootstrap/js', 'public/vendor/bootstrap/js')
   .copy('resources/vendor/jquery-easing', 'public/vendor/jquery-easing');
