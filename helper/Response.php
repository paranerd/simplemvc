<?php

/**
 * @author		Kevin Schulz <paranerd.development@gmail.com>
 * @copyright	(c) 2018, Kevin Schulz. All Rights Reserved
 * @license		Affero General Public License <http://www.gnu.org/licenses/agpl>
 * @link		https://simpledrive.org
 */

class Response {
	private static $instance;
	public $testVar = "response worx";

	public function __construct() {
		$this->init();
	}

	private function __clone() {}

	public static function get_instance() {
		if (!isset(self::$instance)) {
			try {
				self::$instance = new Request();
			}
			catch (Exception $e) {
				self::$instance = null;
				throw new Exception($e->getMessage(), $e->getCode());
			}
		}
		return self::$instance;
	}

	public function test() {
		return $this->testVar;
	}

	public static function __callStatic($name, $arguments) {
		//$inst = new Response();
		//return $inst->$name();
		return self::get_instance()->$name();
	}
}
