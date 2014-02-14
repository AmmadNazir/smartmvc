<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        
     //   Auth::handleLogin();
    }
    function index()
    {
        $this->load->title = Company;
        $this->load->view('header');
        $this->useModel('Index');
        $this->load->show = $this->model->show();
        $this->load->userList = $this->model->userList();
        $this->load->view('index/index');
        $this->load->view('footer');
    }
    function run()
    {
        try{
        $form = new Form_Validation;
     //   echo 'heloo  am index controoler';
        $form   ->post('name')
                ->val('minlength',3)
                ->val('digit');
        $form->submit();
        $data = $form->fetch();
//        echo '-----<pre>';
//        print_r($data);
//        echo '</pre>-----';
      //  $data = array('name'=> $_POST['name']);
        $this->model->run($data);
        header('location:'.URL.'?msg');
         }
         catch (Exception $e) {
        echo $e->getMessage();
        }
    }
    public function del($id)
    {
        $this->model->del($id);
        header('location:'.URL.'?del');
    }
}