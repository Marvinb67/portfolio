<?php
require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'header.php';
$title = '<title>Contact</title>';
?>

<form>
    <div class="form-group">
        <label for="exampleInputPassword1">Nom</label>
        <input type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">A propos</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Message</label>
        <input type="text-area" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>