<?php
$config['system_dump'] = false; // Enable/disable system dump
$config['variable_dump'] = false; // Enable/disable variable dump

// Debug configuration
$config['debug'] = true; // Enable debug mode (true/false)

define('BASE', 'http://localhost/PureFrame-Template/'); // Base URL for the site
// define('BASE', 'http://localhost:5000/'); // Base URL for the site

// Site configuration
$config['app_name'] = "PureFrame"; // Site name
$config['app_desc'] = "PureFrame-Template"; // Site description

// Email configuration
$config['smtp_host'] = "sandbox.smtp.mailtrap.io"; // SMTP server hostname
$config['smtp_port'] = 2525; // SMTP server port
$config['smtp_username'] = "32e75b4161d1c5"; // SMTP username
$config['smtp_password'] = "291b6dbca28002"; // SMTP password
$config['smtp_email'] = "admin@example.com"; // Administrator email address
$config['smtp_name'] = "Sender"; // Administrator name

// Routes configuration
$config['defcon'] = 'Auth'; // Default controller
$config['defmet'] = 'index'; // Default method

$config['temp_eng'] = true; // Enable/disable template engine
$config['mail_lib'] = true; // Enable/disable mail library
