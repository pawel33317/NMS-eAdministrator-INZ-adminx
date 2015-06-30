<?php

class Devicechange extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->info = array();
        $this->auth = new Auth();
        //gwarantuje ze jest zalogowany jak nie to przekieruje
        $this->auth->handleLogin();
        $this->view->leftMenu = array();
        $this->view->js = array('services/js/hideElement.js');
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
    
    function delete($ID, $callbackFunction, $callbackMethod, $callbackListing, $callbackOrderBy, $callbackOldSort, $pageNumber) {
        $this->model->delete($ID);
        Header("Location: " . URL.$callbackFunction.'/'.$callbackMethod.'/'.$callbackListing.'/'.$callbackOrderBy.'/'.$callbackOldSort.'/'.$pageNumber);
    }

    function tryEdit($ID) {  
        $this->model->editDevice($ID);
        array_push($this->view->info, array('type' => 'success', 'text' => 'Operacje wprowadzone w życie.'));
        $this->index($ID, true);
    }
    
    function tryAdd() {
        $this->view->js = array('services/js/hideElement.js');
        $this->model->addDevice();
        $ID = $this->model->getIdByMAC(htmlspecialchars($_POST['mac']));
        array_push($this->view->info, array('type' => 'success', 'text' => 'Urządzenie dodane poprawnie.'));
        $this->index($ID, true);
    }
    
    function index($ID="new", $changeInfo = false) {
        
        //czu dodajemy nowe czy edytujemy //w zależności od tego podświedla w lewym menu dodaj nowego użytkownika
        $newDEVICE = ($ID=="new")?true:false;
        $this->view->render('header');
        $this->view->render('devicechange/ajaxIPgen');
        $this->renderLeftMenu();

        //jeżeli jest to edycja to pobiera dane o urządzeniu i przypisuje do zmiennej dla widoku
        $this->view->form = $newDEVICE?NULL:$this->model->getDeviceData($ID);
        
        //generuje tytuł i link w zależności czy dodanie użytkownika czy edycja 
        $this->view->form['title'] = $newDEVICE?'Dodanie nowego urządzenia':'Edycja urządzenia';
        $this->view->form['link'] = $newDEVICE?'tryAdd':'tryEdit/'.$ID;

        //jeżeli było coś zmienione wyświetl info 
        $this->view->render('services/info');
        
        $this->view->render('devicechange/deviceForm');
        $this->view->render('footerWithMenu');
    }

}
