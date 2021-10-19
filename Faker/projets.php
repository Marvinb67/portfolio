<?php

require_once 'vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';

$faker = Faker\Factory::create('fr_FR');
for ($i = 0; $i < 13; ++$i) {
    $titre = ($faker->words($nb = 5, $asText = true));
    $content = ($faker->paragraphs($nb = 25, $asText = true));
    $image = $faker->imageUrl($width = 30, $height = 50);
    $creation = ($faker->dateTime($max = 'now', $timezone = null));
    $slug = ($faker->slug);
}

$auteurs = "SELECT 'id' from 'users' where 'auteur' = 'id'";
$sql = "INSERT INTO `projets`(`titre`, `content`, `image`, `creation`, `slug`, `auteur`) VALUES ('".$titre."','".$content."','".$image."','".$creation."','".$slug."','".$auteurs."')";
if ($mysqli->query($sql) === true) {
    redirectToRoute();
} else {
    echo 'Erreur';
}
