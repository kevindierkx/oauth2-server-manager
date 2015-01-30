<?php namespace OAuth;

use OAuth\GrantRepositoryInterface;

class GrantsComposer {

	/**
	 * @var \OAuth\GrantRepositoryInterface
	 */
	protected $grants;

	/**
	 * Bind grants repository to class.
	 *
	 * @param \OAuth\GrantRepositoryInterface  $grants
	 */
	public function __construct(GrantRepositoryInterface $grants)
	{
		$this->grants = $grants;
	}

	/**
	 * Bind grants to view.
	 *
	 * @param  \Illuminate\View\View  $view
	 */
	public function compose($view)
	{
		$view->with('grants', $this->grants->all());
	}

}
