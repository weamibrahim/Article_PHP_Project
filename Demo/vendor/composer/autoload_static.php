<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb9d583b7d955adf562ad359166c5f974
{
    public static $files = array (
        'cfe4039aa2a78ca88e07dadb7b1c6126' => __DIR__ . '/../..' . '/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'DbHandler' => __DIR__ . '/../..' . '/models/DbHandler.php',
        'MySQLHandler' => __DIR__ . '/../..' . '/models/MySQLHandler.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb9d583b7d955adf562ad359166c5f974::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb9d583b7d955adf562ad359166c5f974::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb9d583b7d955adf562ad359166c5f974::$classMap;

        }, null, ClassLoader::class);
    }
}
