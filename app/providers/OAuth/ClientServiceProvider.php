<?php namespace OAuth;

use Illuminate\Support\ServiceProvider;
use OAuth\ClientRepository;

class ClientServiceProvider extends ServiceProvider {

	/**
	 * {@inheritdoc}
	 */
	public function boot()
	{
		$this->app->bind('OAuth\ClientRepositoryInterface', function ($app) {
			return $app['oauth.clients'];
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
	 * Register the client repository.
	 */
	protected function registerRepository()
	{
		$this->app->bindShared('oauth.clients', function ($app) {
			return new ClientRepository($app['events']);
		});
	}

	/**
	 * Register the client routes.
	 */
	protected function registerRoutes()
	{
		$this->app->booted(function ($app) {

			# Clients
			$app['router']->resource(
				'clients', 'OAuth\ClientController',
				[
					'names' => [
						'index'  => 'oauth.clients.index',
						'create' => 'oauth.clients.create',
						'store'  => 'oauth.clients.store',
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
			'oauth.clients',
			'OAuth\ClientRepositoryInterface'
		];
	}

}
