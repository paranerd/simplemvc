<?php

class Test {
	private static $instance;
	private $testVar = "this really worx!";
	private $counter = 0;

	public function __construct() {

	}

	public static function get() {
		if (!isset(self::$instance)) {
			try {
				self::$instance = new self();
			}
			catch (Exception $e) {
				self::$instance = null;
				throw new Exception($e->getMessage(), $e->getCode());
			}
		}
		return self::$instance;
	}

	public function execute() {
		return $this->testVar . " " . ++$this->counter;
	}
}
