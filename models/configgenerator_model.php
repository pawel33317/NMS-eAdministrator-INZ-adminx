<?php

class Configgenerator_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUsersDevices() {
        $sth = $this->db->select('SELECT login, devname, ip, portyonof, porty, u.stan as stann FROM devices AS d LEFT JOIN users as u on u.id = d.user_id', array());
        return $sth;
    }
    
    public function getUsersDHCP() {
        $sth = $this->db->select('SELECT login, imie, nazwisko, mac, ip, pomieszczenie, devname, u.stan as stann FROM devices AS d LEFT JOIN users as u on u.id = d.user_id', array());
        return $sth;
    }
    
    public function getUsersTC() {
        $sth = $this->db->select('SELECT u.id as id , login, ip, login, downloadhttp, downloadall, upload 
	FROM devices AS d LEFT JOIN users as u on u.id = d.user_id order by u.id asc', array());
        return $sth;
    }

}
