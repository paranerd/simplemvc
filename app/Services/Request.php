<?php

namespace SimpleMVC\Services;

use SimpleMVC\Base\Service;

class Request extends Service {
	public static $_global = true;
    private $action;
    private $module;
    private $request;
    private $controller;
    private $api;

    public function __construct() {
		$this->init();
	}

	public function init() {
		$this->request = (isset($_REQUEST['request'])) ? $_REQUEST['request'] : null;
		$args = ($this->request) ? explode('/', rtrim($this->request, '/')) : array();
		$this->api = (sizeof($args) > 0 && $args[0] == 'api' && array_shift($args) === 'api');
		$this->module = (sizeof($args) > 0) ? array_shift($args) : 'core';
		$this->module = str_replace('../', '', $this->module);
		$this->action = (sizeof($args) > 0) ? array_shift($args) : 'index';
		$this->controller = ucfirst($this->module) . "Controller";

        file_put_contents('/var/www/html/simplemvc/my.log', "module: " . $this->module . "\n", FILE_APPEND);
        file_put_contents('/var/www/html/simplemvc/my.log', "action: " . $this->action . "\n", FILE_APPEND);
	}

	public function isGet() {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

	public function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
	}

	public function isDelete() {
        return $_SERVER['REQUEST_METHOD'] === 'DELETE';
    }

    public function isPut() {
        return $_SERVER['REQUEST_METHOD'] === 'PUT';
    }

	public function module() {
		return $this->module;
	}

	public function controller() {
        return $this->controller;
    }

	public function action() {
		return $this->action;
	}

	public function params($key = null) {
        if ($key) {
            return $_REQUEST[$key] ?? null;
        }

        return $_REQUEST;
    }
}
