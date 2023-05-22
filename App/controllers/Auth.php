<?php

class Auth
{
	use Controller;

	public function index()
	{
		if (empty($_SESSION['USER'])) {
			redirect('Auth/login');
		}
	}
	public function login()
	{
		$data = []; //Create View Data Array

		if (!empty($_SESSION['USER'])) { //Check Session
			redirect('Sample/index'); // If Session User Not empty Redirect 
		}

		if ($_SERVER['REQUEST_METHOD'] == "POST") { // If POST Data Available 
			$user = new Demo_model; //Create Model Object
			$user->set_table('users'); //Set Table
			$arr['email'] = $_POST['username']; // 
			$row = $user->selectFirst($arr);
			if ($row) {
				if ($row->password === $_POST['password']) {
					$_SESSION['USER'] = $row;
					redirect('Sample/index');
				}
			}
			$user->errors['email'] = "Wrong email or password";
			$data['errors'] = $user->errors;
		}
		$this->view('Auth/login', $data);
	}

	public function logout()
	{
		if (!empty($_SESSION['USER'])) unset($_SESSION['USER']);
		if (empty($_SESSION['USER'])) {
			redirect('Auth/login');
		}
	}
}
