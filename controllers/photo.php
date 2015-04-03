<?php

class Photo extends Controller
{
    function __construct() {
        parent::__construct();
        
     //   Auth::handleLogin();
    }
    public function index()
    {
        $this->load->view('header');
        $this->useModel('Index');
        $this->load->showimg = $this->model->imgshow();
      //  print_r($this->load->showimg);
        $this->load->view('photo/index');
        $this->load->view('footer');
    }
    public function upload()
    {
        $data = array();
        $this->useModel('Index');
        if($_FILES['file']['tmp_name']) 
            {
                $upload = new Uploads();
                $upload->SetFileName($_FILES['file']['name']);
                $upload->SetTempName($_FILES['file']['tmp_name']);
                $upload->SetUploadDirectory("upload/"); //Upload directory, this should be writable
                $upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); //Extensions that are allowed if none are set all extensions will be allowed.
                //$upload->SetEmail("Sidewinder@codecall.net"); //If this is set, an email will be sent each time a file is uploaded.
                //$upload->SetIsImage(true); //If this is set to be true, you can make use of the MaximumWidth and MaximumHeight functions.
                //$upload->SetMaximumWidth(60); // Maximum width of images
                //$upload->SetMaximumHeight(400); //Maximum height of images
                $upload->SetMaximumFileSize(900000); //Maximum file size in bytes, if this is not set, the value in your php.ini file will be the maximum value
                $upload->UploadFile();
            //    echo $upload->GetFileName().'<br/>';
            //    echo $upload->GetUploadDirectory().'<br/>';
              //  print_r($upload->GetValidExtensions()).'<br/>';
                $data['file'] = $upload->GetFileName();
            //  print_r($data);
              //  echo $upload->GetFileName();
                 $this->model->upload($data);
                header('location:'.URL.'photo?done');
           }
    }
    public function delphoto($id)
    {
      //  echo $id;
        $this->useModel('Index');
        $this->model->delphoto($id);
        header('location:'.URL.'photo?del');
    }
}
