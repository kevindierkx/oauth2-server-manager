<?php

use Illuminate\View\Factory as ViewFactory;

class BaseController extends Controller {

	/**
	 * @var \Illuminate\View\View
	 */
	protected $layout = 'layouts.master';

	/**
	 * @var \Illuminate\View\Factory
	 */
	protected $viewFactory;

	/**
	 * Bind view factory instance to class.
	 *
	 * @param  \Illuminate\View\Factory  $viewFactory
	 */
	public function __construct(ViewFactory $viewFactory)
	{
		$this->viewFactory = $viewFactory;
	}

	/**
	 * Setup the layout used by the controller.
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout) ) {
			$this->layout = $this->viewFactory->make($this->layout);
		}
	}

}
