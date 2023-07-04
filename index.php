<?php

/**
 * PureFrame PHP Framework
 *
 * The PureFrame PHP Framework is a lightweight framework for building web applications.
 * It provides URL routing, front controller functionality, and a modular structure for organizing code.
 *
 * @package pureframe
 * @author Udara Dananjaya
 * @link https://github.com/Udara-Dananjaya/PureFrame-PHP-Framework
 * @since Version 1.0.0
 */

// Page Rendering
$Render_Start = microtime(true);

// Start Session
session_start();

// Framework Initialization
require "Core/init.php";

// Error Reporting
ini_set('display_errors', CONFIG['debug'] ? '1' : '0');

// Create App Object And Load loadController()
$app = new App;
$app->loadController();

// System And Variable Dumps
if (CONFIG['variable_dump']) {
    // Dump the defined variables
    variableDump(get_defined_vars());
}
if (CONFIG['system_dump']) {
    // Dump system information and execution time
    systemDump($Render_Start, microtime(true));
}
// More configuration options: https://www.php.net/manual/en/ini.list.php
