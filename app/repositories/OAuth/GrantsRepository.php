<?php namespace OAuth;

class GrantsRepository {

	use \RepositoryTrait;

	/**
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	protected $model = '\OAuth\Grant';

}
