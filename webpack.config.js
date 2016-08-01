module.exports = {
	entry: [
		'.src/App.js'
	],
	output: {
		path: ___dirname,
		filename: 'app.js'
	},
	module: {
		loader: [{
			test: /\.jsx?$/,
			loader: 'babel'
		}]
	}
};