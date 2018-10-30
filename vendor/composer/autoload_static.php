<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit834a96fee1eefca25c8754ecdadbf20c
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SimpleMVC\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SimpleMVC\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'SimpleMVC\\Base\\BaseController' => __DIR__ . '/../..' . '/app/Base/BaseController.php',
        'SimpleMVC\\Base\\Service' => __DIR__ . '/../..' . '/app/Base/Service.php',
        'SimpleMVC\\Services\\Request' => __DIR__ . '/../..' . '/app/Services/Request.php',
        'SimpleMVC\\Services\\Response' => __DIR__ . '/../..' . '/app/Services/Response.php',
        'SimpleMVC\\Services\\Route' => __DIR__ . '/../..' . '/app/Services/Route.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit834a96fee1eefca25c8754ecdadbf20c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit834a96fee1eefca25c8754ecdadbf20c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit834a96fee1eefca25c8754ecdadbf20c::$classMap;

        }, null, ClassLoader::class);
    }
}