<?php
require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'header.php';
$errors = [];
if(isset($_POST['connexion'])) {
  if(isset($_POST['token']) && $_POST['token'] === $_SESSION['token']){
    if(isset($_POST['email']) && !preg_match('#^[\w.-]+@[\w.-]+.[a-z]{2,6}$#i', $_POST['email'])){
      $errors['email'] = "Adresse invalide";
    }
    if(empty($errors)){
      $sql = "SELECT * FROM `users` WHERE email = '".$_POST['email']."'";
      if($result = $mysqli->query($sql)) {
        if($result -> num_rows > 0) {
          while($user = $result -> fetch_assoc()) {
            if(password_verify($_POST['mot_de_passe'], $user['password'])) {
              $_SESSION['users'] = $user;
              redirectToRoute('/compte.php');
            }else {
              $errors['account'] ='Erreur';
            }
          }
        }else {
          $errors['account'] = 'compte invalide';
        }
        $result->close();
      }
    }
  }
}
?>
<?= (isset($errors['account']) ? $errors['account'] : '');?>


<form method = "POST">
  <input type="hidden" name='token' value = "<?= minitoken()?>">
  <h1>Connexion</h1>
  <p>Remplissez les champs suivant pour vous connecter.</p>
  <div class="form-group">
   <label for="exampleInputEmail1">Email</label>
   <input type="email" name = "email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '';?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "jean-jacques@mail.fr">
   <small id="emailHelp" class="form-text text-danger"><?= isset($errors['email']) ? $errors['email'] : '';?></small>
  </div>
  <div class="form-group">
   <label for="exampleInputPassword1">Mot de passe</label>
   <input type="password" name = "mot_de_passe" class="form-control" id="exampleInputPassword1" placeholder = "Mot de passe">
  </div>
  <button type="submit" name = "connexion" class="btn btn-primary">Connexion</button>
  <p>Vous n'avez pas de compte? <a href="register.php">Inscrivez vous</p>.
</form>