<?php
/**
 * Template Engine Library File
 */
class Template
{
	public $header =""; // Variable to store the header template file name
	public $footer =""; // Variable to store the footer template file name

    /**
     * Engine View method
     * This method renders the specified type of view using the template engine.
     * @param string $type The type of view to render ('table' or 'form')
     * @param array $data The data to pass to the view
     */
    public function engine_view($type, $data = [])
	{
		if (!empty($data))
			extract($data); // Extract the data array to individual variables for easier access in the view

		require "App/views/". $this->header.".view.php"; // Include the header template file

		if ($type=='table') {
			require "App/libraries/Template_Engine/src/table.eng.php"; // Include the table engine file
		}
		if ($type=='form') {
			require "App/libraries/Template_Engine/src/form.eng.php"; // Include the form engine file
		}

		require "App/views/". $this->footer.".view.php"; // Include the footer template file
	}
}
