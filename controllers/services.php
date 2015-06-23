<?php

class Services extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('services/js/hideElement.js');
        $this->view->info = array();
        $this->auth = new Auth();
        //gwarantuje ze jest zalogowany jak nie to przekieruje
        $this->auth->handleLogin();
        $this->view->leftMenu = array();
    }
    private function loadServicesStats() {
        $this->NetSettings = new Net();
    }

    function changeService($service, $operation) {
        //zmienia
        
        
        
        
        header('location: ' . URL .  'services/changed/'.$service);
    }
    
    function changed($service){
        $this->view->render('header');
        $this->view->render('leftMenu');
        $this->view->serviceStates = $this->model->getServiceStates();
        $this->loadServicesStats();
        $this->view->render('services/serviceStateTable');
        array_push($this->view->info, array('type' => 'success', 'boldtext' => 'Operacja na usłudze '.$service.' wykonana poprawnie'));
        $this->view->render('services/info');
        $this->view->render('services/serviceMAnage');
        $this->view->render('footerWithMenu');
    }
    
    
    function index($show = false) {
        $this->view->render('header');
        $this->view->render('leftMenu');
        $this->view->serviceStates = $this->model->getServiceStates();
        $this->loadServicesStats();
        $this->view->render('services/serviceStateTable');
        $this->view->render('services/serviceMAnage');
        $this->view->render('footerWithMenu');
    }
}
