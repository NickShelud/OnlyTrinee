<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6d094545160779d8b0e8d2305050dd10
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Php\\template\\' => 13,
        ),
        'D' => 
        array (
            'Database\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Php\\template\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/database',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6d094545160779d8b0e8d2305050dd10::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6d094545160779d8b0e8d2305050dd10::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6d094545160779d8b0e8d2305050dd10::$classMap;

        }, null, ClassLoader::class);
    }
}