<?php
/**
 * Template Engine Library File
 */
class Template
{
	public $header ="";
	public $footer ="";

    public function engine_view($type,$data = [])
	{
		
		if (!empty($data))
			extract($data);
		require "App/views/". $this->header.".view.php";
		if ($type=='table') {
			require "App/libraries/Template_Engine/src/table.eng.php";
		}
		if ($type=='form') {
			require "App/libraries/Template_Engine/src/form.eng.php";
		}
		require "App/views/". $this->footer.".view.php";
		
	}
}