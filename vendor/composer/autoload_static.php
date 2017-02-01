<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6bda74187cc3949fa717a757d28a7b3b
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'ToDo\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ToDo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6bda74187cc3949fa717a757d28a7b3b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6bda74187cc3949fa717a757d28a7b3b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}