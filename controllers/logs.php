<?php

class Logs extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function loadAuthContent(){
        $this->view->info = array();
        $this->auth = new Auth();
        //gwarantuje ze jest zalogowany jak nie to przekieruje
        $this->auth->handleLogin();
        $this->view->leftMenu = array();
    }

    private function renderLeftMenu($active = ""){
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
    
    function logAjax($logID = 1) {
        $currentLog = $this->model->getLog($logID);
        echo $currentLog[0]['content'];
    }
    
    function logPanelAjax($logID = 1) {
        $this->view->panelLogs = $this->model->getPanelLogs(100);
        $this->view->render('logs/panelLogsAjax');
    }
    
    
    function log($logID = 1) {
        $this->loadAuthContent();
        $this->view->currentLog = $logID;
        $this->view->render('header');
        $currentLog = $this->model->getLog($logID);
        $this->view->title = 'Log: '.$currentLog[0]['title'].' &raquo; czas odświeżania 15 sekund';
        $this->renderLeftMenu('log/'.$logID);
        $this->view->linuxLogs = $currentLog;
        $this->view->render('logs/linuxLogs');
        $this->view->render('footerWithMenu');
        $this->view->render('logs/getOneLogAjax');
    }
    
    function panelLog() {
        $this->loadAuthContent();
        $this->view->render('header');
        $this->renderLeftMenu('panelLog');
        $this->view->title = 'Logi systemu zarządzania siecią &raquo; czas odświeżania 15 sekund &raquo; ilość logów: 100';
        $logLimit = 100;
        $this->view->panelLogs = $this->model->getPanelLogs($logLimit);
        $this->view->render('logs/panelLogs');
        $this->view->render('footerWithMenu');
        $this->view->render('logs/getPanelLogsAjax');
    }
    
    
    function index() {
        $this->loadAuthContent();
        $this->view->render('header');
        $this->renderLeftMenu();
        $this->view->title = 'Wszystkie logi systemowe brak odświeżania';
        $this->view->render('logs/linuxLogs');
        $this->view->render('footerWithMenu');
    }
}
