<?php

/**
 * Controller Trait
 *
 * A trait that provides common functionality for controllers.
 */
trait Controller
{
    /**
     * Render a view file.
     *
     * @param string $name The name of the view file to render.
     * @param array $data Optional data to pass to the view.
     */
    public function view($name, $data = [])
    {
        if (!empty($data)) {
            // Extract the data array into individual variables
            extract($data);
        }

        // Construct the file path for the view file
        $filename = "App/views/" . $name . ".php";

        if (file_exists($filename)) {
            try {
                // Require the view file
                require_once $filename;
            } catch (Exception $e) {
                // Handle any potential errors or exceptions that occur during file inclusion
                echo "Error rendering view: " . $e->getMessage();
            }
        } else {
            // If the requested view file doesn't exist, fall back to the 404 view
            $filename = "App/views/404.php";

            if (file_exists($filename)) {
                // Require the 404 view file
                require_once $filename;
            } else {
                // Handle the case where the 404 view file is also missing
                echo "404 view file not found";
            }
        }
    }
}
