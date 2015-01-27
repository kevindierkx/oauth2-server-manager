<?php namespace Manager;

use BaseController;
use Illuminate\View\Factory as ViewFactory;
use OAuth\ScopesRepository;

class ScopesController extends BaseController {

	/**
	 * @var \OAuth\ScopesRepository
	 */
	protected $scopes;

	/**
	 * Bind view factory instance and scopes repository to class.
	 *
	 * @param  \Illuminate\View\Factory  $viewFactory
	 * @param  \OAuth\ScopesRepository  $scopes
	 */
	public function __construct(
		ViewFactory $viewFactory,
		ScopesRepository $scopes
	)
	{
		parent::__construct($viewFactory);

		$this->scopes = $scopes;
	}

	/**
	 * List API scopes.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$scopes = $this->viewFactory->make('scopes.index')
			->with(
				'scopes',
				$this->scopes->paginate()
			);

		return $this->layout
			->with('content', $scopes);
	}

}
