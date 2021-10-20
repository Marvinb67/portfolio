<?php

require_once 'vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';
require_once '../header.php';

/*$faker = Faker\Factory::create('fr_FR');
    for ($i = 0; $i < 376; ++$i) {
        $faker->email;
        $password = $faker->password;
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $faker->username;
        $roles = ['ROLE_USER'];
        dump($i);

        $sql = "INSERT INTO users (email, password, pseudo, roles) VALUES ('".$faker->email."','".$password_hash."','".$faker->username."','".json_encode($roles)."')";
        if ($mysqli->query($sql) === true) {
            echo $faker->email, $password_hash, $faker->username, json_encode($roles);
        } else {
            echo 'Erreur';
        }
    }
*/
