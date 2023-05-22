<?php
class Demo
{
    use Controller;
    public function index()
    {
        $temp = new Template();
        $temp->header = "Template/layout/header";
        $temp->footer = "Template/layout/footer";
        $data['page'] = "User List"; // Page URL
        $data['pagegroup'] = "UserManagement";
        $data['User'] = "dd";
        $user = new Demo_model; // Load Model
        $user->set_table('users'); // Set Model Table
        $row = $user->selectAll();
        $data['Table_Title'] = "View Product Details";
        //$data['Table_Data'] = $row;
        $data['Table_Header'] = array('id', 'E-mail', 'Password', 'Date');
        $data['Table_Data'] = array();
        foreach ($row as  $row_dump) {
            $test = array(
                $row_dump->id,
                $row_dump->email,
                $row_dump->password,
                "<a> a </a>"
            );
            array_push($data['Table_Data'], $test);
        }
        $temp->engine_view('table', $data);
    }
    public function form()
    {
        $user = new Demo_model;
        $user->set_table('users');
        $row = $user->custom_query("SELECT id,email FROM `users`;");
        $select_data =[];
        
        foreach ($row as  $row_dump) {
            $test = array($row_dump->id =>  $row_dump->email);
            array_push($select_data, $test);
           
        }
        $temp = new Template();
        $temp->header = "Template/layout/header";
        $temp->footer = "Template/layout/footer";
        $data['page'] = "User List"; // Page URL
        $data['pagegroup'] = "UserManagement";
        $data['User'] = "dd";
        $data['Form_Title'] = "View Product Details";

        $data['Form_Data'] = array(
            array(
                'type' => 'select',
                'label' => 'Name',
                'name' => 'name',
                'value' => $select_data,
                'attribute' => ''
            ), array(
                'type' => 'text',
                'label' => 'Name',
                'name' => 'name',
                'value' => '',
                'attribute' => ''
            ), array(
                'type' => 'text',
                'label' => 'Name',
                'name' => 'name',
                'value' => '',
                'attribute' => ''
            ), array(
                'type' => 'text',
                'label' => 'Name',
                'name' => 'name',
                'value' => '',
                'attribute' => ''
            )
        );
        $temp->engine_view('form', $data);
       // mailsender("Hi", 'hic', "dev.dananajaa@gmail.com");
    }
}
