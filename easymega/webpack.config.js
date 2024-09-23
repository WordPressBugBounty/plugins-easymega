const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const path = require('path');


module.exports = {
	entry: ["./assets/sass/style.scss"],
	output: {
		path: path.resolve(__dirname, 'assets'),
	},
	watchOptions: {
		ignored: ['assets/**/*.scss', './node_modules'],
	},
	module: {
		rules: [
			{
				test: /\.(sa|sc)ss$/,
				use: [
					MiniCssExtractPlugin.loader,
					'css-loader',
					'sass-loader'
				]
			},
		]
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: 'css/style.css',
		})
	]
};