<?php 
class _404
{
	use Controller;

	public function index()
	{
		$data['data'] = true;
		$this->view('404', $data);
	}
}
