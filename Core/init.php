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
	require $filename = "App/models/" . ucfirst($classname) . ".php";
});

require 'config.php';
require 'autoload.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';
