<div style="width:100%; margin-top:25px;">
    <div style="width:95%; text-align:center; margin: 0 auto;">
        <?php
        if (isset($this->modules)) {
            $i=0;
            foreach ($this->modules as $info) {
                echo '<p class="bg-primary moduleList"> <span class="glyphicon glyphicon-'.$info['ico'].'" aria-hidden="true" style="margin-right:5px;"> </span> <a href="'.URL.$info['link'].'" style="color:white">'.$info['title'].'</a></p>';
                echo $i % 2 ? "<br>" : "";
                $i++;
            }   
        }
        ?>
    </div>
</div>
