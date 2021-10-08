<?php
require_once 'config/framework.php';
require_once 'config/connect.php';

$errors = [];
if(isset($_POST['inscription'])){

if(isset($_POST['mail'])){
  if(empty($_POST['mail'])){
    $errors['mail'] = 'Ce champ ne peut pas être vide';
  }
};

if(isset($_POST['password'])){
  if(empty($_POST['password'])){
    $errors['password'] = 'Ce champ ne peut pas être vide';
  }
};
if(isset($_POST['confirmation'])){
  if(empty($_POST['confirmation'])){
    $errors['confirmation'] = 'Ce champ ne peut pas être vide';
  }else if($_POST['confirmation'] !== $_POST['password']){
  $errors['confirmation'] = 'Les mots de passe de correspondent pas';
}
};
if(isset($_POST['pseudo'])){
  $errors['pseudo'] = 'Ce champ ne peut pas être vide';
}else if(strlen($_POST['pseudo']) <3 || strlen($_POST['pseudo']) >30){
  $errors['pseudo'] = 'Votre pseudo doit faire entre 3 et 30 caractère';
}
};


?>

<!doctype html>
<html lang="fr">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Inscription</title>
  </head>
  <body>    
    <form method="POST">
        <h1>Inscription</h1><br>
        <div class="form-group">
            <label for="exampleInputEmail1">Adresse email</label>
            <input type="email" class="form-control <?= isset($errors['mail']) ? 'is-invalid' : '';?>" id="exampleInputEmail1" name= "mail" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '';?> </small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '';?>" id="exampleInputPassword1" name= "password">
            <small id="passwordHelp" class="form-text text-danger"><?= isset($errors['password']) ? $errors['password'] : '';?> </small>
        </div>
        <div class="form-group">
            <label for="confirmationmp">Confirmation mot de passe</label>
            <input type="password" class="form-control <?= isset($errors['confirmation']) ? 'is-invalid' : '';?>" id="exampleInputPassword1"name = "confirmation">
            <small id="confirmationHelp" class="form-text text-danger"><?= isset($errors['confirmation']) ? $errors['confirmation'] : '';?> </small>
        </div>
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control <?= isset($errors['pseudo']) ? 'is-invalid' : '';?>" id="pseudo"name = "pseudo">
            <small id="pseudoHelp" class="form-text text-danger"><?= isset($errors['pseudo']) ? $errors['pseudo'] : '';?> </small>
        </div>
        <button type="submit" class="btn btn-primary" name="inscription">Envoyer</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    
  </body>
</html>