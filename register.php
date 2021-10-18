<?php
require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'header.php';
$errors = [];
if(isset($_POST['inscription'])){
  if(isset($_POST['token']) && $_POST['token'] === $_SESSION['token']){
    if(isset($_POST['mail']) && !preg_match('#^[\w.-]+@[\w.-]+.[a-z]{2,6}$#i', $_POST['mail'])) {
      $errors['mail'] = "Veuillez enter une email valide";
    }else if(empty($_POST['mail'])){
      $errors['mail'] = 'Ce champ ne peut pas être vide';
    }
    if(isset($_POST['password']) && empty($_POST['password'])){
      $errors['password'] = 'Ce champ ne peut pas être vide';
    }else {
      $password_encoder = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
    if(isset($_POST['confirmation']) && empty($_POST['confirmation'])){
      $errors['confirmation'] = 'Ce champ ne peut pas être vide';
    }else if($_POST['confirmation'] !== $_POST['password']){
      $errors['confirmation'] = 'Les mots de passe ne coresspondent pas';
    }
    if(isset($_POST['pseudo']) && empty($_POST['pseudo'])){
      $errors['pseudo'] = 'Ce champ ne peut pas être vide';
    }else if(strlen($_POST['pseudo']) <3 || strlen($_POST['pseudo']) >30) {
      $error['pseudo'] = 'Le pseudo doit faire entre 3 et 30 caractère';
    }
    $roles = json_encode(['ROLE_USER']);
    if(empty($errors)){
      $sql = "INSERT INTO `users`(`email`, `password`, `pseudo`, `roles`) VALUES ('".$_POST['mail']."','".$password_encoder."','".$_POST['pseudo']."','".$roles."')";
      if ($mysqli -> query($sql) === true){
        redirectToRoute('/login.php');
      }else{
        echo 'Erreur';
      }
    }
  }
}
?>


<form method="POST">
  <input type="hidden" name='token' value = "<?= minitoken()?>">
  <h1>Inscription</h1><br>
  <div class="form-group">
   <label for="exampleInputEmail1">Adresse email :</label>
   <input type="email" class="form-control <?= isset($errors['mail']) ? 'is-invalid' : '';?>" id="exampleInputEmail1" name= "mail" aria-describedby="emailHelp">
   <small id="emailHelp" class="form-text text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '';?> </small>
  </div>
  <div class="form-group">
   <label for="exampleInputPassword1">Mot de passe :</label>
   <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '';?>" id="exampleInputPassword1" name= "password">
   <small id="passwordHelp" class="form-text text-danger"><?= isset($errors['password']) ? $errors['password'] : '';?> </small>
  </div>
  <div class="form-group">
   <label for="confirmationmp">Confirmation mot de passe :</label>
   <input type="password" class="form-control <?= isset($errors['confirmation']) ? 'is-invalid' : '';?>" id="exampleInputPassword1"name = "confirmation">
   <small id="confirmationHelp" class="form-text text-danger"><?= isset($errors['confirmation']) ? $errors['confirmation'] : '';?> </small>
  </div>
  <div class="form-group">
   <label for="pseudo">Pseudo :</label>
   <input type="text" class="form-control <?= isset($errors['pseudo']) ? 'is-invalid' : '';?>" id="pseudo"name = "pseudo">
   <small id="pseudoHelp" class="form-text text-danger"><?= isset($errors['pseudo']) ? $errors['pseudo'] : '';?> </small>
  </div>
  <button type="submit" class="btn btn-primary" name="inscription">Envoyer</button>
</form>
