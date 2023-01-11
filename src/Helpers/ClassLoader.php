<?php

namespace GreatWebsiteStudio\Helpers;

use Symfony\Component\Finder\Finder;
use Throwable;

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */

class ClassLoader
{
    /**
     * Load all class on selected namespace.
     * 
     * @param string $namespace
     * @param string $rootDirectory
     * 
     * @return array
     */
    public static function load(string $namespace, string $rootDirectory = GWS_ROOT_DIRECTORY)
    {
        $classes = [];

        $finder = new Finder();

        $finder->files()->in($rootDirectory)->name('*.php');

        foreach ($finder as $file) {

            $className = rtrim($namespace, '\\') . '\\' . $file->getFilenameWithoutExtension();

            if (class_exists($className)) {
                try {

                    $classes[] = new $className();
                } catch (Throwable $error) {

                    continue;
                }
            }
        }

        return $classes ?? [];
    }
}
