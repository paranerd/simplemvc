<?php

namespace SimpleMVC\Base;

use SimpleMVC\Services\Request;
use SimpleMVC\Services\Response;
use SimpleMVC\Services\Route;

class BaseController {
	public function __construct() {
		$this->request = Request::get();
		$this->response = Response::get();
		$this->route = Route::get();
	}

	/**
	 * @brief Handle calls to mising methods
	 *
	 * @param  string  $method
	 * @param  array   $parameters
	 * @return mixed
	 *
	 * @throws \Exception
	 */
	public function __call($method, $parameters) {
		throw new \Exception("Method " . $method . " does not exist!", 404);
	}
}
