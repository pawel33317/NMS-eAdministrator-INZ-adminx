<nav>
  <ul class="pagination">
    <li>
      <a href="<?=URL."devicesettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/'.$this->listing['orderBy'].'/'.$this->listing['oldsort'].'/0'?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
<?php
    foreach ($this->pages as $value) {
        echo '<li'; 
        if ($value['active'])
            echo ' class="active"';
        echo '><a href="'.URL."devicesettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/'.$this->listing['orderBy'].'/'.$this->listing['oldsort'].'/'.$value['start'].
                '">'.$value['index'].'</a></li>';
}
?>
    <li>
      <a href="<?php if(count($this->pages) > 0) echo URL."devicesettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/'.
        $this->listing['orderBy'].'/'.$this->listing['oldsort'].'/'.$this->pages[count($this->pages)-1]['start'];?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>