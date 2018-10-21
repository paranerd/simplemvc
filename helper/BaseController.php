<?php

class Base_Controller {
	public function __construct() {
		$this->request = new Request();
		$this->response = new Response();
		$this->router = new Router();
	}

	/**
	 * @brief Handle calls to mising methods
	 *
	 * @param  string  $method
	 * @param  array   $parameters
	 * @return mixed
	 *
	 * @throws Exception
	 */
	public function __call($method, $parameters) {
		throw new Exception("Method " . $method . " does not exist!", 404);
	}
}
