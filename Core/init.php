<?php

/**
 * Framework Initialization
 * `spl_autoload_register` is a PHP function used for automatic class loading.
 * config -> Configuration file
 * autoload -> Auto-load libraries
 * functions -> Common functions
 * Database -> Database Common file
 * Model -> Database Model
 * Controller -> Controller Class
 * App -> URL Routing and Front-Controller file
 */

spl_autoload_register(function ($classname) {
	require_once "App/models/" . ucfirst($classname) . ".php";
});

require_once 'config.php';
require_once 'autoload.php';
require_once 'functions.php';
require_once 'Database.php';
require_once 'Model.php';
require_once 'Controller.php';
require_once 'App.php';
