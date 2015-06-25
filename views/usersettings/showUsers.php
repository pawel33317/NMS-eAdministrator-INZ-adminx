<h2 class="sub-header">Użytkownicy</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
              <tr>
                <th><a href="<?=URL."usersettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/id/'.$this->listing['sort']?>">Id</a></th>
                <th><a href="<?=URL."usersettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/login/'.$this->listing['sort']?>">Login</a></th>
                <th><a href="<?=URL."usersettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/imie/'.$this->listing['sort']?>">Imię</a></th>
                <th><a href="<?=URL."usersettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/nazwisko/'.$this->listing['sort']?>">Nazwisko</a></th>
                <th><a href="<?=URL."usersettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/pomieszczenie/'.$this->listing['sort']?>">Pomieszczenie</a></th>
                <th><a href="<?=URL."usersettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/deviceCount/'.$this->listing['sort']?>">Ilość urządzeń</a></th>
                <th><a href="<?=URL."usersettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/datarejestracji/'.$this->listing['sort']?>">Data</a></th>
                <th><a href="<?=URL."usersettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/stan/'.$this->listing['sort']?>">Stan</a></th>
                <th><a href="<?=URL."usersettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/oplata/'.$this->listing['sort']?>">Opłata</a></th>
                <th>Operacje</th>
              </tr>
        </thead>
        <tbody>  
            <?php
                foreach ($this->users as $user) {
                    echo '<tr>
                            <td><a href="'.URL.'userchange/index/'.$user['id'].'">'.$user['id'].'</a></td>
                            <td>'.$user['login'].'</td>
                            <td>'.$user['imie'].'</td>
                            <td>'.$user['nazwisko'].'</td>
                            <td>'.$user['pomieszczenie'].'</td>
                            <td><a href="'.URL.'usersettings/devices/'.$user['id'].'">'.$user['deviceCount'].'</a></td>
                            <td>'.@date("d-m-Y", $user['datarejestracji']).'</td>
                            <td>'.$user['stan'].'</td>
                            <td>'.$user['oplata'].'</td>
                            <td><div class="btn-group btn-group-xs">';
if($user['stan'] != 1)
    echo '<button type="button" class="btn btn-success" onclick="window.location.href = \''.URL."userchange/accept/".$user['id']."/usersettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/'.$this->listing['orderBy'].'/'.$this->listing['oldsort'].'/'.$this->activePage.'\'">Aktywuj</button>';
    echo '<button type="submit" class="btn btn-primary" onclick="window.location.href = \''.URL.'userchange/index/'.$user['id'].'\'">Edytuj</button>';
if($user['oplata'] != 1)
    echo '<button type="submit" class="btn btn-success" onclick="window.location.href = \''.URL."userchange/paid/".$user['id']."/usersettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/'.$this->listing['orderBy'].'/'.$this->listing['oldsort'].'/'.$this->activePage.'\'">Opłacił</button>';
if($user['oplata'] == 1)
    echo '<button type="submit" class="btn btn-warning" onclick="window.location.href = \''.URL."userchange/unpaid/".$user['id']."/usersettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/'.$this->listing['orderBy'].'/'.$this->listing['oldsort'].'/'.$this->activePage.'\'">Nie opłacił</button>';
if($user['stan'] != 2)
    echo '<button type="submit" class="btn btn-warning" onclick="window.location.href = \''.URL."userchange/block/".$user['id']."/usersettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/'.$this->listing['orderBy'].'/'.$this->listing['oldsort'].'/'.$this->activePage.'\'">Blokuj</button>';
    echo '<button type="submit" class="btn btn-danger" onclick="window.location.href = \''.URL."userchange/delete/".$user['id']."/usersettings/".$this->showUsersCallbackLink.'/'.$this->listing['count'].'/'.$this->listing['orderBy'].'/'.$this->listing['oldsort'].'/'.$this->activePage.'\'">Usuń</button>
                        </div></td>
                      </tr>';
                }   
            ?>                    
        </tbody>
    </table>
</div>
