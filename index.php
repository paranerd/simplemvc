<?php

//require_once 'modules/helper/Facades/Request.php';
//require_once 'modules/helper/Facades/Response.php';
//require_once 'modules/helper/BaseController.php';
//require_once 'modules/helper/global.php';
require_once 'helper/Test.php';

/*$request      = (isset($_REQUEST['request'])) ? $_REQUEST['request'] : null;
$args         = ($request) ? explode('/', rtrim($request, '/')) : array();
$render       = (sizeof($args) == 0 || $args[0] != 'api') ? true : array_shift($args) == null;
$token_source = ($render) ? $_COOKIE : $_REQUEST;
$module       = (sizeof($args) > 0) ? array_shift($args) : 'core';
$action       = (sizeof($args) > 0) ? array_shift($args) : 'index';
$controller   = ucfirst($module) . "_Controller";*/

//echo RequestFacade::test() . "\n";
//echo ResponseFacade::test();

echo Test::get()->execute() . "\n";
echo Test::get()->execute() . "\n";

$test = new Test();
echo $test->execute();
exit();

$req = Request::get_instance();
file_put_contents('/var/www/html/simplemvc/my.log', var_dump($req) . "\n", FILE_APPEND);

if (file_exists('modules/' . Request::module() . '/controller.php')) {
	try {
		require_once 'modules/' . $module . '/controller.php';
		$c = new $controller();
		exit($c->$action());
	} catch (Exception $e) {
		exit(Response::error($e->getMessage, $e->getCode));
	}
}

// If we get here, an error occurred
exit(Response::error('The requested site could not be found...', 404));
