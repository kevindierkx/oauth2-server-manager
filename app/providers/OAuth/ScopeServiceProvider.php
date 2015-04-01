<?php namespace OAuth;

use Illuminate\Support\ServiceProvider;
use OAuth\ScopeRepository;

class ScopeServiceProvider extends ServiceProvider {

	/**
	 * {@inheritdoc}
	 */
	public function boot()
	{
		$this->app->bind('OAuth\ScopeRepositoryInterface', function ($app) {
			return $app['oauth.scopes'];
		});
	}

	/**
	 * {@inheritDoc}
	 */
	public function register()
	{
		$this->registerRepository();
		$this->registerRoutes();
	}

	/**
	 * Register the scope repository.
	 */
	protected function registerRepository()
	{
		$this->app->bindShared('oauth.scopes', function ($app) {
			return new ScopeRepository($app['events']);
		});
	}

	/**
	 * Register the scope routes.
	 */
	public function registerRoutes()
	{
		$this->app->booted(function ($app) {

			# Scopes
			$app['router']->resource(
				'scopes', 'OAuth\ScopeController',
				[
					'names' => [
						'index' => 'oauth.scopes.index',
						'create' => 'oauth.scopes.create',
						'store'  => 'oauth.scopes.store',
					],
					'except' => ['show', 'edit', 'update', 'destroy'],
				]
			);

		});
	}

	/**
	 * {@inheritDoc}
	 */
	public function provides()
	{
		return [
			'oauth.scopes',
			'OAuth\ScopeRepositoryInterface'
		];
	}

}
