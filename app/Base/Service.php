<?php

namespace SimpleMVC\Base;

class Service {
    /**
     * @var array Holds instances of all instanciated global Services
     */
    private static $instances = array();

    /**
     * Service constructor.
     */
    private function __construct() {
    }

    /**
     * Service clone. Prevent cloning.
     */
    private function __clone() {
    }

    /**
     * Get service instance
     *
     * @return mixed|Service
     */
    public static function get() {
        if (!isset(static::$_global)) {
            return new static();
        }
        else if (!isset(self::$instances[get_called_class()])) {
            self::$instances[get_called_class()] = new static();
        }

        return self::$instances[get_called_class()];
    }
}