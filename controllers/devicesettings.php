<?php

class Devicesettings extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->info = array();
        $this->auth = new Auth();
        //gwarantuje ze jest zalogowany jak nie to przekieruje
        $this->auth->handleLogin();
        $this->view->leftMenu = array();
    }
    function renderLeftMenu(){
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'user', 'link' => 'usersettings/index', 'title' => "Użytkownicy"));
        array_push($this->view->leftMenu, array('active' => true, 'ico' => 'inbox', 'link' => 'devicesettings/index', 'title' => "Urządzenia"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'ok', 'link' => 'usersettings/paid', 'title' => "Opłaceni"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'remove', 'link' => 'usersettings/unpaid', 'title' => "Nieopłaceni"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'lock', 'link' => 'usersettings/blocked', 'title' => "Zablokowani"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'thumbs-up', 'link' => 'usersettings/accepted', 'title' => "Zaakceptowani"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'thumbs-down', 'link' => 'usersettings/unaccepted', 'title' => "Niezaakceptowani"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'plus', 'link' => 'userchange/index/new', 'title' => "Dodaj nowego użytkownika"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'plus', 'link' => 'devicechange/index/new', 'title' => "Dodaj nowe urządzenie"));
        $this->view->render('leftMenu');
    }
    private function showDevices($count, $orderBy, $sort, $start, $where){
        //*1 parsuje na inta
        $this->view->listing['count'] = $count*1;
        $this->view->listing['orderBy'] = $orderBy;
        $this->view->listing['start'] = $start;
        $this->view->listing['where'] = $where;
        $this->view->listing['sort'] = ($sort == 'ASC')?'DESC':'ASC';
        $this->view->listing['oldsort'] = ($sort != 'ASC')?'DESC':'ASC';
        $this->view->device = $this->model->getDevices($count*1, $orderBy, $sort, $start*1, $where);
        $this->view->render('devicesettings/showDevices');
    }
    private function generateNumberOfPages($visible, $current, $where){     
        
        $all = $this->model->getDeviceCount($where);
        $this->view->allDevice = $all;
        $this->view->pages = array();
        $index = 1;
        for($i = 0; $i < $all ; $i=$i+$visible){
            $active = ($i==$current)?true:false;
            if ($active)
                $this->view->activePage = $i;
            array_push($this->view->pages, array('index' => $index, 'start' => $i, 'active' => $active));
            $index++;
        }  
    }
    
    private function showRecordsLimit(){       
        $this->view->render('devicesettings/showRecordsLimit');
    }
    
    function getFreeIP(){
        $net = new NET();
        echo $net->getNewIP();
    }
    
    function index($count = 50, $orderBy = 'd.id', $sort = 'DESC', $start = 0, $where = '',$callbackLink = "index") {
        $this->view->render('header');
        $this->renderLeftMenu($callbackLink);
        $this->view->showUsersCallbackLink = $callbackLink;
        //trzeba odpalić przed showusers bo ustawia zmienną $this->view->activePage  która jest potrzebna dla showUsers
        // a dopiero później wyrenderować showPages
        
        $this->generateNumberOfPages($count, $start, $where);
        $this->showDevices($count, $orderBy, $sort, $start, $where);
        $this->view->render('devicesettings/showPages');
        $this->showRecordsLimit();
        array_push($this->view->info, array('type' => 'warning', 'text' => 'Aby przejść do właściciela kliknij na login.<br>Aby rozpocząć edycję kliknij na ID urządzenia.'));
        $this->view->render('devicesettings/info');
        $this->view->render('footerWithMenu');
    }
    
    function userdevices($userID) {
        $this->index($count = 50, $orderBy = 'd.id', $sort = 'DESC', $start = 0, $where = ' where d.user_id = '.$userID.' ',$callbackLink = "index");
    }

}
