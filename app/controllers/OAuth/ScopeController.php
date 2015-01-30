<?php namespace OAuth;

use BaseController;
use Illuminate\View\Factory as ViewFactory;
use OAuth\ScopeRepositoryInterface;

class ScopeController extends BaseController {

	/**
	 * @var \OAuth\ScopeRepositoryInterface
	 */
	protected $scopes;

	/**
	 * Bind required instances to the class.
	 *
	 * @param  \Illuminate\View\Factory         $viewFactory
	 * @param  \OAuth\ScopeRepositoryInterface  $scopes
	 */
	public function __construct(
		ViewFactory $viewFactory,
		ScopeRepositoryInterface $scopes
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
		$content = $this->viewFactory->make('scopes.index')
			->with(
				'scopes',
				$this->scopes->paginate()
			);

		return $this->layout
			->with('content', $content);
	}

}
