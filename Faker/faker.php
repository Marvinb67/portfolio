<?php

require_once 'vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';

$faker = Faker\Factory::create('fr_FR');

for ($i = 0; $i < 26; ++$i) {
    $faker->email;
    $password = $faker->password;
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $faker->username;
    $roles = ['ROLE_USER'];

    $sql = "INSERT INTO users (id, email, password, pseudo, roles) VALUES (id, '".$faker->email."','".$password_hash."','".$faker->username."','".json_encode($roles)."')";
    if ($mysqli->query($sql) === true) {
        redirectToRoute('projets.php');
    } else {
        echo 'Erreur';
    }
}
?>
nknk