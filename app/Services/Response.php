<?php

namespace SimpleMVC\Services;

use SimpleMVC\Base\Service;

class Response extends Service {
    public function view($name, $params = null) {
        $module = (preg_match('/^\/(\w+)\//', $name, $matches)) ? $matches[1] : Request::get()->module();
        $view = preg_replace('/^\/\w+\//', '', $name);
        $path = dirname(__DIR__) . '/Modules/' . $module . '/views/' . $view . '.php';

        file_put_contents('/var/www/html/simplemvc/my.log', "loading view: " . $path . "\n", FILE_APPEND);

        if (file_exists($path)) {
            ob_start();
            require_once $path;
            $template = ob_get_clean();

            foreach ($params as $key => $value) {
                $template = str_replace('{{ ' . $key . ' }}', $value, $template);
            }

            echo $template;
        }
    }

    public function error($msg, $code) {
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' ' . $msg);
        return $this->view('/core/error', ['code' => $code, 'msg' => $msg]);
    }
}
