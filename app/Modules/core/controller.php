<?php

use SimpleMVC\Base\BaseController;

class CoreController extends BaseController {
	public function index() {
        return $this->response->view('index', ['username' => 'James']);
	}

	public function test() {
	    return $this->route->redirect('core/index');
    }

    public function method() {
	    if ($this->request->isPost()) {
	        return "is post";
        }

        return "not post";
    }
}
