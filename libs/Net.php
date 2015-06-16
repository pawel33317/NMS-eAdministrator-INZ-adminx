<?php

class Net extends Controller{
    function __construct() {
        parent::__construct();
        parent::loadModel('net');
    }
   
    
    
    
    
    
    
    
    
    
    
    
    
    public function getNewIP() {
        $oktet1 = 10;
        $oktet2 = 0;
        $oktet3 = 0;
        $oktet4 = 1;

        $lastOctet = 1;
        $foundedIP = false;
        $secondLast = 0;
        while ($secondLast < 4 && $foundedIP == false) {
            $lastOctet = 2;
            $oktet3 = $secondLast;
            while ($lastOctet < 255 && $foundedIP == false) {
                $oktet4 = $lastOctet;
                $result = $this->model->existIP($oktet1 . '.' . $oktet2 . '.' . $oktet3 . '.' . $oktet4);
                if (!$result) {
                    $foundedIP = true;
                }
                $lastOctet++;
            }
            $secondLast++;
        }

        if ($foundedIP == true) {
            return $oktet1 . '.' . $oktet2 . '.' . $oktet3 . '.' . $oktet4; //return '10.0.0.111';
        } else {
            return false;
        }
    }

}
