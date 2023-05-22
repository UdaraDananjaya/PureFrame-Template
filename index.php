<?php

/**
 * PureFrame PHP Framework
 * @package pureframe
 * @author Udara Dananjaya
 * @link https://github.com/Udara-Dananjaya/PureFrame-PHP-Framework
 * @since Version 1.0.0
 */

//Page Rendering
$Render_Start = microtime(true);

//Start Session
session_start();

//Framework Initialization
require "Core/init.php";

//Error Reporting
CONFIG['debug'] ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

//Create App Object And Load loadController()
$app = new App;
$app->loadController();

//System And Variable Dumps
if (CONFIG['variable_dump']) {
	variable_dump(get_defined_vars());
}
if (CONFIG['system_dump']) {
	system_dump($Render_Start, microtime(true));
}
//More https://www.php.net/manual/en/ini.list.php
