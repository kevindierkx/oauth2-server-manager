<?php namespace OAuth;

use BaseController;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Factory as ValidationFactory;
use Illuminate\View\Factory as ViewFactory;
use OAuth\ClientRepositoryInterface;

class ClientController extends BaseController {

	/**
	 * @var \Illuminate\Http\Request
	 */
	protected $request;

	/**
	 * @var \Illuminate\Routing\Redirector
	 */
	protected $redirector;

	/**
	 * @var \Illuminate\Validation\Factory
	 */
	protected $validationFactory;

	/**
	 * @var \OAuth\ClientRepositoryInterface
	 */
	protected $clients;

	/**
	 * @var array
	 */
	protected $rules = [
		'create' => [
			'name'         => 'required',
			'redirect_uri' => 'required',
		],
	];

	/**
	 * Bind required instances to the class.
	 *
	 * @param  \Illuminate\Http\Request          $request
	 * @param  \Illuminate\Routing\Redirector    $redirector
	 * @param  \Illuminate\Validation\Factory    $validationFactory
	 * @param  \Illuminate\View\Factory          $viewFactory
	 * @param  \OAuth\ClientRepositoryInterface  $clients
	 */
	public function __construct(
		Request $request,
		Redirector $redirector,
		ValidationFactory $validationFactory,
		ViewFactory $viewFactory,
		ClientRepositoryInterface $clients
	)
	{
		parent::__construct($viewFactory);

		$this->request = $request;

		$this->redirector = $redirector;

		$this->validationFactory = $validationFactory;

		$this->clients = $clients;
	}

	/**
	 * List API clients.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$content = $this->viewFactory->make('clients.index')
			->with(
				'clients',
				$this->clients->with('endpoint', 'grants', 'scopes')->paginate()
			);

		return $this->layout
			->with('content', $content);
	}

	/**
	 * Display create client form.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		$content = $this->viewFactory->make('clients.create');

		return $this->layout
			->with('content', $content);
	}


	public function store()
	{
		$validator = $this->validationFactory->make(
			$this->request->except('_token', 'submit'),
			$this->rules['create']
		);

		if ( $validator->fails() ) {
			return $this->redirector->back()
				->withInput()
				->withErrors($validator);
		}

		$this->clients->create(
			$this->request->get('name'),
			$this->request->get('redirect_uri'),
			(array) $this->request->get('grants'),
			(array) $this->request->get('scopes')
		);

		return $this->redirector->route('oauth.clients.index')
			->with('success', "Client added successfully.");
	}

}
