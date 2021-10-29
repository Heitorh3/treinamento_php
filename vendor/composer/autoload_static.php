<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2aa8c87b271eece91dd3eaeac38fdd89
{
    public static $files = array (
        '06e91339f6c32702b7d78e556333e43f' => __DIR__ . '/../..' . '/src/routers/Router.php',
        '1d422376cff81109760dbf5ffc94ef21' => __DIR__ . '/../..' . '/src/core/Controller.php',
        'e50f19fa1fc31225ad62ca8bc9eae0e2' => __DIR__ . '/../..' . '/src/database/Connect.php',
        '2f4f93782b0bf1e899385e4bdd17c359' => __DIR__ . '/../..' . '/src/database/Fetch.php',
        '0fbaaf4d223219215fca8b5d4dddf20c' => __DIR__ . '/../..' . '/src/helpers/Redirect.php',
        '40f8098dcd300636052d6664a7020dee' => __DIR__ . '/../..' . '/src/helpers/Constants.php',
    );

    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Root\\App\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Root\\App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2aa8c87b271eece91dd3eaeac38fdd89::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2aa8c87b271eece91dd3eaeac38fdd89::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2aa8c87b271eece91dd3eaeac38fdd89::$classMap;

        }, null, ClassLoader::class);
    }
}
