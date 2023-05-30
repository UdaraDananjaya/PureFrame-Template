<?php

/**
 * Main Application
 * URL Routing
 * Front Controller
 */

class App
{
    private $controller; // Default Controller
    private $method; // Default Method

    public function __construct()
    {
        $this->controller = CONFIG['defcon'];
        $this->method = CONFIG['defmet'];
    }

    private function splitURL()
    {
        $URL = $_GET['url'] ?? CONFIG['defcon']; // If the GET URL is empty, then open the default controller.
        $URL = explode("/", trim($URL, "/")); // Break a string into an array
        return $URL; // Return URL
    }

    public function loadController()
    {
        $URL = $this->splitURL(); // Get the URL into the variable
        $controllerName = ucfirst($URL[0]); // Find the Controller ucfirst(); Convert the first character to uppercase
        $filename = "App/controllers/" . $controllerName . ".php"; // Construct the controller file path

        if (file_exists($filename)) { // Check if the file exists
            require_once $filename; // Include the controller file
            $this->controller = $controllerName;
            unset($URL[0]);
        } else {
            $filename = "App/controllers/_404.php"; // If the controller file doesn't exist, use the 404 controller
            require_once $filename;
            $this->controller = "_404";
        }

        $controller = new $this->controller(); // Create a new instance of the controller class
        if (!empty($URL[1]) && method_exists($controller, $URL[1])) { // Find the method
            $this->method = $URL[1];
            unset($URL[1]);
        }

        // Call the controller method with the remaining URL segments as arguments
        call_user_func_array([$controller, $this->method], $URL);
    }
}

