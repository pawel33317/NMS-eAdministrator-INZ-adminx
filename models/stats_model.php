<?php

class Stats_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUsersCount() {
        $sth = $this->db->select('select count(*) as ilosc from users', array());
        return $sth[0]['ilosc'];
    }

    public function getDevicesCount() {
        $sth = $this->db->select('select count(*) as ilosc from devices', array());
        return $sth[0]['ilosc'];
    }
    public function getServiceStates() {
        $sth = $this->db->select('select * from services', array());
        return $sth;
    }
    public function userWithMaxDevices() {
        $sth = $this->db->select('SELECT login, user_id, COUNT(d.user_id) as \'ilosc\'
	FROM users AS u left JOIN devices AS d
		ON u.id=d.user_id
	GROUP BY user_id
	HAVING COUNT(d.user_id) =
	(SELECT MAX( ilosc )
			FROM (
			SELECT COUNT( user_id ) AS ilosc
			FROM devices
			GROUP BY user_id
			) AS tmp) ORDER BY RAND() LIMIT 1;', array());
        if ($sth)
           return $sth[0];
        else {
            $tmp['ilosc'] = 0;
            $tmp['login'] = 'brak';
            return $tmp;
        }
         
    }

    public function getPaidUsers() {
        $sth = $this->db->select('select count(*) as ilosc from users where oplata = 1', array());
        return $sth[0]['ilosc'];
    }

    public function getBlockedUsers() {
        $sth = $this->db->select('select count(*) as ilosc from users where stan = 2', array());
        return $sth[0]['ilosc'];
    }

    public function getUnactivatedUsers() {
        $sth = $this->db->select('select count(*) as ilosc from users where stan = 0', array());
        return $sth[0]['ilosc'];
    }

    public function getUsersRegisteredLast24h() {
        $sth = $this->db->select('select count(*) as ilosc from users where datarejestracji > ' . (@strtotime("now") - 60 * 60 * 24 * 2), array());
        return $sth[0]['ilosc'];
    }

    public function getDevicesRegisteredLast24h() {
        $sth = $this->db->select('select count(*) as ilosc from devices where dateadd > ' . (@strtotime("now") - 60 * 60 * 24 * 2), array());
        return $sth[0]['ilosc'];
    }

    public function getUsersRegisteredLastWeek() {
        $sth = $this->db->select('select count(*) as ilosc from users where datarejestracji > ' . (@strtotime("now") - 60 * 60 * 24 * 7), array());
        return $sth[0]['ilosc'];
    }

    public function getDevicesRegisteredLastWeek() {
        $sth = $this->db->select('select count(*) as ilosc from devices where dateadd > ' . (@strtotime("now") - 60 * 60 * 24 * 7), array());
        return $sth[0]['ilosc'];
    }

    /*
      public function macState($mac) {

      $sth = $this->db->select('SELECT stan FROM devices WHERE mac = :mac', array('mac' => $mac));

      if (isset($sth[0]['stan']))
      return $sth[0]['stan'];
      else
      return false;
      }

      public function getPassword($userID, $searchTable = 'id') {
      $sth = $this->db->select('SELECT haslo h FROM users WHERE ' . $searchTable . ' = :id', array('id' => $userID));
      if (isset($sth[0]['h']))
      return $sth[0]['h'];
      else
      return false;
      }

      public function updateAccountWalidity($userID, $newTime) {
      $sth = $this->db->update('users', array('datawaznoscikonta' => $newTime), '`id` = ' . $_COOKIE['user_id']);
      echo json_encode($sth);
      }

      public function getAccountWalidity($userID) {
      $sth = $this->db->select('SELECT datawaznoscikonta FROM users WHERE id = :id', array('id' => $userID));
      if (isset($sth[0]['datawaznoscikonta']))
      return $sth[0]['datawaznoscikonta'];
      else
      return false;
      }

      public function getUserDevices($userID) {
      $sth = $this->db->select('SELECT id, ip, devtype, devname FROM devices WHERE user_id = :id', array('id' => $userID));
      if (isset($sth))
      return $sth;
      else
      return false;
      }

      public function getUserID($login) {
      $sth = $this->db->select('SELECT id FROM users WHERE login = :login', array('login' => $login));
      if (isset($sth[0]['id']))
      return $sth[0]['id'];
      else
      return false;
      }

      public function registerNewUser($data) {
      return $this->db->insert('users',$data);
      } */
}
