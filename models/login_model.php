<?php

class Login_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUserID($login) {
        $sth = $this->db->select('SELECT id FROM admin WHERE login = :login', array('login' => $login));
        return isset($sth[0]['id']) ? $sth[0]['id'] : false;
    }

    public function getPassword($userID, $searchTable = 'id') {
        $sth = $this->db->select('SELECT haslo h FROM admin WHERE ' . $searchTable . ' = :id', array('id' => $userID));
        return isset($sth[0]['h']) ? $sth[0]['h'] : false;
    }

}
