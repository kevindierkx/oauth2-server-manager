<?php namespace OAuth;

class GrantRepository implements GrantRepositoryInterface {

	use \RepositoryTrait;

	/**
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	protected $model = '\OAuth\Grant';

}
