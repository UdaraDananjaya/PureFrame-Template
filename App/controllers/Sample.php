<?php
class Sample
{
    use Controller;

    public function __construct()
    {
        if (empty($_SESSION['USER'])) {
            redirect('Auth/login');
        }
    }

    public function index()
    {
        $data['page'] = "Dashboard";
        $data['pagegroup'] = "";
        $data['User'] = $_SESSION['USER']->email;
        $user = new Demo_model;
        $user->set_table('users');
        $row = $user->singleQuery("SELECT MAX(`id`) as MAX FROM `users`;");
        $row2 = $user->singleQuery("SELECT SUM(`id`) as SUM FROM `users`;");
        $row3 = $user->singleQuery("SELECT COUNT(`id`) as COUNT FROM `users`;");
        $data['Dashboard'] = array(
            "Customers" => "{$row->MAX}",
            "Products" => "{$row2->SUM}",
            "Orders" => "{$row3->COUNT}"
        );
        $row = $user->selectAll();
        $data['Dashboard_table'] = $row;
        $this->view('Sample/index', $data);
    }

    public function List_User()
    {
        $data['page'] = "User List";
        $data['pagegroup'] = "UserManagement";
        $data['User'] = $_SESSION['USER']->email;
        $user = new Demo_model;
        $user->set_table('users');
        $row = $user->selectAll();
        $data['Users_table'] = $row;
        $this->view('Sample/List_User', $data);
    }

    public function Update_User()
    {
        $data = [];
        $data['page'] = "Update User";
        $data['pagegroup'] = "UserManagement";
        $data['User'] = $_SESSION['USER']->email;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = new Demo_model;
            $user->set_table('users');
            $update_data = array(
                "email" => $_POST['inputEmail'], 
                "password" => $_POST['inputPassword'], 
                "date" => $_POST['inputDate']
            );
            $user->update($_POST['inputId'], $update_data, "id");
            redirect('Sample/List_User');
        }
        if (!empty($_GET['id'])) {
            $user = new Demo_model;
            $user->set_table('users');
            $arr['id'] = $_GET['id'];
            $data['Manage_User'] = $user->selectFirst($arr);
            $this->view('Sample/Update_User', $data);
        } else {
            redirect('Sample/List_User');
        }
    }

    public function Add_User()
    {
        $data = [];
        $data['page'] = "Add User";
        $data['pagegroup'] = "UserManagement";
        $data['User'] = $_SESSION['USER']->email;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = new Demo_model;
            $user->set_table('users');
            $insert_data = array(
                "email" => $_POST['inputEmail'], 
                "password" => $_POST['inputPassword']
            );
            $user->insert($insert_data);
            redirect('Sample/List_User');
        }
        $this->view('Sample/Add_User', $data);
    }

    public function Delete_User()
    {
        $data = [];
        $data['page'] = "Delete User";
        $data['pagegroup'] = "UserManagement";
        $data['User'] = $_SESSION['USER']->email;
        $user = new Demo_model;
        $user->set_table('users');
        $row = $user->customQuery("SELECT `id`, `email` FROM `users`;");
        $data['User_table'] = $row;
        if (!empty($_GET['Delete'])) {
            $user->delete($_GET['Delete']);
            redirect('Sample/List_User');
        }
        $this->view('Sample/Delete_User', $data);
    }

    public function Manage_User()
    {
        $data = [];
        $data['page'] = "Manage User";
        $data['pagegroup'] = "";
        $data['User'] = $_SESSION['USER']->email;
        $user = new Demo_model;
        $user->set_table('users');
        $user->set_limit('100');
        $row = $user->selectAll();
        $data['Users_table'] = $row;

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $input = filter_input_array(INPUT_POST);
            if ($input['action'] == 'edit') {
                $update_field = '';
                if (isset($input['email'])) {
                    $update_field .= "email='" . $input['email'] . "'";
                } else if (isset($input['password'])) {
                    $update_field .= "password='" . $input['password'] . "'";
                }
                if ($update_field && $input['id']) {
                    $sql = "UPDATE `users` SET $update_field WHERE `id`='" . $input['id'] . "';";
                    $user->customQuery($sql);
                    var_dump($sql);
                }
            }
        }
        $this->view('Sample/Manage_User', $data);
    }
}
