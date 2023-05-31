<?php

class Auth
{
	use Controller;

	public function index()
	{
		// Check if the user is not authenticated (no USER session)
		if (empty($_SESSION['USER'])) {
			redirect('Auth/login'); // Redirect to the login page
		}
	}

	public function login()
	{
		$data = []; // Create View Data Array

		// Check if the user is already authenticated (USER session exists)
		if (!empty($_SESSION['USER'])) {
			redirect('Sample/index'); // Redirect to a sample page (assuming it exists)
		}

		// Check if POST data is available (login form submitted)
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$user = new Demo_model; // Create Model Object
			$user->set_table('users'); // Set Table

			$arr['email'] = $_POST['username']; // Set email from POST data

			// Fetch the first row from the users table where the email matches
			$row = $user->selectFirst($arr);

			if ($row) {
				// Check if the password matches the one provided in the POST data
				if ($row->password === $_POST['password']) {
					$_SESSION['USER'] = $row; // Set USER session with the fetched row
					redirect('Sample/index'); // Redirect to a sample page (assuming it exists)
				}
			}

			$user->errors['email'] = "Wrong email or password";
			$data['errors'] = $user->errors;
		}

		$this->view('Auth/login', $data); // Load the login view with the data and errors (if any)
	}

	public function logout()
	{
		if (!empty($_SESSION['USER'])) {
			unset($_SESSION['USER']); // Remove the USER session if it exists
		}

		// Check if the user is not authenticated (no USER session)
		if (empty($_SESSION['USER'])) {
			redirect('Auth/login'); // Redirect to the login page
		}
	}
}
