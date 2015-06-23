<?php

class Net_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function existIP($ip) {
        $sth = $this->db->select('SELECT id FROM devices WHERE ip = :ip', array('ip' => $ip));
        if (isset($sth[0]['id']))
            return true;
        else
            return false;
    }

    /*public function serviceState($service) {
        $sth = $this->db->select('SELECT state FROM services WHERE service = :service', array('service' => $service));
        if (isset($sth[0]['state'])){
            if ($sth[0]['state'] == 1)
                return true;
            else
                return false;
        }
        else
            return false;
    }*/
}