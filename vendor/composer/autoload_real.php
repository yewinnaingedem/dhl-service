<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd5a55f6f05dcd63b100d7017b3fff979
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitd5a55f6f05dcd63b100d7017b3fff979', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd5a55f6f05dcd63b100d7017b3fff979', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd5a55f6f05dcd63b100d7017b3fff979::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
