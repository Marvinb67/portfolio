<?php
require_once 'config/framework.php';
require_once 'config/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mini Portfolio</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="font/css/fontello.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="navbar">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="index.php"><img src="img/user.jpg" alt=""></a>
      <ul class="nav nav-collapse pull-right">
        <li><a href="register.php" class="active"><i class="icon-user"></i> Inscription</a></li>
        <li><a href="login.php"><i class="icon-trophy"></i> Connexion</a></li>
        <li><a href="compte.php"><i class="icon-picture"></i> Compte</a></li>
        <li><a href="logout.php"><i class="icon-doc-text"></i>Déconnexion</a></li>
      </ul>
      <div class="nav-collapse collapse"></div>
    </div>
  </div>
</div>