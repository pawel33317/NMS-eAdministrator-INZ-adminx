<?php
    foreach ($this->serviceStates as $service) {
        echo '<button type="button" class="btn ';
        echo ($service['state'] == 1)?'btn-success':'btn-danger';
        echo '">'.$service['service'].'</button> ';
    }   
?>
