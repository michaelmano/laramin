const mix = require('laravel-mix');
const SvgStore = require('webpack-svgstore-plugin');
const webpack = require('webpack');

mix.webpackConfig({
	devtool: "inline-source-map",
	plugins: [
		new SvgStore.Options({
			template: './resources/assets/js/config/svg-template.pug',
			svgoOptions: {
				plugins: [
					{ removeTitle: true },
					{ removeUselessDefs: true },
					{ cleanupIDs: { remove: false, minify: true }}
				]}
		})
	],
});

mix.js('resources/assets/js/laramin.js', 'src/assets/js')
	.sass('resources/assets/sass/laramin.scss', 'src/assets/css');