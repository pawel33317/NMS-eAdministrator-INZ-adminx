<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?= (isset($this->title)) ? $this->title : 'Network management panel'; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/signin.css" rel="stylesheet">
        <script src="<?php echo URL; ?>public/jquery.js"></script>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">