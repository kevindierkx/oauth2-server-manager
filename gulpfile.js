var elixir = require('laravel-elixir');
var config = elixir.config;

var paths = {
    bootstrap: 'bower_components/bootstrap-sass-official/assets/'
}

elixir(function(mix) {
	mix.sass(
			'manager.scss',
			'public/css/',
			{
				includePaths: [
					config.bowerDir + 'bootstrap-sass-official/assets/stylesheets/'
				]
			}
		).version('css/manager.css');
});
