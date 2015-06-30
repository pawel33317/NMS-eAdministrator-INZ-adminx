<?php

class Stats extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->info = array();
        $this->auth = new Auth();
        //gwarantuje ze jest zalogowany jak nie to przekieruje
        $this->auth->handleLogin();
        $this->view->leftMenu = array();
    }

    private function loadStats() {
        $wszyscy_userzy = $this->model->getUsersCount();
        $wszystkie_urzadzenia = $this->model->getDevicesCount();
        $srednia_luczba_urzadzeni_na_usera = round($wszystkie_urzadzenia / $wszyscy_userzy, 2);
        $tmpUserWithMaxDevices = $this->model->userWithMaxDevices();
        $user_max_urzadzen_ilosc = $tmpUserWithMaxDevices['ilosc'];
        $user_max_urzadzen_login = $tmpUserWithMaxDevices['login'];
        $oplaceni = $this->model->getPaidUsers();
        $zablokowani = $this->model->getBlockedUsers();
        $nieaktywni = $this->model->getUnactivatedUsers();
        $s24h = $this->model->getUsersRegisteredLast24h();
        $s24hu = $this->model->getDevicesRegisteredLast24h();
        $lastweek = $this->model->getUsersRegisteredLastWeek();
        $lastweeku = $this->model->getDevicesRegisteredLastWeek();
        
        $this->view->stats['wszyscy_userzy'] = $wszyscy_userzy;
        $this->view->stats['wszystkie_urzadzenia'] = $wszystkie_urzadzenia;
        $this->view->stats['user_max_urzadzen_ilosc'] = $user_max_urzadzen_ilosc;
        $this->view->stats['user_max_urzadzen_login'] = $user_max_urzadzen_login;
        $this->view->stats['srednia_luczba_urzadzeni_na_usera'] = $srednia_luczba_urzadzeni_na_usera;
        $this->view->stats['oplaceni'] = $oplaceni;
        $this->view->stats['zablokowani'] = $zablokowani;
        $this->view->stats['nieaktywni'] = $nieaktywni;
        $this->view->stats['s24h'] = $s24h;
        $this->view->stats['s24hu'] = $s24hu;
        $this->view->stats['lastweek'] = $lastweek;
        $this->view->stats['lastweeku'] = $lastweeku;

        $this->view->serviceStates = $this->model->getServiceStates();

    }

    function index($show = null) {
        $this->view->render('header');
        $this->view->render('leftMenu');
        $this->loadStats();
        $this->view->render('stats/statsTable');
        /*array_push($this->view->info, array('type' => 'warning', 'text' => 'xxxxxxxxxxxo '
            . 'rejestrować 2 razy tego samego urządzenia, w razie problemów zgłosić się do administratora pokój 401.'));
        $this->view->render('usersettings/info');*/
        $this->view->render('footerWithMenu');
        $this->view->render('services/serviceStatesgetAjax');
    }
}
