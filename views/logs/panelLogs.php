<?php
echo '<h2 class="sub-header">'.$this->title.'</h2>'
        . '<table class="table table-striped">'
        . '<thead><tr><td>Data</td><td>Tytuł</td><td>Treść</td><td>Autor</td></tr></thead><tbody>';
if (isset($this->panelLogs)) {
    foreach ($this->panelLogs as $log) {
        echo '<tr><td>'.@date("d-m-Y", $log['dateadd']).'</td><td>'.$log['title'].'</td><td>'.$log['content'].'</td><td>'.$log['author'].'</td></tr>';
    }   
}
echo '</tbody></table>';