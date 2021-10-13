<?php
require_once 'config/framework.php';
require_once 'config/connect.php';

$errors = [];
if(isset($_POST['inscription_mail'])){

  if(isset($_POST['token_mail']) && $_POST['token_mail'] === $_SESSION['token_mail']){

  

if(isset($_POST['mail']) &&! preg_match('#^[\w.-]+@[\w.-]+.[a-z]{2,6}$#i', $_POST['mail'])){
    $errors['mail'] = 'Veuillez entrer une email valide';
  }else if(empty($_POST['mail'])){
    $errors['mail'] = 'Ce champ ne peut pas être vide';
  }

  if (empty($errors)){
    $sql = $sql = "UPDATE `users` SET (`email`='".$_POST['mail']."' WHERE id = '".$_SESSION['users']."')" ;

    if ($mysqli -> query($sql) === true) {
      redirectToRoute();
    }else {
      echo 'Erreur';
     }
    }
  }
}

 




?>


<!doctype html>
<html lang="fr">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Mon Compte</title>
  </head>
  <body>    
    <form method="POST">
        <input type="hidden" name='token_mail' value = "<?= minitoken()?>">
        <h1>Mon Compte</h1><br>
        <h4>Modifier Email</h4><br>
        <div class="form-group">
            <label for="exampleInputEmail1">Modifier adresse email :</label>
            <input type="email" class="form-control <?= isset($errors['mail']) ? 'is-invalid' : '';?>" id="exampleInputEmail1" name= "mail" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '';?> </small>
            <button type="submit" class="btn btn-warning" name="inscription_mail">Modifier</button>
        </div>
     </form>
     <form method="POST">
        <input type="hidden" name='token_password' value = "<?= minitoken()?>">
        <h4>Modifier Mot de passe</h4><br>
        <div class="form-group">
            <label for="exampleInputPassword1"> Nouveau mot de passe :</label>
            <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '';?>" id="exampleInputEmail1" name= "password" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-danger"><?= isset($errors['password']) ? $errors['password'] : '';?> </small>
            <label for="exampleInputConfirmation1"> Confirmer le nouveau mot de passe :</label>
            <input type="password" class="form-control <?= isset($errors['confirmation']) ? 'is-invalid' : '';?>" id="exampleInputEmail1" name= "confirmation" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-danger"><?= isset($errors['confirmation']) ? $errors['confirmation'] : '';?> </small>
            <button type="submit" class="btn btn-warning" name="inscription">Modifier</button>
        </div>
     </form>
     <form method="POST">
        <input type="hidden" name='token_pseudo' value = "<?= minitoken()?>">
        <h4>Modifier pseudo</h4><br>
        <div class="form-group">
            <label for="exampleInputPseudo1">Modifier pseudo :</label>
            <input type="text" class="form-control <?= isset($errors['pseudo']) ? 'is-invalid' : '';?>" id="exampleInputEmail1" name= "pseudo" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-danger"><?= isset($errors['pseudo']) ? $errors['pseudo'] : '';?> </small>
            <button type="submit" class="btn btn-warning" name="inscription">Modifier</button>
        </div>
     </form><br>

        
        <button onclick="return confirm('Are you sure you want to delete your account')" class = "btn btn-danger">Supprimer le compte</button>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    
  </body>
</html>