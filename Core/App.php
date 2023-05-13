<?php

/**
 * Main Application
 * URL Routing
 * Front Controller
 */

class App
{
    private $controller = CONFIG['defcon']; // Default Controller
    private $method = CONFIG['defmet']; // Default Method

    private function splitURL()
    {
        $URL = $_GET['url'] ?? CONFIG['defcon']; // If the GET URL is empty, then open the default controller.
        $URL = explode("/", trim($URL, "/")); // Break a string into an array
        return $URL; // Return URL
    }

    public function loadController()
    {
        $URL = $this->splitURL(); // Get the URL into the variable
        $filename = "App/controllers/" . ucfirst($URL[0]) . ".php"; // Find the Controller ucfirst(); Convert the first character to uppercase
        if (file_exists($filename)) { // Check if a File Exists
            require $filename; // Open Controller Class
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        } else {
            $filename = "App/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }
        $controller = new $this->controller; // Created New Controller Class
        if (!empty($URL[1])) { // Find the Method
            if (method_exists($controller, $URL[1])) {
                $this->method = $URL[1];
                unset($URL[1]);
            }
        }
        call_user_func_array([$controller, $this->method], $URL);
    }
}
