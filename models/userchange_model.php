<?php

class Userchange_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    public function accept($ID){
        $this->db->update('users', array('stan' => 1), "id = ".$ID);
    }
    public function block($ID){
        $this->db->update('users', array('stan' => 2), "id = ".$ID);
    }
    public function paid($ID){
        $this->db->update('users', array('oplata' => 1), "id = ".$ID);
    }
    public function unpaid($ID){
        $this->db->update('users', array('oplata' => 0), "id = ".$ID);
    }
    public function delete($ID){
        $this->db->delete('users', "id = ".$ID);
    }

    public function getUserData($ID) {
        $sth = $this->db->select('select * from users where id = :id', array('id' => $ID));
        return $sth[0];
    }
    
    public function editUser($ID) {
        $data = array(
            'imie' => htmlspecialchars($_POST['imie']),
            'pomieszczenie' => htmlspecialchars($_POST['pomieszczenie']),
            'wydzial' => htmlspecialchars($_POST['wydzial']),
            'kierunek' => htmlspecialchars($_POST['kierunek']),
            'nazwisko' => htmlspecialchars($_POST['nazwisko']),
            'login' => htmlspecialchars($_POST['login']),
            'datawaznoscikonta' => (strtotime("now") + 60*60*24*90),
            'stan' => htmlspecialchars($_POST['stan']),
            'oplata' => htmlspecialchars($_POST['oplata']),
            'portyonof' => htmlspecialchars($_POST['portyonof']),
            'porty' => htmlspecialchars($_POST['porty']),
            'downloadhttp' => htmlspecialchars($_POST['downloadhttp']),
            'downloadall' => htmlspecialchars($_POST['downloadall']),
            'upload' => htmlspecialchars($_POST['upload'])
        );
        if (!$this->db->update('users', $data, "id = ".$ID)){
            echo "error";die;
        }
    }
    public function userPasswordEdit($ID, $md5pass) {
        $data = array(
            'haslo' => $md5pass
        );
        if (!$this->db->update('users', $data, "id = ".$ID)){
            echo "error";die;
        }
    }
    
    public function addUser(){
        $data = array(
            'imie' => htmlspecialchars($_POST['imie']),
            'pomieszczenie' => htmlspecialchars($_POST['pomieszczenie']),
            'wydzial' => htmlspecialchars($_POST['wydzial']),
            'kierunek' => htmlspecialchars($_POST['kierunek']),
            'nazwisko' => htmlspecialchars($_POST['nazwisko']),
            'haslo' => md5($_POST['haslo']),
            'login' => htmlspecialchars($_POST['login']),
            'datawaznoscikonta' => (strtotime("now") + 60*60*24*90),
            'datarejestracji' => (strtotime("now")),
            'stan' => htmlspecialchars($_POST['stan']),
            'oplata' => htmlspecialchars($_POST['oplata']),
            'portyonof' => htmlspecialchars($_POST['portyonof']),
            'porty' => htmlspecialchars($_POST['porty']),
            'downloadhttp' => htmlspecialchars($_POST['downloadhttp']),
            'downloadall' => htmlspecialchars($_POST['downloadall']),
            'upload' => htmlspecialchars($_POST['upload'])
        );
        if (!$this->db->insert('users', $data)){
            echo "error";die;
        }
        //return $this->db->lastInsertId();  
    }
    public function getIdByLogin($login) {
        $sth = $this->db->select('select id from users where login = :login', array('login' => $login));
        return $sth[0]['id'];
    }
    
    
}