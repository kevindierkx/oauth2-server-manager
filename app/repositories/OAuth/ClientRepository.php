<?php namespace OAuth;

use Illuminate\Events\Dispatcher;

class ClientRepository implements ClientRepositoryInterface {

	use \RepositoryTrait;
	use \EventTrait;

	/**
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	protected $model = '\OAuth\Client';

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
	 * Create a new client.
	 *
	 * @param  string  $name
	 * @param  string  $redirectUri
	 * @param  array   $grants
	 * @param  array   $scopes
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function create($name, $redirectUri, array $grants, array $scopes)
	{
		$client = $this->createModel();

		$this->fireEvent(
			'oauth.client.creating',
			compact('client', 'name', 'redirectUri', 'grants', 'scopes')
		);

		// Here we create a new client. The client id and secret will be added during creation.
		// The client needs to be saved before adding the endpoint, grant and scope relations.
		$client->name = $name;
		$client->save();

		// Here we get the related model of the endpoint for the new client.
		// At this point the model doesn't exist. We fill the model with the
		// provided data and save it.
		$endpoint = $client->endpoint()->getRelated();

		$endpoint->client_id    = $client->getKey();
		$endpoint->redirect_uri = $redirectUri;
		$endpoint->save();

		// Lastly we loop trough the provided grants and scopes.
		// Since these are many to many relationships we can simply
		// attach them this will create a new pivot entry.
		foreach ($grants as $grant) {
			$client->grants()->attach($grant);
		}

		foreach ($scopes as $scope) {
			$client->scopes()->attach($scope);
		}

		$this->fireEvent(
			'oauth.client.created',
			compact('client', 'name', 'redirectUri', 'grants', 'scopes')
		);

		return $client;
	}

}
