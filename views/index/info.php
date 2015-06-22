<?php

if (isset($this->info)) {
    foreach ($this->info as $info) {
        echo '<div style="width:100%; text-align:center; margin-top:25px;">'
                . '<div style="width:95%; margin: 0 auto;">'
                    .' <p class="bg-'.$info['type'].'" style="margin:10px; padding:10px;width:100%; max-width:820px; display: inline-block;">'
                        . '<strong>' . @$info['boldtext'] . '</strong>' . @$info['text'] . '</p>'
            . '</div></div>';
    }
    
    
}
/*
  if ($typ == 1)
  $typ = "alert-success";
  if ($typ == 2)
  $typ = "alert-info";
  if ($typ == 3)
  $typ = "alert-warning";
  if ($typ == 4)
  $typ = "alert-danger";

 */
?>


