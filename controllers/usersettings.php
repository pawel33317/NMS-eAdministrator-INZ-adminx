<?php

class Usersettings extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->info = array();
        $this->auth = new Auth();
        //gwarantuje ze jest zalogowany jak nie to przekieruje
        $this->auth->handleLogin();
        $this->view->leftMenu = array();
    }
    
    function renderLeftMenu($active = NULL){
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'user', 'link' => 'usersettings/index', 'title' => "Użytkownicy"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'inbox', 'link' => 'usersettings/devices', 'title' => "Urządzenia"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'ok', 'link' => 'usersettings/paid', 'title' => "Opłaceni"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'remove', 'link' => 'usersettings/unpaid', 'title' => "Nieopłaceni"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'lock', 'link' => 'usersettings/blocked', 'title' => "Zablokowani"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'thumbs-up', 'link' => 'usersettings/accepted', 'title' => "Zaakceptowani"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'thumbs-down', 'link' => 'usersettings/unaccepted', 'title' => "Niezaakceptowani"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'plus', 'link' => 'userchange/index/new', 'title' => "Dodaj nowego użytkownika"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'plus', 'link' => 'devicechange/adddevice/new', 'title' => "Dodaj nowe urządzenie"));
        for ($i = 0; $i < count($this->view->leftMenu); $i++) {
            if ($this->view->leftMenu[$i]['link'] == 'usersettings/'.$active){
                $this->view->leftMenu[$i]['active'] = true;
                break;
            }
        }
        $this->view->render('leftMenu');
    }
    
    
    private function showUsers($count, $orderBy, $sort, $start, $where){
        //*1 parsuje na inta
        $this->view->listing['count'] = $count*1;
        $this->view->listing['orderBy'] = $orderBy;
        $this->view->listing['start'] = $start;
        $this->view->listing['where'] = $where;
        $this->view->listing['sort'] = ($sort == 'ASC')?'DESC':'ASC';
        $this->view->listing['oldsort'] = ($sort != 'ASC')?'DESC':'ASC';
        $this->view->users = $this->model->getUsers($count*1, $orderBy, $sort, $start*1, $where);
        $this->view->render('usersettings/showUsers');
    }

    private function generateNumberOfPages($visible, $current, $where){       
        $all = $this->model->getUsersCount($where);
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
        $this->view->render('usersettings/showRecordsLimit');
    }
    
    function unaccepted($count = 50, $orderBy = 'id', $sort = 'DESC', $start = 0) {
        $this->index($count, $orderBy, $sort, $start, $where = ' where stan = 0 ', 'unaccepted');
    }
    
    function accepted($count = 50, $orderBy = 'id', $sort = 'DESC', $start = 0) {
        $this->index($count, $orderBy, $sort, $start, $where = ' where stan = 1 ', 'accepted');
    }
    function paid($count = 50, $orderBy = 'id', $sort = 'DESC', $start = 0) {
        $this->index($count, $orderBy, $sort, $start, $where = ' where oplata = 1 ', 'paid');
    }
    
    function blocked($count = 50, $orderBy = 'id', $sort = 'DESC', $start = 0) {
        $this->index($count, $orderBy, $sort, $start, $where = ' where stan = 2 ', 'blocked');
    }
    
    function unpaid($count = 50, $orderBy = 'id', $sort = 'DESC', $start = 0) {
        $this->index($count, $orderBy, $sort, $start, $where = ' where oplata = 0 ', 'unpaid');
    }
    
    function index($count = 50, $orderBy = 'id', $sort = 'DESC', $start = 0, $where = '',$callbackLink = "index") {
        $this->view->render('header');
        $this->renderLeftMenu($callbackLink);
        $this->view->showUsersCallbackLink = $callbackLink;
        //trzeba odpalić przed showusers bo ustawia zmienną $this->view->activePage  która jest potrzebna dla showUsers
        // a dopiero później wyrenderować showPages
        $this->generateNumberOfPages($count, $start, $where);
        $this->showUsers($count, $orderBy, $sort, $start, $where);
        $this->view->render('usersettings/showPages');
        $this->showRecordsLimit();
        array_push($this->view->info, array('type' => 'warning', 'text' => 'Aby przejść do urządzeń użytkownika kliknij na liczbę urządzeń.<br>Aby przejść do użytkownika kliknij na jego ID.'));
        $this->view->render('usersettings/info');
        $this->view->render('footerWithMenu');
    }

}
