<?php

class Userchange extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->info = array();
        $this->auth = new Auth();
        //gwarantuje ze jest zalogowany jak nie to przekieruje
        $this->auth->handleLogin();
        $this->view->leftMenu = array();
    }

    function renderLeftMenu($active = false){
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'user', 'link' => 'usersettings/index', 'title' => "Użytkownicy"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'inbox', 'link' => 'devicesettings/index', 'title' => "Urządzenia"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'ok', 'link' => 'usersettings/paid', 'title' => "Opłaceni"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'remove', 'link' => 'usersettings/unpaid', 'title' => "Nieopłaceni"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'lock', 'link' => 'usersettings/blocked', 'title' => "Zablokowani"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'thumbs-up', 'link' => 'usersettings/accepted', 'title' => "Zaakceptowani"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'thumbs-down', 'link' => 'usersettings/unaccepted', 'title' => "Niezaakceptowani"));
        array_push($this->view->leftMenu, array('active' => $active, 'ico' => 'plus', 'link' => 'userchange/index/new', 'title' => "Dodaj nowego użytkownika"));
        array_push($this->view->leftMenu, array('active' => false, 'ico' => 'plus', 'link' => 'devicechange/index/new', 'title' => "Dodaj nowe urządzenie"));
        $this->view->render('leftMenu');
    }
    
    function accept($ID, $callbackFunction, $callbackMethod, $callbackListing, $callbackOrderBy, $callbackOldSort, $pageNumber) {
        $this->model->accept($ID);
        Header("Location: " . URL.$callbackFunction.'/'.$callbackMethod.'/'.$callbackListing.'/'.$callbackOrderBy.'/'.$callbackOldSort.'/'.$pageNumber);
    }
    function unpaid($ID, $callbackFunction, $callbackMethod, $callbackListing, $callbackOrderBy, $callbackOldSort, $pageNumber) {
        $this->model->unpaid($ID);
        Header("Location: " . URL.$callbackFunction.'/'.$callbackMethod.'/'.$callbackListing.'/'.$callbackOrderBy.'/'.$callbackOldSort.'/'.$pageNumber);
    }
    function paid($ID, $callbackFunction, $callbackMethod, $callbackListing, $callbackOrderBy, $callbackOldSort, $pageNumber) {
        $this->model->paid($ID);
        Header("Location: " . URL.$callbackFunction.'/'.$callbackMethod.'/'.$callbackListing.'/'.$callbackOrderBy.'/'.$callbackOldSort.'/'.$pageNumber);
    }
    function block($ID, $callbackFunction, $callbackMethod, $callbackListing, $callbackOrderBy, $callbackOldSort, $pageNumber) {
        $this->model->block($ID);
        Header("Location: " . URL.$callbackFunction.'/'.$callbackMethod.'/'.$callbackListing.'/'.$callbackOrderBy.'/'.$callbackOldSort.'/'.$pageNumber);
    }
    function delete($ID, $callbackFunction, $callbackMethod, $callbackListing, $callbackOrderBy, $callbackOldSort, $pageNumber) {
        $this->model->delete($ID);
        Header("Location: " . URL.$callbackFunction.'/'.$callbackMethod.'/'.$callbackListing.'/'.$callbackOrderBy.'/'.$callbackOldSort.'/'.$pageNumber);
    }

    function tryEdit($ID) {
        $this->view->js = array('services/js/hideElement.js');
        $this->model->editUser($ID);
        array_push($this->view->info, array('type' => 'success', 'text' => 'Operacje wprowadzone w życie.'));
        
        $haslo                   = htmlspecialchars($_POST['haslo']);	
        $hasloRepeat             = htmlspecialchars($_POST['haslo2']);	
	if (empty($haslo) || strlen($haslo) < 3 || $haslo != $hasloRepeat){
		array_push($this->view->info, array('type' => 'success', 'text' => 'Hasło nie zostało zmienione'));
	}else{
		$this->model->userPasswordEdit($ID, md5($haslo));
		array_push($this->view->info, array('type' => 'success', 'text' => 'Hasło zostało zmienione'));
	}
        $this->index($ID, true);
    }
    
    
    function tryAdd() {
        $this->view->js = array('services/js/hideElement.js');
        //dodaje usera i otrzymuje ID 
        $this->model->addUser();
        
        $ID = $this->model->getIdByLogin(htmlspecialchars($_POST['login']));

        array_push($this->view->info, array('type' => 'success', 'text' => 'Użytkownik dodany poprawnie.'));
        $this->index($ID, true);
    }
    
    function index($ID="new", $changeInfo = false) {
        
        //czu dodajemy nowego czy edytujemy //w zależności od tego podświedla w lewym menu dodaj nowego użytkownika
        $newUSR = ($ID=="new")?true:false;
        $this->view->render('header');
        
        //renderuje lewe menu jeżeli $newUSR true podświetla dodaj nowego użytkownika
        $this->renderLeftMenu($newUSR);

        //jeżeli jest to edycja to pobiera dane o userze i przypisuje do zmiennej dla widoki
        $this->view->form = $newUSR?NULL:$this->model->getUserData($ID);
        
        //generuje tytuł i link w zależności czy dodanie użytkownika czy edycja 
        $this->view->form['title'] = $newUSR?'Dodanie nowego użytkownika':'Edycja użytkownika';
        $this->view->form['link'] = $newUSR?'tryAdd':'tryEdit/'.$ID;

        //jeżeli było coś zmienione wyświetl info 
        $this->view->render('services/info');
        
        $this->view->render('userchange/userForm');
        $this->view->render('footerWithMenu');
    }

}
