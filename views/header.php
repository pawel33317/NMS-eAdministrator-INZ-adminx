<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title><?= (isset($this->title)) ? $this->title : 'Network management panel'; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/dashboard.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/default.css" rel="stylesheet">
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
                    <a class="navbar-brand" href="#">System zarządzanai siecią</a>
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
              
                    