<?php

require_once 'vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';

/*$faker = Faker\Factory::create('fr_FR');
for ($i = 0; $i < 500; ++$i) {
    $titre = $faker->words($nb = 5, $asText = true);
    $content = $faker->paragraphs($nb = 25, $asText = true);
    $image = $faker->imageUrl($width = 200, $height = 200);
    $creation = $faker->dateTime($max = 'now', $timezone = null);
    $creation = $creation->format('Y-m-d H:i:s');
    $slug = $faker->slug;
    $sql = 'SELECT id FROM users ORDER BY rand()';
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $sql = "INSERT INTO `projets`(`titre`, `content`, `image`, `creation`, `slug`, `auteur`) VALUES ('".$titre."','".$content."','".$image."','".$creation."','".$slug."','".$user['id']."')";
    if ($mysqli->query($sql) === true) {
        echo 'Réussite';
    } else {
        echo 'Erreur';
    }
}
*/
