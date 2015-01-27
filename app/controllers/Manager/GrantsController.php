<?php namespace Manager;

use BaseController;
use Illuminate\View\Factory as ViewFactory;
use OAuth\GrantsRepository;

class GrantsController extends BaseController {

	/**
	 * @var \OAuth\GrantsRepository
	 */
	protected $grants;

	/**
	 * Bind view factory instance and grants repository to class.
	 *
	 * @param  \Illuminate\View\Factory  $viewFactory
	 * @param  \OAuth\GrantsRepository  $grants
	 */
	public function __construct(
		ViewFactory $viewFactory,
		GrantsRepository $grants
	)
	{
		parent::__construct($viewFactory);

		$this->grants = $grants;
	}

	/**
	 * List API grants.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$grants = $this->viewFactory->make('grants.index')
			->with(
				'grants',
				$this->grants->get()
			);

		return $this->layout
			->with('content', $grants);
	}

}
