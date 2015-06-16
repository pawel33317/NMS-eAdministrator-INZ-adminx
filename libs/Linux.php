<?php

class Linux {

    public static $log_DIR = '/var/www/log_to_php_panel/';
    public static $service_state_DIR = '/var/www/service_state/';
    public static $shScripts = '/var/www/shscripts/';
    public static $fileToReload = '/var/www/file_to_check_to_reload/';

    public function initLog() {
       /* $this->_log_panelLog = self::$log_DIR . 'panel-log.stan';
        $this->_log_last5 = self::$log_DIR . 'last-5.stan';
        $this->_log_tail5dmesg = self::$log_DIR . 'tail-5dmesg.stan';
        $this->_log_5varLogCron = self::$log_DIR . 'tail-5var-log-cron.stan';
        $this->_log_tail5varLogMessages = self::$log_DIR . 'tail-5var-log-messages.stan';
        $this->_log_tail10varLibDhcpdDhcpdLeases = self::$log_DIR . 'tail-10var-lib-dhcpd-dhcpd.leases.stan';*/
        
        $this->_log_panelLog = 'a.txt';
        $this->_log_last5 = 'a.txt';
        $this->_log_tail5dmesg = 'a.txt';
        $this->_log_5varLogCron = 'a.txt';
        $this->_log_tail5varLogMessages = 'a.txt';
        $this->_log_tail10varLibDhcpdDhcpdLeases = 'a.txt';
    }

    public static function newDevice() {
        $path = Linux::$fileToReload;
        $linuxOperation = `echo 1 > $path'newusr.s'`;
    }

}
