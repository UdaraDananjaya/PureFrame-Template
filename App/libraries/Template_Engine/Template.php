<?php
/**
 * Template Engine Library File
 */
class Template
{
    public $header = "";
    public $footer = "";

    public function renderTemplate($type, $data = [])
    {
        // Extract the data array so that its elements can be used as variables
        if (!empty($data)) {
            extract($data);
        }

        // Include the header view file
        if (!empty($this->header)) {
            require "App/views/" . $this->header . ".php";
        }

        // Load the appropriate template based on the $type parameter
        if ($type == 'table') {
            require "App/libraries/Template_Engine/src/table.php";
        } elseif ($type == 'form') {
            require "App/libraries/Template_Engine/src/form.php";
        } else {
            // Handle the case when an invalid $type is provided
            throw new Exception("Invalid template type: " . $type);
        }

        // Include the footer view file
        if (!empty($this->footer)) {
            require "App/views/" . $this->footer . ".php";
        }
    }
}
