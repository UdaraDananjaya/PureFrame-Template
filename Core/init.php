<?php

/**
 * Framework Initialization
 *
 * This script initializes the framework by setting up autoloading for classes and including essential files.
 * The framework follows a specific file structure for better organization and separation of concerns.
 *
 * File Structure:
 * - App/models/ : Directory containing model classes.
 * - config.php : Configuration file.
 * - autoload.php : Autoloader for automatic class loading.
 * - functions.php : Common functions.
 * - Database.php : Database Common file.
 * - Model.php : Database Model.
 * - Controller.php : Controller Class.
 * - App.php : URL Routing and Front-Controller file.
 */

// Register an autoloader function to automatically load class files.
spl_autoload_register(function ($classname) {
    // Convert the classname to a file path and include the file if it exists.
    $filename = "App/models/" . ucfirst($classname) . ".php";
    if (file_exists($filename)) {
        require $filename;
    }
});

// Include essential framework files.
require_once 'config.php';      // Configuration file.
require_once 'autoload.php';    // Autoloader.
require_once 'functions.php';   // Common functions.
require_once 'Database.php';    // Database Common file.
require_once 'Model.php';       // Database Model.
require_once 'Controller.php';  // Controller Class.
require_once 'App.php';         // URL Routing and Front-Controller file.
