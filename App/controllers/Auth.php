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
		$data = [];

		if (!empty($_SESSION['USER'])) {
			redirect('Sample/index');
		}

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$user = new Demo_model;
			$user->set_table('users');

			$arr['email'] = $_POST['username'];

			$row = $user->selectFirst($arr);

			if ($row && $row->password === $_POST['password']) {
				$_SESSION['USER'] = $row;
				redirect('Sample/index');
			}

			$user->errors['email'] = "Wrong email or password";
			$data['errors'] = $user->errors;
		}

		$this->view('Auth/login', $data);
	}

	public function logout()
	{
		if (!empty($_SESSION['USER'])) {
			unset($_SESSION['USER']);
		}

		if (empty($_SESSION['USER'])) {
			redirect('Auth/login');
		}
	}
}
