<?php
class Sample
{
    use Controller;

    public function __construct()
    {
        // Check if the user is logged in
        if (empty($_SESSION['USER'])) {
            redirect('Auth/login');
        } 
    }

    public function index()
    {
        $data['page'] = "Dashboard"; // Page URL
        $data['pagegroup'] = ""; // Page Sub Group Customer -> Manage Customer
        $data['User'] = $_SESSION['USER']->email; // Login User Name

        $user = new Demo_model; // Load Model
        $user->set_table('users'); // Set Model Table

        $row = $user->single_query("SELECT COUNT('id') as COUNT FROM `users`");
        $row2 = $user->single_query("SELECT COUNT('id') as COUNT FROM `users`");
        $row3 = $user->single_query("SELECT COUNT('id') as COUNT FROM `users`");

        $data['Dashboard'] = array(
            "Customers" => "{$row->COUNT}",
            "Products" => "{$row2->COUNT}",
            "Orders" => "{$row3->COUNT}"
        );

        $row = $user->selectAll();

        $data['Dashboard_table'] = $row;

        $this->view('Sample/index', $data);
    }

    public function List_User()
    {
        $data['page'] = "User List"; // Page URL
        $data['pagegroup'] = "UserManagement"; // Page Sub Group Customer -> Manage Customer
        $data['User'] = $_SESSION['USER']->email; // Login User Name

        $user = new Demo_model; // Load Model
        $user->set_table('users'); // Set Model Table

        $row = $user->selectAll();

        $data['Users_table'] = $row;
        
        $this->view('Sample/list_user', $data);
    }

    public function Manage_User()
    {
        $data = [];
        $data['page'] = "Manage User"; // Page URL
        $data['pagegroup'] = "UserManagement"; // Page Sub Group Customer -> Manage Customer
        $data['User'] = $_SESSION['USER']->email; // Login User Name
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = new Demo_model;
            $user->set_table('users');
            $update_data = array("email" => $_POST['inputEmail'], "password" => $_POST['inputPassword'], "date" => $_POST['inputDate']);
            $user->update($_POST['inputId'], $update_data, "id");
            redirect('Sample/List_User');
        }

        if (!empty($_GET['id'])) {
            $user = new Demo_model;
            $user->set_table('users');
            $arr['id'] = $_GET['id'];
            $data['Manage_User'] = $user->selectFirst($arr);
            $this->view('Sample/manage_user', $data);
        } else {
            redirect('Sample/List_User');
        }
    }

    public function Add_User()
    {
        $data = [];
        $data['page'] = "Add User"; // Page URL
        $data['pagegroup'] = "UserManagement"; // Page Sub Group Customer -> Manage Customer
        $data['User'] = $_SESSION['USER']->email; // Login User Name

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = new Demo_model;
            $user->set_table('users');
            $insert_data = array("email" => $_POST['inputEmail'], "password" => $_POST['inputPassword']);
            $user->insert($insert_data);
            redirect('Sample/List_User');
        }

        $this->view('Sample/add_user', $data);
    }

    public function Delete_User()
    {
        $data = [];
        $data['page'] = "Add User"; // Page URL
        $data['pagegroup'] = "UserManagement"; // Page Sub Group Customer -> Manage Customer
        $data['User'] = $_SESSION['USER']->email; // Login User Name

        $user = new Demo_model;
        $user->set_table('users');

        $row = $user->custom_query("SELECT id,email FROM `users`;");
        $data['User_table'] = $row;

        if (!empty($_GET['delete'])) {
            $user->delete($_GET['delete']);
            redirect('Sample/List_User');
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $insert_data = array("email" => $_POST['inputEmail'], "password" => $_POST['inputPassword']);
            $user->insert($insert_data);
            redirect('Sample/List_User');
        }

        $this->view('Sample/delete_user', $data);
    }
}
