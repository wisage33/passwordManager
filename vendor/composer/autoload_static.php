<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite222a94e5f44c43dca82f67435c41fad
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'models\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/models',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite222a94e5f44c43dca82f67435c41fad::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite222a94e5f44c43dca82f67435c41fad::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite222a94e5f44c43dca82f67435c41fad::$classMap;

        }, null, ClassLoader::class);
    }
}
