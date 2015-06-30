<?php

class Devicechange_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    public function delete($ID){
        $this->db->delete('devices', "id = ".$ID);
    }

    public function getDeviceData($ID) {
        $sth = $this->db->select('select * from devices where id = "'.$ID.'"', array());
        return $sth[0];
    }
    
 
    public function editDevice($ID) {
        $data = array(
            'devname' => htmlspecialchars($_POST['devname']),
            'user_id' => htmlspecialchars($_POST['user_id']),
            'mac' => htmlspecialchars($_POST['mac']),
            'opis' => htmlspecialchars($_POST['opis']),
            'devtype' => htmlspecialchars($_POST['devtype']),
            'ip' => htmlspecialchars($_POST['ip'])
        );
        if (!$this->db->update('devices', $data, "id = ".$ID)){
            echo "error";die;
        }
    }

    public function addDevice(){
        $data = array(
            'devname' => htmlspecialchars($_POST['devname']),
            'user_id' => htmlspecialchars($_POST['user_id']),
            'mac' => htmlspecialchars($_POST['mac']),
            'opis' => htmlspecialchars($_POST['opis']),
            'dateadd' => (strtotime("now")),
            'devtype' => htmlspecialchars($_POST['devtype']),
            'ip' => htmlspecialchars($_POST['ip'])
        );
        if (!$this->db->insert('devices', $data)){
            echo "error";die;
        }
        //return $this->db->lastInsertId();  
    }
    public function getIdByMAC($MAC) {
        
        $sth = $this->db->select('select id from devices where mac = "'.$MAC.'"', array());
        return $sth[0]['id'];
    }
    
    
}