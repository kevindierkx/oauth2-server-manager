<?php namespace Manager;

use Illuminate\Support\ServiceProvider;

class ManagerServiceProvider extends ServiceProvider {

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
		$this->router->get(
			'/',
			[
				'as'   => 'manager.index',
				'uses' => 'Manager\ManagerController@index'
			]
		);
	}

}
