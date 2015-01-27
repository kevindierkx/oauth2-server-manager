<?php namespace Manager;

use Illuminate\Support\ServiceProvider;

class ClientsServiceProvider extends ServiceProvider {

	/**
	 * @var \Illuminate\Routing\Router
	 */
	protected $router;

	/**
	 * {@inheritdoc}
	 */
	public function __construct($app)
	{
		parent::__construct($app);

		$this->router = $app['router'];
	}

	/**
	 * Register manager routes.
	 */
	public function register()
	{
		$this->router->resource(
			'clients', 'Manager\ClientsController',
			[
				'except' => ['destroy'],
			]
		);
	}

}
