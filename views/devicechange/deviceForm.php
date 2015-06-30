<div class="panel panel-primary">
    <div class="panel-heading"><?=$this->form['title']?></div>
    <div class="panel-body">
        <form role="form" action="<?=URL.'devicechange/'.$this->form['link']?>" method="POST">
        <div style="width:49%; float:left;">
          <div class="form-group"><label>Nazwa urządzenia</label>
              <input type="text" name="devname" class="form-control" placeholder="Ola-PC"  value="<?=@$this->form['devname']?>"></div>
          <div class="form-group"><label>Id właściciela</label>
              <input type="text" name="user_id" class="form-control" placeholder="22"  value="<?=@$this->form['user_id']?>"></div>
          <div class="form-group"><label>MAC</label>
              <input type="text" name="mac" class="form-control" placeholder="11:22:33:44:55:66" value="<?=@$this->form['mac']?>"></div>
          <div class="form-group"><label>Opis</label>
              <input type="text" name="opis" class="form-control" placeholder="Podejrzane urządzenie"  value="<?=@$this->form['opis']?>"></div>
         </div>
         <div style="width:49%; float:right;">
          <div class="form-group"><label>Typ urządzenia</label>
              <input type="text" name="devtype" class="form-control" placeholder="Laptop" value="<?=@$this->form['devtype']?>"></div>
          <div class="form-group"><label>Stan</label>
              <input type="text" name="stan" class="form-control" placeholder="nic" value="<?=@$this->form['stan']?>"></div>
          <div class="form-group"><label>IP</label>
              <input type="text" name="ip" class="form-control" id="ipgen" placeholder="10.0.0.44" value="<?=@$this->form['ip']?>"></div>
              <div class="form-group"><label>Generuj IP</label> <button type="button" class="form-control btn-success" onclick="ipajax()">Generuj</button></div>
         </div>
         
         <div style="clear:both;"></div>
         <button type="submit" class="btn btn-default">Zapisz</button>
        </form>
    </div>
</div>