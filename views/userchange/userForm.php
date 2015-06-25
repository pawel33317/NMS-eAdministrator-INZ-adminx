<div class="panel panel-primary">
    <div class="panel-heading"><?=$this->form['title']?></div>
    <div class="panel-body">
        <form role="form" action="<?=URL.'userchange/'.$this->form['link']?>" method="POST">
        <div style="width:49%; float:left;">
          <div class="form-group"><label>Login</label>
              <input type="text" name="login" class="form-control" placeholder="nick"  value="<?=@$this->form['login']?>"></div>
          <div class="form-group"><label>Imię</label>
              <input type="text" name="imie" class="form-control" placeholder="Jan"  value="<?=@$this->form['imie']?>"></div>
          <div class="form-group"><label>Pomieszczenie</label>
              <input type="text" name="pomieszczenie" class="form-control" placeholder="123" value="<?=@$this->form['pomieszczenie']?>"></div>
          <div class="form-group"><label>Wydzial</label>
              <input type="text" name="wydzial" class="form-control" placeholder="weeia"  value="<?=@$this->form['wydzial']?>"></div>
          <div class="form-group"><label>Stan</label>
              <input type="text" name="stan" class="form-control" placeholder="0 nowy ,1 zaakceptowany, 2 blokowany"  value="<?=@$this->form['stan']?>"></div>
          <div class="form-group"><label>Opłata</label>
              <input type="text" name="oplata" class="form-control" placeholder="0 brak, 1 jest"  value="<?=@$this->form['oplata']?>"></div>
          <div class="form-group"><label>Data ważności konta</label>
              <input type="text" name="datawaznoscikonta" class="form-control" placeholder="UNIX time"  value="<?=@$this->form['datawaznoscikonta']?>"></div>
          <div class="form-group"><label>Porty otwarte / zamknięte</label>
              <input type="text" name="portyonof" class="form-control" placeholder="0 zezwalaj tylko na wymienione ,1 blokuj wszystkie poza wymienionymi"  
                     value="<?=@$this->form['portyonof']?>"></div>
         </div>
         <div style="width:49%; float:right;">
          <div class="form-group"><label>Hasło</label>
              <input type="password" name="haslo" class="form-control" placeholder="*****"></div>
          <div class="form-group"><label>Powtórz hasło</label>
              <input type="password" name="haslo2" class="form-control" placeholder="*****"></div>
          <div class="form-group"><label>Nazwisko</label>
              <input type="text" name="nazwisko" class="form-control" placeholder="Kowalski" value="<?=@$this->form['nazwisko']?>"></div>
          <div class="form-group"><label>Kierunek</label>
              <input type="text" name="kierunek" class="form-control" placeholder="Ekonomia" value="<?=@$this->form['kierunek']?>"></div>
          <div class="form-group"><label>Download http</label>
              <input type="text" name="downloadhttp" class="form-control" placeholder="20480" value="<?=@$this->form['downloadhttp']?>"></div>
          <div class="form-group"><label>Download All</label>
              <input type="text" name="downloadall" class="form-control" placeholder="10240" value="<?=@$this->form['downloadall']?>"></div>
          <div class="form-group"><label>Upload</label>
              <input type="text" name="upload" class="form-control" placeholder="4096" value="<?=@$this->form['upload']?>"></div>
          <div class="form-group"><label>Porty blokowane / otwarte</label>
              <input type="text" name="porty" class="form-control" placeholder="88;53;443;21;22;23" value="<?=@$this->form['porty']?>"></div>
         </div>
         <div style="clear:both;"></div>
         <button type="submit" class="btn btn-default">Zapisz</button>
        </form>
    </div>
</div>