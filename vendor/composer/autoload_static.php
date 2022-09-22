<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a568ed095a211f740111a476acf1159
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3a568ed095a211f740111a476acf1159::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3a568ed095a211f740111a476acf1159::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3a568ed095a211f740111a476acf1159::$classMap;

        }, null, ClassLoader::class);
    }
}