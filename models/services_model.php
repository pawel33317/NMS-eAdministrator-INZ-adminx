<?php

class Services_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getServiceStates() {
        $sth = $this->db->select('select * from services', array());
        return $sth;
    }
}
