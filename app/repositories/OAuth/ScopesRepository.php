<?php namespace OAuth;

class ScopesRepository {

	use \RepositoryTrait;

	/**
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	protected $model = '\OAuth\Scope';

}
