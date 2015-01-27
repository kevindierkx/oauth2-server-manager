<?php namespace OAuth;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

	/**
	 * {@inheritDoc}
	 */
	protected $table = 'clients';

	/**
	 * @var string
	 */
	protected static $grantsModel = '\OAuth\Grant';

	/**
	 * @var string
	 */
	protected static $scopesModel = '\OAuth\Scope';

	/**
	 * Returns the client grants relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function grants()
	{
		return $this->BelongsToMany(static::$grantsModel, 'client_grants');
	}

	/**
	 * Returns the client scopes relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function scopes()
	{
		return $this->BelongsToMany(static::$scopesModel, 'client_scopes');
	}

}
