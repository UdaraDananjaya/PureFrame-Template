<?php
class Demo
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
        $temp = new Template();
        $temp->header = "Template/layout/header";
        $temp->footer = "Template/layout/footer";

        $data['page'] = "Users Table";
        $data['pagegroup'] = "";

        $data['User'] = $_SESSION['USER']->email;
        $user = new Demo_model;
        $user->set_table('users');
        $user->set_limit('100');
        $row = $user->selectAll();

        $data['Table_Title'] = "View Product Details";
        $data['Table_Data'] = array();
        $data['Table_Header'] = array('E-mail', 'Password', 'Date', 'Action');

        foreach ($row as $row_dump) {
            $test = array(
                $row_dump->email,
                $row_dump->password,
                $row_dump->date,
                '<a onclick="return confirm(\'Are you sure you want to delete?\')" href="' . BASE . 'Demo/index?Delete=' . $row_dump->id . '"><i class="bi bi-trash3-fill"></i></a>'
            );
            array_push($data['Table_Data'], $test);
        }

        if (!empty($_GET['Delete'])) {
            $user->delete($_GET['Delete']);
            redirect('Demo/index');
        }

        $temp->renderTemplate('table', $data);
    }

    public function form()
    {
        $temp = new Template();
        $temp->header = "Template/layout/header";
        $temp->footer = "Template/layout/footer";

        $data['page'] = "Users Form";
        $data['pagegroup'] = "";

        $data['User'] = $_SESSION['USER']->email;
        $user = new Demo_model;
        $user->set_table('users');
        $row = $user->customQuery("SELECT id,email FROM `users`;");
        $select_data = [];
        foreach ($row as $row_dump) {
            $test = array($row_dump->id => $row_dump->email);
            array_push($select_data, $test);
        }

        $data['Form_Title'] = "View Product Details";

        $data['Form_Data'] = array(
            array(
                'type' => 'select',
                'label' => 'Name',
                'name' => 'name',
                'value' => $select_data,
                'attribute' => ''
            ),
            array(
                'type' => 'text',
                'label' => 'Password',
                'name' => 'password',
                'value' => '',
                'attribute' => ''
            )
        );

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = new Demo_model;
            $user->set_table('users');
            $update_data = array(
                "password" => $_POST['password']
            );
            $user->update($_POST['name'], $update_data, "id");
            redirect('Demo/index');
        }

        $temp->renderTemplate('form', $data);
    }
}
