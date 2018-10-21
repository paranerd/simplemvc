<?php

class Core_Controller extends BaseController {
	public function index() {
		$this->request->is_post();

		$this->request->params();

		$this->request->params('userid');

		$this->session->get('key');

		$this->session->set(['key' => 'value']);

		// First
		return Response::view('index', ['name' => 'James']);

		return Response::json(['name' => 'James']);

		return Response::download('/path/to/file.jpg');

		// Second
		return $this->view('index', ['name' => 'James']);

		return $this->json(['name' => 'James']);

		return $this->download('/path/to/file.jpg');

		// Third
		return $this->response->view('index', ['name' => 'James']);

		return $this->response->json(['name' => 'James']);

		return $this->response->download('/path/to/file.jpg');

		$this->router->redirect('home');
	}
}
