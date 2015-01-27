<?php namespace OAuth;

class ClientsRepository {

	use \RepositoryTrait;

	/**
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	protected $model = '\OAuth\Client';

}
