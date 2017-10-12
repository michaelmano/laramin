const mix = require('laravel-mix');

mix.js('resources/assets/js/laramin.js', 'src/assets/js')
	.sass('resources/assets/sass/laramin.scss', 'src/assets/css');