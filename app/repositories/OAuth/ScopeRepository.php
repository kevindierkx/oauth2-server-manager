<?php namespace OAuth;

use Illuminate\Events\Dispatcher;

class ScopeRepository implements ScopeRepositoryInterface {

	use \RepositoryTrait;
	use \EventTrait;

	/**
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	protected $model = '\OAuth\Scope';

	/**
	 * Bind the event dispatcher to the class.
	 *
	 * @param  \Illuminate\Events\Dispatcher  $dispatcher
	 */
	public function __construct(Dispatcher $dispatcher)
	{
		$this->dispatcher = $dispatcher;
	}

	/**
	 * Create a new scope.
	 *
	 * @param  string  $id
	 * @param  string  $description
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function create($id, $description)
	{
		$scope = $this->createModel();

		$this->fireEvent(
			'oauth.scope.creating',
			compact('id', 'description')
		);

		// Here we create a new scope.
		$scope->id = $id;
		$scope->description = $description;
		$scope->save();

		$this->fireEvent(
			'oauth.scope.created',
			compact('id', 'description')
		);

		return $scope;
	}

}
