<?php namespace OAuth;

use BaseController;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Factory as ValidationFactory;
use Illuminate\View\Factory as ViewFactory;
use OAuth\GrantRepositoryInterface;

class GrantController extends BaseController {

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
	 * @var \OAuth\GrantRepositoryInterface
	 */
	protected $grants;

	/**
	 * @var array
	 */
	protected $rules = [
		'create' => [
			'id'	=> 'required|unique:grants',
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
	 * @param  \OAuth\GrantRepositoryInterface  $grants
	 */
	public function __construct(
		Request $request,
		Redirector $redirector,
		ValidationFactory $validationFactory,
		ViewFactory $viewFactory,
		GrantRepositoryInterface $grants
	)
	{
		parent::__construct($viewFactory);

		$this->request = $request;

		$this->redirector = $redirector;

		$this->validationFactory = $validationFactory;

		$this->grants = $grants;
	}

	/**
	 * List API grants.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$content = $this->viewFactory->make('grants.index')
			->with(
				'grants',
				$this->grants->get()
			);

		return $this->layout
			->with('content', $content);
	}

	/**
	 * Display create grant form.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		$content = $this->viewFactory->make('grants.create');

		return $this->layout
			->with('content', $content);
	}

	/**
	 * Store the grant
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
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

		$this->grants->create(
			$this->request->get('id')
		);

		return $this->redirector->route('oauth.grants.index')
			->with('success', "Grant added successfully.");
	}

}
