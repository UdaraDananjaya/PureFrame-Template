<?php

/**
 * Framework Configuration
 */

// Require all PHP files in the "App/config" directory
foreach (glob("App/config/*.php") as $filename) {
    if (is_file($filename)) {
        require_once $filename;
    }
}

// Define the CONFIG constant using the $config array from the included files
define('CONFIG', $config);
