<?php
if (isset($this->panelLogs)) {
    foreach ($this->panelLogs as $log) {
        echo '<tr><td>'.@date("d-m-Y H:i:s", $log['dateadd']).'</td><td>'.$log['title'].'</td><td>'.$log['content'].'</td><td>'.$log['author'].'</td></tr>';
    }   
}   
?>
