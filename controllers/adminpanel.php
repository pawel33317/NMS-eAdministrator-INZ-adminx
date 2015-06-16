<?php

class Adminpanel extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->info = array();
        $this->auth = new Auth();
        //gwarantuje ze jest zalogowany jak nie to przekieruje
        $this->auth->handleLogin();
    }

    private function readLog($file){
        $fileContent = file_get_contents($file, true);
        $convert = explode("\n", $fileContent);
        $fileContent = '';
        for ($i = 0; $i < count($convert); $i++) {
            $fileContent = $fileContent . $convert[$i];
            if ($i < count($convert) - 1)
                $fileContent = $fileContent . '<br>';
        }
        return $fileContent;
    }


    private function loadStats() {

        $wszyscy_userzy = $this->model->getUsersCount();
        echo '$wszyscy_userzy: ' . $wszyscy_userzy . '<br>';
        $wszystkie_urzadzenia = $this->model->getDevicesCount();
        echo '$wszystkie_urzadzenia: ' . $wszystkie_urzadzenia . '<br>';
        $srednia_luczba_urzadzeni_na_usera = round($wszystkie_urzadzenia / $wszyscy_userzy, 2);
        echo '$srednia_luczba_urzadzeni_na_usera: ' . $srednia_luczba_urzadzeni_na_usera . '<br>';

        $tmpUserWithMaxDevices = $this->model->userWithMaxDevices();
        $user_max_urzadzen_ilosc = $tmpUserWithMaxDevices['ilosc'];
        $user_max_urzadzen_login = $tmpUserWithMaxDevices['login'];
        echo '$user_max_urzadzen_ilosc: ' . $user_max_urzadzen_ilosc . '<br>';
        echo '$user_max_urzadzen_login: ' . $user_max_urzadzen_login . '<br>';


        $oplaceni = $this->model->getPaidUsers();
        $zablokowani = $this->model->getBlockedUsers();
        $nieaktywni = $this->model->getUnactivatedUsers();
        $s24h = $this->model->getUsersRegisteredLast24h();
        $s24hu = $this->model->getDevicesRegisteredLast24h();
        $lastweek = $this->model->getUsersRegisteredLastWeek();
        $lastweeku = $this->model->getDevicesRegisteredLastWeek();
        echo '$oplaceni: ' . $oplaceni . '<br>';
        echo '$zablokowani: ' . $zablokowani . '<br>';
        echo '$nieaktywni: ' . $nieaktywni . '<br>';
        echo '$s24h: ' . $s24h . '<br>';
        echo '$s24hu: ' . $s24hu . '<br>';
        echo '$lastweek: ' . $lastweek . '<br>';
        echo '$lastweeku: ' . $lastweeku . '<br>';

        $LinuxLogs = new Linux();
        $LinuxLogs->initLog();
        $file1 = $this->readLog($LinuxLogs->_log_last5);
        $file2 = $this->readLog($LinuxLogs->_log_tail5dmesg);
        $file3 = $this->readLog($LinuxLogs->_log_5varLogCron);
        $file4 = $this->readLog($LinuxLogs->_log_tail5varLogMessages);
        $file5 = $this->readLog($LinuxLogs->_log_tail10varLibDhcpdDhcpdLeases);
        $file6 = $this->readLog($LinuxLogs->_log_panelLog);

    }

    function index($show = null) {
        $this->view->render('header');
        $this->loadStats();

        array_push($this->view->info, array('type' => 'warning', 'text' => 'xxxxxxxxxxxo '
            . 'rejestrować 2 razy tego samego urządzenia, w razie problemów zgłosić się do administratora pokój 401.'));
        $this->view->render('adminpanel/info');
        $this->view->render('footer');
    }

}
