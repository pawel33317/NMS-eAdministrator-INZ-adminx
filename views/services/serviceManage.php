<h2 class="sub-header">Zarządzanie usługami</h2>
<table class="table table-striped">
<thead>
    <tr><th><a href="">Usługa</a></th><th>Operacje</th></tr>
</thead>
<tbody>
<tr><td><a href="">firewall</a></td><td><div class="btn-group btn-group-xs">
    <button type="button" class="btn btn-success" onclick="window.location.href = '<?=URL?>services/changeService/firewall/1'">Przeładuj</button>
</div></td></tr>
<tr><td><a href="">TC - traffic control</a></td><td><div class="btn-group btn-group-xs">
    <button type="button" class="btn btn-success" onclick="window.location.href = '<?=URL?>services/changeService/tc/1'">Przeładuj</button>
</div></td></tr>
<tr><td><a href="">dhcp - konfiguracja</a></td><td><div class="btn-group btn-group-xs">
    <button type="button" class="btn btn-success" onclick="window.location.href = '<?=URL?>services/changeService/dhcp/1'">Przeładuj</button>
</div></td></tr>
<tr><td><a href="">dhcp</a></td><td><div class="btn-group btn-group-xs">
    <button type="button" class="btn btn-success" onclick="window.location.href = '<?=URL?>services/changeService/dhcp/1'">Uruchom</button>
    <button type="submit" class="btn btn-warning" onclick="window.location.href = '<?=URL?>services/changeService/dhcp/2'">Restartuj</button>
    <button type="submit" class="btn btn-danger" onclick="window.location.href = '<?=URL?>services/changeService/dhcp/3'">Wyłącz</button>
</div></td></tr>						
<tr><td><a href="">apache</a></td><td><div class="btn-group btn-group-xs">
    <button type="button" class="btn btn-success" onclick="window.location.href = '<?=URL?>services/changeService/apache/1'">Uruchom</button>
    <button type="submit" class="btn btn-warning" onclick="window.location.href = '<?=URL?>services/changeService/apache/2'">Restartuj</button>
    <button type="submit" class="btn btn-danger" onclick="window.location.href = '<?=URL?>services/changeService/apache/3'">Wyłącz</button>
</div></td></tr>						
<tr><td><a href="">mysql</a></td><td><div class="btn-group btn-group-xs">
    <button type="button" class="btn btn-success" onclick="window.location.href = '<?=URL?>services/changeService/mysql/1'">Uruchom</button>
    <button type="submit" class="btn btn-warning" onclick="window.location.href = '<?=URL?>services/changeService/mysql/2'">Restartuj</button>
    <button type="submit" class="btn btn-danger" onclick="window.location.href = '<?=URL?>services/changeService/mysql/3'">Wyłącz</button>
</div></td></tr>						
<tr><td><a href="">cron</a></td><td><div class="btn-group btn-group-xs">
    <button type="button" class="btn btn-success" onclick="window.location.href = '<?=URL?>services/changeService/cron/1'">Uruchom</button>
    <button type="submit" class="btn btn-warning" onclick="window.location.href = '<?=URL?>services/changeService/cron/2'">Restartuj</button>
    <button type="submit" class="btn btn-danger" onclick="window.location.href = '<?=URL?>services/changeService/cron/3'">Wyłącz</button>
</div></td></tr>
</tbody>
</table>
<h2 class="sub-header">Ustawienia globalne</h2>
<div class="alert alert-danger"><strong>Uwaga !!! zmiany mogą być nieodwracalne !!!</strong></div>
<button type="button" class="btn btn-danger">Resetuj opłaty internetu</button>
<button type="button" class="btn btn-danger">Blokuj możliwość rejestracji do sieci</button>
<button type="button" class="btn btn-danger">Blokuj możliwość zakładania konta</button>
<button type="button" class="btn btn-danger">Usuń starych użytkowników</button>