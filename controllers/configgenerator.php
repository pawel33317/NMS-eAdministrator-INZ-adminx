<?php

class Configgenerator extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function iptables() {
        error_reporting(E_ALL);        
	$content = "#poprzednie iptables /var/www/shscripts/firewall \n";
        $usersDevices = $this->model->getUsersDevices();
        foreach ($usersDevices as $uDevice) {
            if ($uDevice['portyonof'] != "0"){	
                $content .="\niptables -A FORWARD -p all -s ".$uDevice['ip']." -j DROP";
            }
            $ports = explode(';', $uDevice['porty']);
            foreach ($ports as $pp) {
                if ($pp) {
                    if ($uDevice['portyonof'] == "0"){
			$content .="\niptables -I FORWARD -p tcp -s ".$uDevice['ip']." --dport ".$pp." -j DROP";
			$content .="\niptables -I FORWARD -p udp -s ".$uDevice['ip']." --dport ".$pp." -j DROP";
                    }else{
			$content .="\niptables -I FORWARD -p udp -s ".$uDevice['ip']." --dport ".$pp." -j ACCEPT";
			$content .="\niptables -I FORWARD -p tcp -s ".$uDevice['ip']." --dport ".$pp." -j ACCEPT";
                    }
		}
            }	
	}
	echo $content;
        $file = 'loadiptables.txt';
        file_put_contents($file, $content);
    }
    
    function dhcp(){
        $content = 
	'#authoritative;
	#ddns-update-style none;
	subnet 10.0.0.0 netmask 255.255.248.0 {
		#option broadcast-address 10.0.7.255;
		range 10.0.4.2 10.0.7.254;
		option domain-name-servers 8.8.8.8, 212.51.207.67;
		#option domain-name "bambo";
		option routers 10.0.0.1;
			default-lease-time 300;
			max-lease-time 1200;
			#lease-file-name "/var/db/dhcpd.leases" ;
			#option subnet-mask 255.255.252.0;';		
	$i=1;
        $usersDevices = $this->model->getUsersDHCP();
	foreach ($usersDevices as $uDevice) {
            if($uDevice['stann'] != 2){
		$content .= "\n\thost a".$i." \t{\t#".$uDevice['imie']." ".$uDevice['nazwisko']." (".$uDevice['login'].") - ".$uDevice['pomieszczenie']."\n\t\t";
		$content .= "hardware ethernet ".$uDevice['mac'].";\n\t\t";
		$content .= "fixed-address ".$uDevice['ip'].";\n\t";
		$content .= "}";
		$i++;
            }
	}
	$content.="\n#range dynamic-bootp 10.0.4.1 10.0.7.255;\n}";
	echo $content;
        $file = 'load_dhcp_conf.txt';
        file_put_contents($file, $content);
    }
    
    function tc(){
        error_reporting(E_ALL);
	$content = "\n#poprzednie iptables /var/www/shscripts/firewall";
	$content .="\n#poprzednie iptables /var/www/shscripts/loadiptables.txt";
	$content .= "\n/var/www/shscripts/firewall
	\n#USTAWIENIA KART SIECIOWYCH
        tc qdisc del dev eth1 root
        tc -s qdisc ls dev eth1
        tc qdisc del dev eth0 root
        tc -s qdisc ls dev eth0
        /sbin/tc qdisc add dev eth1 root handle 1: htb
        /sbin/tc class add dev eth1 parent 1: classid 1:1 htb rate 1000mbit
        /sbin/tc qdisc add dev eth0 root handle 1: htb
        /sbin/tc class add dev eth0 parent 1: classid 1:1 htb rate 1000mbit


        #DOWNLOAD Domyslne
        /sbin/tc class add dev eth1 parent 1:1 classid 1:0x".dechex(11)." htb rate 10mbit prio 2
        /sbin/tc filter add dev eth1 parent 1:0 prio 1 protocol ip handle 0x".dechex(11)." fw flowid 1:0x".dechex(11)."
        #WWW Domyslne
        /sbin/tc class add dev eth1 parent 1:1 classid 1:0x".dechex(10)." htb rate 15mbit prio 1
        /sbin/tc filter add dev eth1 parent 1:0 prio 1 protocol ip handle 0x".dechex(10)." fw flowid 1:0x".dechex(10)."
        #UPLOAD Domyslne
        /sbin/tc class add dev eth0 parent 1:1 classid 1:0x".dechex(12)." htb rate 3mbit prio 1
        /sbin/tc filter add dev eth0 parent 1:0 prio 1 protocol ip handle 0x".dechex(12)." fw flowid 1:0x".dechex(12)."
        ";
	$markNR=100;
	$lastUserID=0;
        $usersDevices = $this->model->getUsersTC();
	foreach ($usersDevices as $uDevice) {
            if($lastUserID != $uDevice['id']){
		$content .= "\n			#!!!!!!!!NOWY USER - ".$uDevice['login']." - ".$uDevice['ip']."";
		$markNR++;
		$lastUserID=$uDevice['id'];
		if ($uDevice['downloadall'] != "0" && $uDevice['downloadall'] != "" && $uDevice['downloadall'] != " " ){
                    $markid = $markNR + 20000; //download
                    $markid = dechex($markid);$markid = '0x'.$markid;
                    $content .="\n#DOWNLOAD
                    /sbin/tc class add dev eth1 parent 1:1 classid 1:".$markid." htb rate ".$uDevice['downloadall']."mbit prio 2
                    /sbin/tc filter add dev eth1 parent 1:0 prio 1 protocol ip handle ".$markid." fw flowid 1:".$markid."
                    iptables -t mangle -I POSTROUTING -p all -d ".$uDevice['ip']." -j MARK --set-mark ".$markid."";
		}else{
                    $content .="\n#DOWNLOAD
                    iptables -t mangle -I POSTROUTING -p all -d ".$uDevice['ip']." -j MARK --set-mark 0x".dechex(11)."";
		}
		if ($uDevice['downloadhttp'] != "0" && $uDevice['downloadhttp'] != "" && $uDevice['downloadhttp'] != " " ){
                    $markid = $markNR + 10000;$markid = dechex($markid);$markid = '0x'.$markid; //www
                    $content .="\n#WWW
                    /sbin/tc class add dev eth1 parent 1:1 classid 1:".$markid." htb rate ".$uDevice['downloadhttp']."mbit prio 1
                    /sbin/tc filter add dev eth1 parent 1:0 prio 1 protocol ip handle ".$markid." fw flowid 1:".$markid."
                    iptables -t mangle -A POSTROUTING -p tcp -d ".$uDevice['ip']." --sport 80 -j MARK --set-mark ".$markid."";
		}else{
                    $content .="\n#WWW
                    iptables -t mangle -A POSTROUTING -p tcp -d ".$uDevice['ip']." --sport 80 -j MARK --set-mark 0x".dechex(10)."";
		}
		if ($uDevice['upload'] != "0" && $uDevice['upload'] != "" && $uDevice['upload']!= " " ){
                    $markid = $markNR + 30000; $markid = dechex($markid);$markid = '0x'.$markid;//upload
                    $content .="\n#UPLOAD
                    /sbin/tc class add dev eth0 parent 1:1 classid 1:".$markid." htb rate ".$uDevice['upload']."mbit prio 1
                    /sbin/tc filter add dev eth0 parent 1:0 prio 1 protocol ip handle ".$markid." fw flowid 1:".$markid."
                    iptables -i eth1 -t mangle -I PREROUTING -p all -s ".$uDevice['ip']." -j MARK --set-mark ".$markid."";
		}else{
                    $content .="\n#WWW
                    iptables -i eth1 -t mangle -I PREROUTING -p all -s ".$uDevice['ip']." -j MARK --set-mark 0x".dechex(12)."";
		}
            }
            else{
		$content .= "\n			#NOWY KOMP ".$uDevice['ip']."";
		if ($uDevice['downloadall'] != "0" && $uDevice['downloadall'] != "" && $uDevice['downloadall'] != " " ){
                    $markid = $markNR + 20000;$markid = dechex($markid); $markid = '0x'.$markid;//download
                    $content .="\n#DOWNLOAD
                    iptables -t mangle -I POSTROUTING -p all -d ".$uDevice['ip']." -j MARK --set-mark ".$markid."";
		}else{
                    $content .="\n#DOWNLOAD
                    iptables -t mangle -I POSTROUTING -p all -d ".$uDevice['ip']." -j MARK --set-mark 0x".dechex(11)."";
		}
		if ($uDevice['downloadhttp'] != "0" && $uDevice['downloadhttp'] != "" && $uDevice['downloadhttp'] != " " ){
                    $markid = $markNR + 10000;$markid = dechex($markid); $markid = '0x'.$markid;//www
                    $content .="\n#WWW
                    iptables -t mangle -A POSTROUTING -p tcp -d ".$uDevice['ip']." --sport 80 -j MARK --set-mark ".$markid."";
		}else{
                    $content .="\n#WWW
                    iptables -t mangle -A POSTROUTING -p tcp -d ".$uDevice['ip']." --sport 80 -j MARK --set-mark 0x".dechex(10)."";
		}
		if ($uDevice['upload'] != "0" && $uDevice['upload'] != "" && $uDevice['upload']!= " " ){
                    $markid = $markNR + 30000;$markid = dechex($markid); $markid = '0x'.$markid;//upload
                    $content .="\n#UPLOAD
                    iptables -i eth1 -t mangle -I PREROUTING -p all -s ".$uDevice['ip']." -j MARK --set-mark ".$markid."";
		}else{
                    $content .="\n#WWW
                    iptables -i eth1 -t mangle -I PREROUTING -p all -s ".$uDevice['ip']." -j MARK --set-mark 0x".dechex(12)."";
		}
            }
	}
        $content .=  "\niptables -t mangle -I POSTROUTING -p all -d 10.0.0.0/22 -j MARK --set-mark 0x".dechex(11)."";
        $content .=  "\niptables -t mangle -I POSTROUTING -p tcp -d 10.0.0.0/22 --dport 80 -j MARK --set-mark 0x".dechex(10)."";
        $content .=  "\niptables -i eth1 -t mangle -I PREROUTING -p all -s 10.0.0.0/22 -j MARK --set-mark 0x".dechex(12)."";
	echo $content;
        $file = 'load_tc.txt';
        file_put_contents($file, $content);
    }
    
    function index() {
    }

}
