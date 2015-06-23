<?php

class Logs extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->info = array();
        $this->auth = new Auth();
        //gwarantuje ze jest zalogowany jak nie to przekieruje
        $this->auth->handleLogin();
        $this->view->leftMenu = array();
    }


    function renderLeftMenu($active = ""){
        $this->view->linuxLogs = $this->model->getLogs();
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'th-large', 'link' => 'logs/panelLog', 'title' => "Logi Panelu"));
        foreach ($this->view->linuxLogs as $log) {
            array_push($this->view->leftMenu, array('active' => false, 'ico' => 'align-justify', 'link' => 'logs/log/'.$log['id'], 'title' => $log['title']));
        }  
        for ($i = 0; $i < count($this->view->leftMenu); $i++) {
            if ($this->view->leftMenu[$i]['link'] == 'logs/'.$active){
                $this->view->leftMenu[$i]['active'] = true;
                break;
            }
        }
        $this->view->render('leftMenu'); 
    }
    
    function log($logID = 1) {
        $this->view->render('header');
        $currentLog = $this->model->getLog($logID);
        $this->view->title = 'Log: '.$currentLog[0]['title'].' &raquo; czas odświeżania 30 sekund';
        $this->renderLeftMenu('log/'.$logID);
        $this->view->linuxLogs = $currentLog;
        $this->view->render('logs/linuxLogs');
        $this->view->render('footerWithMenu');
    }
    
    function panelLog() {
        $this->view->render('header');
        $this->renderLeftMenu('panelLog');
        $this->view->title = 'Logi systemu zarządzania siecią &raquo; czas odświeżania 30 sekund &raquo; ilość logów: 100';
        $logLimit = 100;
        $this->view->panelLogs = $this->model->getPanelLogs($logLimit);
        $this->view->render('logs/panelLogs');
        $this->view->render('footerWithMenu');
    }
    
    
    function index() {
        $this->view->render('header');
        $this->renderLeftMenu();
        $this->view->title = 'Wszystkie logi systemowe - czas odświeżania 30 sekund';
        $this->view->render('logs/linuxLogs');
        $this->view->render('footerWithMenu');
    }
}
