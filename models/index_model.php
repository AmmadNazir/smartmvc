<?php

class Index_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    public function run($data)
    {
        //echo 45;
        $this->db->insert('test',array('name' => $data['name']));
    }
    public function show()
    {
        return $this->db->select('SELECT * FROM test');
      //  $stam = $this->db->prepare('SELECT * FROM test');
      //  $stam->execute();
    }
    public function userList()
    {
        return $this->db->select('SELECT userid, login, role FROM user');
    }
}

/*
 * $this->db->insert('note', array(
            'title' => $data['title'],
            'userid' => $_SESSION['userid'],
            'content' => $data['content'],
            'date_added' => date('Y-m-d H:i:s') // use GMT aka UTC 0:00
        ));
 */