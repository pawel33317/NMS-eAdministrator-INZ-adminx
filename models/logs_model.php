<?php

class Logs_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getLogs() {
        $sth = $this->db->select('select * from linuxLogs', array());
        return $sth;
    }

    public function getLog($logID) {
        $sth = $this->db->select('select * from linuxLogs where id = :id', array('id' => $logID));
        return $sth;
    }
    public function getPanelLogs($logLimit) {
        //pezez limit nie można było użyć naszej funkcji select bo cośtam chyba że limit nie jest intem
        $sth = $this->db->prepare('select * from panelLogs order by id limit 0, :limitx ');
        $sth->bindParam(':limitx', $logLimit, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
        
    }

}
