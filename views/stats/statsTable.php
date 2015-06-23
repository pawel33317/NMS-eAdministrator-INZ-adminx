<div class="panel panel-primary">
    <div class="panel-heading">
       Centrum statystyk
    </div> 
    <div class="panel-footer">
   
        <div class="list-group" style="width:49%; float:left;">
            <a href="#" class="list-group-item"><span class="badge"><?=$this->stats['wszyscy_userzy']?></span>Liczba wszystkich użytkowników</a>
            <a href="#" class="list-group-item"><span class="badge"><?=$this->stats['wszystkie_urzadzenia']?></span>Liczba wszystkich urządzenień</a>
            <a href="#" class="list-group-item"><span class="badge"><?=$this->stats['user_max_urzadzen_ilosc']?></span>Użytkownik z największą liczbą urządzeń: <?=$this->stats['user_max_urzadzen_login']?></a>
            <a href="#" class="list-group-item"><span class="badge"><?=$this->stats['srednia_luczba_urzadzeni_na_usera']?></span>Średnia liczba urządzeń na użytkownika</a>
            <a href="#" class="list-group-item"><span class="badge"><?='20480'?></span>Domyślna prędkość http</a>
            <a href="#" class="list-group-item"><span class="badge"><?='10240'?></span>Domyślna prędkość download</a>
            <a href="#" class="list-group-item"><span class="badge"><?='4096'?></span>Domyślna prędkość upload</a>
        </div>
        <div class="list-group list-group-success" style="width:49%; float:right;">
            <a href="#" class="list-group-item"><span class="badge"><?=$this->stats['oplaceni']?></span>Opłaconych</a>
            <a href="#" class="list-group-item"><span class="badge"><?=$this->stats['zablokowani']?></span>Zablokowanych</a>
            <a href="#" class="list-group-item"><span class="badge"><?=$this->stats['nieaktywni']?></span>Nieaktywowanych</a>
            <a href="#" class="list-group-item"><span class="badge"><?=$this->stats['s24hu']?></span>Zarejestrowanych urządzeń w ciągu 48h</a>
            <a href="#" class="list-group-item"><span class="badge"><?=$this->stats['s24h']?></span>Zarejestrowanych użytkowników w ciągu 48h</a>
            <a href="#" class="list-group-item"><span class="badge"><?=$this->stats['lastweeku']?></span>Zarejestrowanych urządzeń w ciągu ostatniego tygodnia</a>
            <a href="#" class="list-group-item"><span class="badge"><?=$this->stats['lastweek']?></span>Zarejestrowanych użytkowników ostatniego tygodnia</a>
        </div>
    <div style="clear:both;"></div>	
    </div>
</div>
<!--<div style="width:100%; margin-top:25px;">
    <p class="bg-primary" style="border-radius: 5px; padding:10px; width:100%;  display: inline-block;"><strong>Monitorowane usługi (5)</strong> (zielony - działają ok)</p>
</div>-->
<div class="alert alert-info"><strong>Monitorowane usługi (5)</strong> (zielony - działają ok)</div>
        <?php
            foreach ($this->serviceStates as $service) {
                echo '<button type="button" class="btn ';
                echo ($service['state'] == 1)?'btn-success':'btn-danger';
                echo '">'.$service['service'].'</button> ';
            }   
        ?>

