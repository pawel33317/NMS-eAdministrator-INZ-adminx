<?php

class DeviceSettings_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getDevices($count, $orderBy, $sort, $start, $where) {
        //pezez limit nie można było użyć naszej funkcji select bo cośtam chyba że limit nie jest intem
        $sth = $this->db->prepare('
            SELECT d.id as devid, u.id as userid, imie, nazwisko, login, dateadd, mac, ip, devtype, devname, opis FROM devices AS d 
                LEFT JOIN users AS u ON d.user_id = u.id '.$where.'  order by '.$orderBy.' '.$sort.' limit '.$start.', '.$count.' ');
        $sth->execute();
        //var_dump($sth->fetchAll(PDO::FETCH_ASSOC));die(); 
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDeviceCount($where) {
        //pezez limit nie można było użyć naszej funkcji select bo cośtam chyba że limit nie jest intem
        $sth = $this->db->prepare('SELECT count(*) as ilosc FROM devices as d '.$where);
        $sth->execute();
        $all = $sth->fetchAll(PDO::FETCH_ASSOC); 
        return $all[0]['ilosc'];
        
        
    }
    
}