<?php namespace Manager;

use BaseController;
use Illuminate\View\Factory as ViewFactory;
use OAuth\ClientsRepository;

class ClientsController extends BaseController {

	/**
	 * @var \OAuth\ClientsRepository
	 */
	protected $clients;

	/**
	 * Bind view factory instance and clients repository to class.
	 *
	 * @param  \Illuminate\View\Factory  $viewFactory
	 * @param  \OAuth\ClientsRepository  $clients
	 */
	public function __construct(
		ViewFactory $viewFactory,
		ClientsRepository $clients
	)
	{
		parent::__construct($viewFactory);

		$this->clients = $clients;
	}

	/**
	 * List API clients.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$clients = $this->viewFactory->make('clients.index')
			->with(
				'clients',
				$this->clients->with('grants', 'scopes')->paginate()
			);

		return $this->layout
			->with('content', $clients);
	}

}
