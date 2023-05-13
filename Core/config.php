<?php

/**
 * Framework Configuration
 */

// require "App/config/config.php";
// require "App/config/database.php";

foreach (glob("App/config/*.php") as $filename) {
    require "$filename";
}

define('CONFIG', $config);
