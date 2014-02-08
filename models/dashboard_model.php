<?php

class Dashboard_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    function xhrInsert()
    {
        $text = $_POST['text'];
        $stam = $this->db->prepare('INSERT INTO data (text) VALUE (:text)');
        $stam->execute(array(
           ':text'  => $text
        ));
    }
    function xhrGetListing()
    {
        $stam = $this->db->prepare('SELECT * FROM data');
        $stam->setFetchMode(PDO::FETCH_ASSOC);
        $stam->execute();
        $data = $stam->fetchAll();
        echo json_encode($data);
    }
}

