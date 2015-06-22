  <div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li><a href="<?=URL?>"><span class="glyphicon glyphicon-list" aria-hidden="true" style="margin-right:5px;"> </span>Moduły systemu</a></li>
    </ul><hr class="style-two">
    <?php
    if (!empty($this->leftMenu)) 
     echo '<ul class="nav nav-sidebar">';
        
        if (isset($this->leftMenu)) {
            foreach ($this->leftMenu as $link) {
                echo '<li ><a href="'.URL.$link['link'].'"><span class="glyphicon glyphicon-'.$link['ico'].'" aria-hidden="true" style="margin-right:5px;"> </span>'.$link['title'].'</a></li>';
            }
        }
    if (!empty($this->leftMenu)) 
    echo '</ul><hr class="style-two">';
    ?>
    <ul class="nav nav-sidebar">
        <li><a href="<?php echo URL.'stats'; ?>"><span class="glyphicon glyphicon-stats" aria-hidden="true" style="margin-right:5px;"> </span>Centrum statystyk</a></li>
        <li><a href="<?php echo URL.'usersettings'; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true" style="margin-right:5px;"> </span>Centrum zarządzania użytkownikami</a></li>
        <li><a href="<?php echo URL.'logs'; ?>"><span class="glyphicon glyphicon-book" aria-hidden="true" style="margin-right:5px;"> </span>Centrum logów</a></li>
        <li><a href="<?php echo URL.'services'; ?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" style="margin-right:5px;"> </span>Centrum usług</a></li>
        <li><a href="<?php echo URL.'systemsettings'; ?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true" style="margin-right:5px;"> </span>Centrum ustawień systemowych</a></li>
    </ul>
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">