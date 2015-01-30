<?php namespace OAuth;

class ScopeRepository implements ScopeRepositoryInterface {

	use \RepositoryTrait;

	/**
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	protected $model = '\OAuth\Scope';

}
