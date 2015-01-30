<?php namespace OAuth;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model {

	/**
	 * {@inheritDoc}
	 */
	protected $table = 'grants';

	/**
	 * @var string
	 */
	protected static $clientsModel = 'OAuth\Client';

	/**
	 * Returns the client grants relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function clients()
	{
		return $this->belongsToMany(static::$clientsModel, 'client_grants')->withTimestamps();
	}

}
