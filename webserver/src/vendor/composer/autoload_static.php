<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit63be31aeb1fc247da534c17dad1a0b46
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit63be31aeb1fc247da534c17dad1a0b46::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit63be31aeb1fc247da534c17dad1a0b46::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
