var elixir = require('laravel-elixir');
var config = elixir.config;

elixir(function(mix) {
	mix.copy(
		config.bowerDir + 'jquery/dist/jquery.min.js',
		config.jsOutput + 'jquery.min.js'
	).copy(
		config.bowerDir + 'bootstrap-sass-official/assets/javascripts/bootstrap.min.js',
		config.jsOutput + 'bootstrap.min.js'
	).scripts(
		['jquery.min.js', 'bootstrap.min.js'],
		config.jsOutput,
		config.jsOutput
	).sass(
		'manager.scss',
		'public/css/',
		{
			includePaths: [
				config.bowerDir + 'bootstrap-sass-official/assets/stylesheets/'
			]
		}
	).version([
		'css/manager.css',
		'js/all.js'
	]);
});
