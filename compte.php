<?php
require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'header.php';
$title = 'Mon compte';
$errors = [];
if (isset($_POST['insription_email'])) {
    if (isset($_POST['token_mail']) && $_POST['token_mail'] === $_SESSION['token_mail']) {
        if (isset($_POST['email']) && !preg_match('#^[\w.-]+@[\w.-]+.[a-z]{2,6}$#i', $_POST['email'])) {
            $errors['email'] = 'Veuillez entrer une email valide';
        } elseif (empty($_POST['email'])) {
            $errors['email'] = 'Ce champ ne peut pas être vide';
        }
        if (empty($errors)) {
            $sql = "UPDATE `users` SET email ='".$_POST['email']."' WHERE id = '".$_SESSION['users']['id']."'";
            if ($mysqli->query($sql) === true) {
                redirectToRoute('/login.php');
            } else {
                echo 'Erreur';
            }
        }
    }
}
if (isset($_POST['inscription_password'])) {
    if (isset($_POST['token_password']) && $_POST['token_password'] === $_SESSION['token_password']) {
        if (isset($_POST['password']) && empty($_POST['password'])) {
            $errors['password'] = 'Ce champ ne peut pas être vide';
        } elseif ($_POST['confirmation'] !== $_POST['password']) {
            $errors['Confirmation'] = 'Les mots de passe ne correspondent pas';
        } else {
            $password_encoder = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        if (empty($errors)) {
            $sql = "UPDATE `users` SET password='".$password_encoder."' WHERE id = '".$_SESSION['users']['id']."'";
            if ($mysqli->query($sql) === true) {
                redirectToRoute('/login.php');
            } else {
                echo 'Erreur';
            }
        }
    }
}
if (isset($_POST['inscription_pseudo'])) {
    if (isset($_POST['token_pseudo']) && $_POST['token_pseudo'] === $_SESSION['token_pseudo']) {
        if (isset($_POST['pseudo']) && empty($_POST['pseudo'])) {
            $errors['pseudo'] = 'Ce champ ne peut pas être vide';
        } elseif (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 30) {
            $errors['pseudo'] = 'Le pseudo doit faire entre 3 et 30 carctère';
        }
        if (empty($errors)) {
            $sql = $sql = "UPDATE `users` SET pseudo='".$_POST['pseudo']."' WHERE id = '".$_SESSION['users']['id']."'";
            if ($mysqli->query($sql) === true) {
                redirectToRoute('/login.php');
            } else {
                echo 'Erreur';
            }
        }
    }
}
if (isset($_POST['Supprimer'])) {
    if (isset($_POST['token_delete']) && $_POST['token_delete'] === $_SESSION['token_delete']) {
        if (empty($errors)) {
            $sql = "DELETE FROM `users` WHERE id = '".$_SESSION['users']['id']."'";
            if ($mysqli->query($sql) === true) {
                redirectToRoute('/login.php');
            } else {
                echo 'Erreur';
            }
        }
    }
}
if (isset($_POST['deco'])) {
    if (isset($_POST['token_deco']) && $_POST['token_deco'] === $_SESSION['token_deco']) {
        if (empty($errors)) {
            $sql = "DELETE FROM `users` WHERE id = '".$_SESSION['users']['id']."'";
            if ($mysqli->query($sql) === true) {
                redirectToRoute('/login.php');
            } else {
                echo 'Erreur';
            }
        }
    }
}
?>

<form method="POST">
    <input type="hidden" name='token_mail' value="<?= minitoken('token_mail'); ?>">
    <h1>Mon Compte</h1><br>
    <h4>Modifier Email</h4><br>
    <div class="form-group">
        <label for="exampleInputEmail1">Modifier adresse email :</label>
        <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : ''; ?>"
            id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-danger"><?= isset($errors['email']) ? $errors['email'] : ''; ?>
        </small>
        <button type="submit" class="btn btn-primary" name="inscription_email">Modifier</button>
    </div>
</form>
<form method="POST">
    <input type="hidden" name='token_password' value="<?= minitoken('token_password'); ?>">
    <h4>Modifier Mot de passe</h4><br>
    <div class="form-group">
        <label for="exampleInputPassword1"> Nouveau mot de passe :</label>
        <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : ''; ?>"
            id="exampleInputEmail1" name="password" aria-describedby="emailHelp">
        <small id="emailHelp"
            class="form-text text-danger"><?= isset($errors['password']) ? $errors['password'] : ''; ?>
        </small>
        <label for="exampleInputConfirmation1"> Confirmer le nouveau mot de passe :</label>
        <input type="password" class="form-control <?= isset($errors['confirmation']) ? 'is-invalid' : ''; ?>"
            id="exampleInputEmail1" name="confirmation" aria-describedby="emailHelp">
        <small id="emailHelp"
            class="form-text text-danger"><?= isset($errors['confirmation']) ? $errors['confirmation'] : ''; ?> </small>
        <button type="submit" class="btn btn-primary" name="inscription_password">Modifier</button>
    </div>
</form>
<form method="POST">
    <input type="hidden" name='token_pseudo' value="<?= minitoken('token_pseudo'); ?>">
    <h4>Modifier pseudo</h4><br>
    <div class="form-group">
        <label for="exampleInputPseudo1">Modifier pseudo :</label>
        <input type="text" class="form-control <?= isset($errors['pseudo']) ? 'is-invalid' : ''; ?>"
            id="exampleInputEmail1" name="pseudo" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-danger"><?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        </small>
        <button type="submit" class="btn btn-primary" name="inscription_pseudo">Modifier</button>
    </div>
</form><br>
<form method='POST'>
    <input type="hidden" name='token_delete' value="<?= minitoken('token_delete'); ?>">
    <button onclick="return confirm('Voulez vous vraiment supprimer votre compte ?')" class="btn btn-danger"
        name='Supprimer'>Supprimer le compte</button>
    </from>