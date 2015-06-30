<?php

class Services extends Controller {

    function __construct() {
        parent::__construct();
    }
    //ładowana przez funkcje wyświetlające treść
    //nie jest w konstruktorze bo są zapytania ajax któe nie są zalogowane a potrzebują dane
    private function loadAuthContent() {
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
    //do zapytania ajax generuje przyciski ze stanami usług
    public function getServiceStates() {
        $this->view->serviceStates = $this->model->getServiceStates();
        $this->view->render('services/serviceStatesAjax');
        $this->model->addMessageToQueue(3,"service states","refresh states");
    }

    function changeService($service, $operation) {
        //zmienia
        $this->model->addMessageToQueue(1,$service,$operation);
        header('location: ' . URL . 'services/changed/' . $service);
    }

    function changed($service) {
        $this->loadAuthContent();
        $this->view->render('header');
        $this->view->render('leftMenu');
        $this->view->serviceStates = $this->model->getServiceStates();
        $this->loadServicesStats();
        $this->view->render('services/serviceStateTable');
        array_push($this->view->info, array('type' => 'success', 'boldtext' => 'Operacja na usłudze ' . $service . ' wykonana poprawnie'));
        $this->view->render('services/info');
        $this->view->render('services/serviceMAnage');
        $this->view->render('footerWithMenu');
        $this->view->render('services/serviceStatesgetAjax');
    }

    function index($show = false) {
        $this->loadAuthContent();
        $this->view->render('header');
        $this->view->render('leftMenu');
        $this->view->serviceStates = $this->model->getServiceStates();
        $this->loadServicesStats();
        $this->view->render('services/serviceStateTable');
        $this->view->render('services/serviceMAnage');
        $this->view->render('footerWithMenu');
        $this->view->render('services/serviceStatesgetAjax');
    }

}
