class _404
{
	use Controller;
	
	/**
	 * Index method
	 * This method displays the 404 page.
	 */
	public function index()
	{
		$data['data']=true; // Set data for the view
		$this->view('404', $data); // Call the view method to render the 404 view with data
	}
}
