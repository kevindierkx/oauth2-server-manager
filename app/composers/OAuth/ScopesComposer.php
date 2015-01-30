<?php namespace OAuth;

use OAuth\ScopeRepositoryInterface;

class ScopesComposer {

	/**
	 * @var \OAuth\ScopeRepositoryInterface
	 */
	protected $scopes;

	/**
	 * Bind scopes repository to class.
	 *
	 * @param \OAuth\ScopeRepositoryInterface  $scopes
	 */
	public function __construct(ScopeRepositoryInterface $scopes)
	{
		$this->scopes = $scopes;
	}

	/**
	 * Bind scopes to view.
	 *
	 * @param  \Illuminate\View\View  $view
	 */
	public function compose($view)
	{
		$view->with('scopes', $this->scopes->all());
	}

}
