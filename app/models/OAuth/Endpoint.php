<?php namespace OAuth;

use Illuminate\Database\Eloquent\Model;

class Endpoint extends Model {

	/**
	 * {@inheritDoc}
	 */
	protected $table = 'client_endpoints';

	/**
	 * @var string
	 */
	protected static $clientsModel = 'OAuth\Client';

	/**
	 * Returns the client endpoint relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function clients()
	{
		return $this->belongsTo(static::$clientsModel);
	}

}
