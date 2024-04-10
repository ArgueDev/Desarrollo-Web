<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcbfbf727a8193f19e6c139bdf711fd56
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'User\\AppSalon\\' => 14,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'M' => 
        array (
            'Model\\' => 6,
            'MVC\\' => 4,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
            'Clases\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'User\\AppSalon\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'MVC\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
        'Clases\\' => 
        array (
            0 => __DIR__ . '/../..' . '/clases',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcbfbf727a8193f19e6c139bdf711fd56::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcbfbf727a8193f19e6c139bdf711fd56::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcbfbf727a8193f19e6c139bdf711fd56::$classMap;

        }, null, ClassLoader::class);
    }
}
