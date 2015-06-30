<?php

class Services_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getServiceStates() {
        $sth = $this->db->select('select * from services', array());
        return $sth;
    }
    
    public function addMessageToQueue($type,$message,$operation){
        $data = array(
            'performdate' => (strtotime("now")),
            'dateadd' => (strtotime("now")),
            'message' => $message,
            'operacja' => $operation,
            'type' => $type
        );
        if (!$this->db->insert('queue', $data)){
            echo "error";die;
        }
        //return $this->db->lastInsertId();  
    }
}
