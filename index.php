<?php

require_once 'app/autoload.php';

use SimpleMVC\Services\Request;
use SimpleMVC\Services\Response;

$module = Request::get()->module();
$controller = Request::get()->controller();
$action = Request::get()->action();

file_put_contents('/var/www/html/simplemvc/my.log', $module . "\n", FILE_APPEND);

if (file_exists('app/Modules/' . $module . '/controller.php')) {
	try {
		require_once 'app/Modules/' . $module . '/controller.php';
		$c = new $controller();
		exit($c->$action());
	} catch (\Exception $e) {
		exit(Response::get()->error($e->getMessage(), $e->getCode()));
	}
}

// If we get here, an error occurred
exit(Response::get()->error('The requested site could not be found...', 404));