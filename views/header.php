<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title><?= (isset($this->title)) ? $this->title : 'Network management panel'; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/dashboard.css" rel="stylesheet">
        <script src="<?php echo URL; ?>public/jquery.js"></script>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script>
            function submitForm(action, op) {
                document.getElementById(op).action = action;
                document.getElementById(op).submit();
            }
        </script>
        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
            }
        }
        ?>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Panel zarządzania urządzeniami i użytkownikami</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Ustawienia</a></li>
                        <li><a href="?operation=lout">Wyloguj</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" action="index.php" method="GET">
                        <input type="text" class="form-control" name="search" placeholder="Szukaj...">
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li<?php if (count($_GET) < 1) echo ' class="active"'; ?>><a href="index.php">Statystyki i ustawienia</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li<?php if (@$_GET['where'] == "users") echo ' class="active"'; ?>><a href="?where=users">Użytkownicy</a></li>
                        <li<?php if (@$_GET['where'] == "devices") echo ' class="active"'; ?>><a href="?where=devices">Urządzenia</a></li>
                        <li<?php if (@$_GET['where'] == "paid") echo ' class="active"'; ?>><a href="?where=paid">Opłaceni</a></li>
                        <li<?php if (@$_GET['where'] == "nopaid") echo ' class="active"'; ?>><a href="?where=nopaid">Nieopłaceni</a></li>
                        <li<?php if (@$_GET['where'] == "blocked") echo ' class="active"'; ?>><a href="?where=blocked">Zablokowani</a></li>
                        <li<?php if (@$_GET['where'] == "noaccepted") echo ' class="active"'; ?>><a href="?where=noaccepted">Niezaakceptowani</a></li>
                        <li<?php if (@$_GET['user'] == "adduser") echo ' class="active"'; ?>><a href="index.php?user=adduser">Dodaj nowego użytkownika</a></li>
                        <li<?php if (@$_GET['device'] == "adddevice") echo ' class="active"'; ?>><a href="index.php?device=adddevice">Dodaj nowe urządzenie</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li<?php if (@$_GET['where'] == "p1") echo ' class="active"'; ?>><a href="?where=p1">Piętro - 1</a></li>
                        <li<?php if (@$_GET['where'] == "p2") echo ' class="active"'; ?>><a href="?where=p2">Piętro - 2</a></li>
                        <li<?php if (@$_GET['where'] == "p3") echo ' class="active"'; ?>><a href="?where=p3">Piętro - 3</a></li>
                        <li<?php if (@$_GET['where'] == "p4") echo ' class="active"'; ?>><a href="?where=p4">Piętro - 4</a></li>
                        <li<?php if (@$_GET['where'] == "p5") echo ' class="active"'; ?>><a href="?where=p5">Piętro - 5</a></li>
                        <li<?php if (@$_GET['where'] == "p6") echo ' class="active"'; ?>><a href="?where=p6">Piętro - 6</a></li>
                        <li<?php if (@$_GET['where'] == "p7") echo ' class="active"'; ?>><a href="?where=p7">Piętro - 7</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">