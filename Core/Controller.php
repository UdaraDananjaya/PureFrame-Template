<?php

/**
 * Controller Trait
 */
trait Controller
{
    public function view($name, $data = [])
    {
        if (!empty($data)) {
            extract($data);
        }

        $filename = "App/views/" . $name . ".view.php";
        if (file_exists($filename)) {
            require_once $filename;
        } else {
            $filename = "App/views/404.view.php";
            require_once $filename;
        }
    }
}
