<?php
$config = [
    'system_dump' => false, // Set system dump flag to false
    'variable_dump' => false, // Set variable dump flag to false

    // Debug configuration
    'debug' => true, // Enable debug mode (true/false)

    // Site configuration
    'app_name' => "My Website", // Set the name of the website
    'app_desc' => "My Website Description", // Set the description of the website

    // Email configuration
    'smtp_host' => "sandbox.smtp.mailtrap.io", // Set the SMTP host for email
    'smtp_port' => 2525, // Set the SMTP port for email
    'smtp_username' => "32e75b4161d1c5", // Set the SMTP username for email
    'smtp_password' => "291b6dbca28002", // Set the SMTP password for email
    'smtp_email' => "admin@example.com", // Set the default email address for sending emails
    'smtp_name' => "Sender", // Set the default name for the sender of emails

    // Routes configuration
    'defcon' => 'Sample', // Set the default controller for routes
    'defmet' => 'index', // Set the default method for routes

    'temp_eng' => true, // Enable the template engine
    'mail_lib' => true, // Enable the mail library
];

define('BASE', 'http://localhost/PureFrame/'); // Define the base URL for the site
