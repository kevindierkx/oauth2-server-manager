<?php namespace OAuth;

use BaseController;
use Illuminate\View\Factory as ViewFactory;
use OAuth\GrantRepositoryInterface;

class GrantController extends BaseController {

	/**
	 * @var \OAuth\GrantRepositoryInterface
	 */
	protected $grants;

	/**
	 * Bind required instances to the class.
	 *
	 * @param  \Illuminate\View\Factory         $viewFactory
	 * @param  \OAuth\GrantRepositoryInterface  $grants
	 */
	public function __construct(
		ViewFactory $viewFactory,
		GrantRepositoryInterface $grants
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
		$content = $this->viewFactory->make('grants.index')
			->with(
				'grants',
				$this->grants->get()
			);

		return $this->layout
			->with('content', $content);
	}

}
