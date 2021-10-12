<?php
require_once 'config/framework.php';
require_once 'config/connect.php';
$errors = [];
if(isset($_POST['token']) && $_POST['token'] === $_SESSION['token']){

  if(isset($_POST['email']) && !preg_match('#^[\w.-]+@[\w.-]+.[a-z]{2,6}$#i', $_POST['email'])) {
    $errors['email'] = 'Adresse mail invalide';
  }

if(empty($errors)) {
  $sql = "SELECT * FROM `users` WHERE 'email' = '".$_POST['email']."'";
  if ($result = $mysqli->query($sql)) { 
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if(password_verify($_POST['mot_de_passe'], $user['password'])){
            $_SESSION['users'] = $user;
            redirectToRoute();
            }else {
              $errors['account'] = 'Compte invalide';
            }

        }
        
    }else {
        $errors['account'] = 'Compte invalide';
    }
    
    $result->close();
    }
  }
}
  

?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Connexion</title>
  </head>
  <body>
    <form method = "POST">
      <?= (isset($errors['account']) ? $errors['account'] : '');?>
      <input type="hidden" name='token' value = "<?= minitoken()?>">
      <h1>Connexion</h1>
      <p>Remplissez les champs suivant pour vous connecter.</p>
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "jean-jacques@mail.fr">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" name = "mot_de_passe" class="form-control" id="exampleInputPassword1" placeholder = "Mot de passe">
      </div>
      <button type="submit" name = "connexion" class="btn btn-primary">Connexion</button>
      <p>Vous n'avez pas de compte? <a href="register.php">Inscrivez vous</p>.
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>