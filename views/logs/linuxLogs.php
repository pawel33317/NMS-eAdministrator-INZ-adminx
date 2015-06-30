<?php
echo '<h2 class="sub-header">'.$this->title.'</h2>';
if (isset($this->linuxLogs)) {
    foreach ($this->linuxLogs as $log) {
        echo '<div class="panel panel-default">
            <div class="panel-heading">'.$log['title'].'</div>
            <div class="panel-body"><pre  id="log'.$log['id'].'">'.$log['content'].'</pre></div>
           </div>';
    }   
}

/*
<div class="panel panel-default">
<div class="panel-heading">Log główny panelu</div>
<div class="panel-body">
'.$file6.'
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">last -5</div>
<div class="panel-body">
'.$file1.'
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">tail -5 dmesg</div>
<div class="panel-body">
'.$file2.'
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">tail -5 /var/log/cron</div>
<div class="panel-body">
'.$file3.'
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">tail -5 /var/log/messages</div>
<div class="panel-body">
'.$file4.@$message.'
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">tail -10 /var/lib/dhcpd/dhcpd.leases</div>
<div class="panel-body">
'.$file5.'
</div>
</div>
<h2 class="sub-header">Logi</h2>
<a href="../php_create_config/load_dhcp_conf.txt">dhcp</a> |
<a href="../shscripts/firewall">iptables</a> |
<a href="../php_create_config/loadiptables.txt">iptables port</a> |
<a href="../php_create_config/load_tc.txt">TC</a> |
<a href="../shscripts/log.log">log</a>

*/