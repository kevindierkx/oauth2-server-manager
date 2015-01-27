<?php namespace Manager;

use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;

class ManagerController extends Controller {

	/**
	 * @var \Illuminate\Routing\Redirector
	 */
	protected $redirector;

	/**
	 * Bind redirector to class.
	 *
	 * @param  \Illuminate\Routing\Redirector  $redirector
	 */
	public function __construct(Redirector $redirector)
	{
		$this->redirector = $redirector;
	}

	/**
	 * Redirect to API clients.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function index()
	{
		return $this->redirector->route('clients.index');
	}

}
