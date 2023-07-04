<?php

/**
 * Main Application
 * URL Routing
 * Front Controller
 *
 * This PHP script represents the definition of the `App` class, which serves as the main application class responsible for URL routing and acting as the front controller.
 */

class App
{
    private $controller;
    private $method;

    public function __construct()
    {
        // Set default controller and method from configuration
        $this->controller = CONFIG['defcon'];
        $this->method = CONFIG['defmet'];
    }

    /**
     * Split the URL into an array
     *
     * @return array The URL segments
     */
    private function splitURL()
    {
        // Get the URL from the query string parameter 'url' or use the default controller
        $URL = $_GET['url'] ?? CONFIG['defcon'];

        // Explode the URL into segments and remove leading/trailing slashes
        $URL = explode("/", trim($URL, "/"));

        return $URL;
    }

    /**
     * Load the appropriate controller based on the URL
     */
    public function loadController()
    {
        $URL = $this->splitURL();

        // Get the controller name from the first segment of the URL
        $controllerName = ucfirst($URL[0]);

        // Check if the controller file exists
        $filename = "App/controllers/" . $controllerName . ".php";
        if (file_exists($filename)) {
            require_once $filename;
            $this->controller = $controllerName;
            unset($URL[0]); // Remove the first segment from the URL array
        } else {
            // If the controller file doesn't exist, use the default 404 controller
            $filename = "App/controllers/_404.php";
            require_once $filename;
            $this->controller = "_404";
        }

        // Create an instance of the controller
        $controller = new $this->controller();

        // Check if a method is specified in the URL and if it exists in the controller
        if (!empty($URL[1]) && method_exists($controller, $URL[1])) {
            $this->method = $URL[1];
            unset($URL[1]); // Remove the second segment from the URL array
        }

        // Call the specified method on the controller with any remaining segments as arguments
        call_user_func_array([$controller, $this->method], $URL);
    }
}
