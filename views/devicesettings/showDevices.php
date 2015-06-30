
<h2 class="sub-header">Urządzenia (<?=$this->allDevice?>)</h2>
<div class="table-responsive">
        <script>
        function deleteConfirm(deleteLink){
            var r = confirm("Czy na pewno chcesz usunąć to urządzenie ?");
            if (r == true) {
                window.location.href = deleteLink;
            } else {
                x = "";
            }
        }
    </script>
    <table class="table table-striped">
        <thead>
              <tr>
                <th><a href="<?=URL."devicesettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/d.id/'.$this->listing['sort']?>">Id</a></th>
                <th><a href="<?=URL."devicesettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/login/'.$this->listing['sort']?>">Login</a></th>
                <th><a href="<?=URL."devicesettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/imie/'.$this->listing['sort']?>">Imię</a></th>
                <th><a href="<?=URL."devicesettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/nazwisko/'.$this->listing['sort']?>">Nazwisko</a></th>
                <th><a href="<?=URL."devicesettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/dateadd/'.$this->listing['sort']?>">Data dodania</a></th>
                <th><a href="<?=URL."devicesettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/mac/'.$this->listing['sort']?>">MAC</a></th>
                <th><a href="<?=URL."devicesettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/ip/'.$this->listing['sort']?>">IP</a></th>
                <th><a href="<?=URL."devicesettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/devtype/'.$this->listing['sort']?>">Typ urządzenia</a></th>
                <th><a href="<?=URL."devicesettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/devname/'.$this->listing['sort']?>">Nazwa</a></th>
                <th><a href="<?=URL."devicesettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/opis/'.$this->listing['sort']?>">Opis</a></th>
                <th>Operacje</th>
              </tr>
        </thead>
        <tbody>  
            <?php
                foreach ($this->device as $device) {
                    echo '<tr>
                            <td><a href="'.URL.'devicechange/index/'.$device['devid'].'">'.$device['devid'].'</a></td>
                            <td><a href="'.URL.'userchange/index/'.$device['userid'].'">'.$device['login'].'</a></td>
                            <td>'.$device['imie'].'</td>
                            <td>'.$device['nazwisko'].'</td>
                            <td>'.@date("d-m-Y", $device['dateadd']).'</td>
                            <td>'.$device['mac'].'</td>
                            <td>'.$device['ip'].'</td>
                            <td>'.$device['devtype'].'</td>
                            <td>'.$device['devname'].'</td>
                            <td>'.$device['opis'].'</td>
                            <td><div class="btn-group btn-group-xs">';
    echo '<button type="submit" class="btn btn-primary" onclick="window.location.href = \''.URL.'devicechange/index/'.$device['devid'].'\'">Edytuj</button>
        <button type="submit" class="btn btn-danger" onclick="deleteConfirm(\''.URL.'devicechange/delete/'.$device['devid']."/devicesettings/".
            $this->showUsersCallbackLink.'/'.$this->listing['count'].'/'.$this->listing['orderBy'].'/'.$this->listing['oldsort'].'/'.$this->activePage.'\')">Usuń</button>

                        </div></td>
                      </tr>';
                }   
            ?>                    
        </tbody>
    </table>
</div>
