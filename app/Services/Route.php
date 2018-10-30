<?php

namespace SimpleMVC\Services;

use SimpleMVC\Base\Service;

class Route extends Service {
    public function redirect($target) {
        header('Location: ' . $this->base() . $target);
    }

    public function toUrl($route) {

    }

    /**
     * Determine base
     *
     * @return string Base-path
     */
    public function base() {
        return rtrim(dirname($_SERVER['PHP_SELF']), '/') . '/';
    }
}