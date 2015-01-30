<?php

use Illuminate\Support\ServiceProvider;

class ManagerServiceProvider extends ServiceProvider {

	/**
	 * {@inheritDoc}
	 */
	public function register()
	{
		$this->registerRoutes();
	}

	/**
	 * Register the manager routes.
	 */
	public function registerRoutes()
	{
		$this->app->booted(function ($app) {

			# Manager
			$app['router']->get(
				'/',
				[
					'as'   => 'manager.index',
					'uses' => 'ManagerController@index'
				]
			);

		});
	}

}
