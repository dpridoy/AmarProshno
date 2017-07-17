<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite7acdfc72496e33ec5ee07670f217902
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite7acdfc72496e33ec5ee07670f217902::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite7acdfc72496e33ec5ee07670f217902::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}