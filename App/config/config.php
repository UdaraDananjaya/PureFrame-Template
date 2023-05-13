<?php
$config['system_dump'] =false;
$config['variable_dump'] =false;

// debug configuration
$config['debug'] =true;// enable debug mode (true/false)

define('BASE', 'http://localhost/SimpleX-PHP-Framework/'); // base url for the site
// define('BASE', 'http://localhost:5000/'); // base url for the site

// site configuration
$config['app_name'] ="my webiste" ;// site name
$config['app_desc'] ="my webiste" ;// site name

// email configuration
$config['smtp_host'] ="sandbox.smtp.mailtrap.io" ; // smtp server hostname
$config['smtp_port'] =2525 ; // smtp server port
$config['smtp_username'] ="32e75b4161d1c5" ; // smtp username
$config['smtp_password'] ="291b6dbca28002" ; // smtp password
$config['smtp_email'] ="admin@example.com" ; // administrator email address
$config['smtp_name'] ="Sender" ; // administrator email address

// routes configuration
$config['defcon']='Sample'; // default controller
$config['defmet']= 'index'; // default controller

$config['temp_eng']= true; // template engine
$config['mail_lib']= true; // template engine