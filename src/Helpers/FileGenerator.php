<?php

namespace GreatWebsiteStudio\Helpers;

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */

class FileGenerator
{
    /**
     * Generate file from sample file.
     * 
     * @param string $sample
     * @param string $outputDirectory
     * @param mixed string
     * 
     * @return void
     */
    public static function generate(string $sample, string $outputDirectory = GWS_ROOT_DIRECTORY, string $filename = 'file.php', array $replaced = [])
    {
        if (!file_exists($sample)) {

            die("\n\033[31m Target sample [$sample] does not exist.\n");
        }

        $fileContent = file_get_contents($sample);

        foreach ($replaced as $key => $value) {

            $fileContent = str_replace($key, $value, $fileContent);
        }

        /**
         * Create directory if it does not exist.
         * 
         */

        $directory = implode('/', array_slice(explode('/', $filename), 0, -1)) ?? null;

        if ($directory && !is_dir($directory)) {

            mkdir($outputDirectory . '/' . $directory,  0777, true);
        }

        /**
         * Generate file.
         * 
         */

        $file = fopen($outputDirectory . '/' . $filename, 'wb');

        fwrite($file, $fileContent);

        fclose($file);
    }
}
