<?php

class Usersettings_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUsers($count, $orderBy, $sort, $start, $where) {
        //pezez limit nie można było użyć naszej funkcji select bo cośtam chyba że limit nie jest intem
        $sth = $this->db->prepare('
            SELECT * FROM users AS u 
                LEFT JOIN (
                    SELECT COUNT( user_id ) AS deviceCount, user_id FROM devices 
                        GROUP BY user_id) AS dev ON dev.user_id = u.id '.$where.'  order by '.$orderBy.' '.$sort.' limit '.$start.', '.$count.' ');
        $sth->execute();
        //var_dump($sth->fetchAll(PDO::FETCH_ASSOC));die(); 
        return $sth->fetchAll(PDO::FETCH_ASSOC); 
    }
    
    public function searchUsers($search) {
        
        $where = ' where ';
        $where .= ' imie LIKE "%'.$search.'%"';
        $where .= ' OR nazwisko LIKE "%'.$search.'%"';
        $where .= ' OR wydzial LIKE "%'.$search.'%"';
        $where .= ' OR pomieszczenie LIKE "%'.$search.'%"';
        $where .= ' OR kierunek LIKE "%'.$search.'%"';
        $where .= ' OR login LIKE "%'.$search.'%"';
        $where .= ' OR mac LIKE "%'.$search.'%"';
        $where .= ' OR ip LIKE "%'.$search.'%"';
        $where .= ' OR devname LIKE "%'.$search.'%"';
        $where .= ' OR devtype LIKE "%'.$search.'%"';
        //imie, nazwisko, wydzial, pomieszczenie, kierunek, login, mac, ip, devtype, devname
        $sth = $this->db->prepare('
            SELECT * FROM users AS u 
                LEFT JOIN (SELECT COUNT( user_id ) AS deviceCount, user_id FROM devices GROUP BY user_id) AS dev ON dev.user_id = u.id 
                LEFT JOIN (SELECT user_id as uidd, mac, ip, devtype, devname FROM devices) AS ddev ON ddev.uidd = u.id
              '.$where.' order by u.id desc');
        
        
        $sth->execute();
        
        
        
        
        //var_dump($sth->fetchAll(PDO::FETCH_ASSOC));die(); 
        return $sth->fetchAll(PDO::FETCH_ASSOC); 
    }
    
    public function getUsersCount($where) {
        //pezez limit nie można było użyć naszej funkcji select bo cośtam chyba że limit nie jest intem
        $sth = $this->db->prepare('SELECT count(*) as ilosc FROM users '.$where);
        $sth->execute();
        $all = $sth->fetchAll(PDO::FETCH_ASSOC); 
        return $all[0]['ilosc'];
    }
}