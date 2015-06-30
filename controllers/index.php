<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->auth = new Auth();
        
        //gwarantuje ze jest zalogowany jak nie to przekieruje
        $this->auth->handleLogin();
        
        //lista na informacje do wyświetlenia
        $this->view->info = array();
        $this->view->modules = array();
    }
    
    function index() {
        //gwarantuje ze jest zalogowany jak nie to przekieruje

        
        $this->view->render('header');
        //$this->loadStats();
        array_push($this->view->info, array('type' => 'primary', 'boldtext' => 'Lista modułów systemu zarządzania siecią.'));
        $this->view->render('index/info');
        array_push($this->view->modules, array('ico' => 'stats', 'link' => 'stats', 'title' => "Centrum statystyk"));
        array_push($this->view->modules, array('ico' => 'user', 'link' => 'usersettings', 'title' => "Centrum zarządzania użytkownikami"));
        array_push($this->view->modules, array('ico' => 'book', 'link' => 'logs', 'title' => "Centrum logów"));
        array_push($this->view->modules, array('ico' => 'eye-open', 'link' => 'services', 'title' => "Centrum monitorowania i zarządzania usługami"));
        array_push($this->view->modules, array('ico' => 'hdd', 'link' => 'backumps', 'title' => "Centrum zarządzania backumpami"));
        array_push($this->view->modules, array('ico' => 'envelope', 'link' => 'emails', 'title' => "Centrum wysyłania maili"));
        array_push($this->view->modules, array('ico' => 'th-list', 'link' => 'systemsettings', 'title' => "Centrum ustawień systemowych"));
        array_push($this->view->modules, array('ico' => 'globe', 'link' => 'networkscan', 'title' => "Centrum skanowania sieci"));
        $this->view->render('index/modulesList');
        



        $this->view->info = array();
        array_push($this->view->info, array('type' => 'primary', 'boldtext' => 'Copyright &copy; 2015'));
        $this->view->render('index/info');
        $this->view->render('footerWithOutMenu');
        
        
        //Header("Location: " . URL . "adminpanel");
    }
    
    
    function logout() {
        //gwarantuje ze jest zalogowany jak nie to przekieruje
        $this->auth->logout();
        //Header("Location: " . URL . "adminpanel");
    }
}