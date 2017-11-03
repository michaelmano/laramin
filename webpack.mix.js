const mix = require('laravel-mix');

mix.js('resources/assets/js/laramin.js', 'src/assets/js')
	.sass('resources/assets/sass/laramin.scss', 'src/assets/css')
	.copy('node_modules/font-awesome/fonts/*', 'src/assets/fonts')
	.copy('node_modules/@ckeditor/ckeditor5-build-classic/build/', 'src/assets/js', false);