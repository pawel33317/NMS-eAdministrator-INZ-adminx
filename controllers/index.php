<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->auth = new Auth();
    }
    
    function index() {
        //gwarantuje ze jest zalogowany jak nie to przekieruje
        $this->auth->handleLogin();
        
        
        Header("Location: " . URL . "adminpanel");
    }
    
}