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
			test: /\.(gif|png|jpe?g|bmp)$/,
			loader: 'file-loader?name=[name].[ext]&outputPath=assets/images/'
		}, {
			test: /\.(svg)$/,
			loader: 'file-loader?name=[name].[ext]&outputPath=assets/images/svgs/'
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
            template: './resources/assets/js/config/svg-template.pug',
            svgoOptions: {
                plugins: [
                    { removeTitle: true },
                    { removeUselessDefs: true },
                    { cleanupIDs: { remove: false, minify: true }}
                ]}
        }),
		new webpack.ProvidePlugin({
			Vue: 'vue',
		})
	]
};