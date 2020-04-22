<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9011da5502d33b914aad0e38aafd9cbc
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Application\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Application\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9011da5502d33b914aad0e38aafd9cbc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9011da5502d33b914aad0e38aafd9cbc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}