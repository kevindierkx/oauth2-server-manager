<?php namespace OAuth;

use Illuminate\Database\Eloquent\Model;

class Scope extends Model {

	/**
	 * {@inheritDoc}
	 */
	protected $table = 'scopes';

	/**
	 * @var string
	 */
	protected static $clientsModel = 'OAuth\Client';

	/**
	 * Returns the client scopes relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function clients()
	{
		return $this->belongsToMany(static::$clientsModel, 'client_grants')->withTimestamps();
	}

}
