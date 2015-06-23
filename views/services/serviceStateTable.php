<h2 class="sub-header">Monitorowane usługi</h2>
<div style="width:100%; margin-top:5px;">
    <p class="bg-primary" style="border-radius: 5px; padding:10px; width:100%;  display: inline-block;">zielony - działają prawidłowo</p>
</div>
<!--<div class="alert alert-info"><strong>Monitorowane usługi (5)</strong> (zielony - działają ok)</div>-->
<div class="panel panel-default">
    <div class="panel-body">
        <?php
            foreach ($this->serviceStates as $service) {
                echo '<button type="button" class="btn ';
                echo ($service['state'] == 1)?'btn-success':'btn-danger';
                echo '">'.$service['service'].'</button> ';
            }   
        ?>
    </div></div>
    