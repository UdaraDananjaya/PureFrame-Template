<?php
/**
 * Controller Class
 */
trait Controller
{
	public function view($name, $data = [])
	{
		if (!empty($data))
			extract($data);

		$filename = "App/views/" . $name . ".view.php";
		if (file_exists($filename)) {
			require $filename;
		} else {
			$filename = "App/views/404.view.php";
			require $filename;
		}
	}
}
