<?php

class Request {
	public $testVar = "worx from request";
	public function __construct() {
		$this->init();
	}

	public function init() {
		$this->request = $_REQUEST['request'];
		$this->args = ($request) ? explode('/', rtrim($request, '/')) : array();
		$this->render = (sizeof($args) == 0 || $args[0] != 'api') ? true : array_shift($args) == null;
		$this->module = (sizeof($args) > 0) ? array_shift($args) : 'core';
		$this->module = str_replace('../', '', $this->module());
		$this->action = (sizeof($args) > 0) ? array_shift($args) : 'index';
		$this->controller = ucfirst($module) . "_Controller";
	}

	public function is_post() {

	}

	public function test() {
		return $this->testVar;
	}

	public function module() {
		return $this->module;
	}

	public function action() {
		return $this->action;
	}
}
