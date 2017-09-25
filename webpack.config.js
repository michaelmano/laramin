let webpack = require('webpack'),
	path = require('path'),
	ExtractTextPlugin = require('extract-text-webpack-plugin'),
	SvgStore = require('webpack-svgstore-plugin');

module.exports = {
	entry : {
		laramin: './resources/assets/js/app.js',
	},
	output: {
		filename: 'assets/js/[name].js',
		path: path.resolve(__dirname, './src/')
	},
	devtool: 'cheap-module-source-map',
	module: {
		rules: [{
			test: /\.js$/,
			loader: 'babel-loader?presets[]=es2015'
		}, {
			test: /\.scss$/,
			use: ExtractTextPlugin.extract({
				use: [
					{ loader: 'css-loader?importLoaders=1!postcss-loader' },
					{ loader: 'sass-loader' }
				],
				fallback: 'style-loader'
			})
		}, {
			test: /\.(gif|png|jpe?g|bmp|svg)$/,
			loader: 'file-loader?name=[name].[ext]&outputPath=assets/images/'
		}, {
			test: /\.vue$/,
			loader: 'vue-loader'
		}]
	},
	resolve: {
		alias: {
			'vue$': 'vue/dist/vue.esm.js'
		}
	},
	plugins: [
		new ExtractTextPlugin({
			filename: 'assets/css/laramin.css',
			allChunks: true
		}),
		new SvgStore.Options({
			svgoOptions: {
				plugins: [
					{ removeTitle: true }
				]
			}
		}),
		new webpack.ProvidePlugin({
			Vue: 'vue',
		})
	]
};