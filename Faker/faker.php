<?php
require_once 'vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';
$faker = Faker\Factory::create('fr_FR');
    for ($i = 0; $i < 10; $i++) {
        $email = $faker->email;
        $password = $faker->password;
        $username = $faker->username;
        $roles = ['ROLE_USER'];
        $sql = "INSERT INTO users (email, password, pseudo, roles) VALUES ('".$email."','".$password."','".$username."','".json_encode($roles)."')";
        if ($mysqli -> query($sql) === true) {
            redirectToRoute();
          }else {
            echo 'Erreur';
          }
    }
?>
