<?php

require_once 'vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';

$faker = Faker\Factory::create('fr_FR');
for ($i = 0; $i < 13; ++$i) {
    $titre = $faker->words($nb = 5, $asText = true);
    $content = $faker->paragraphs($nb = 25, $asText = true);
    $image = $faker->imageUrl($width = 30, $height = 50);
    $creation = $faker->dateTime($max = 'now', $timezone = null);
    $creation = $creation->format('Y-m-d H:i:s');
    $slug = $faker->slug;
    $auteurs = "SELECT 'id' FROM 'users' WHERE 'id' = '".$auteurs."'";
    if ($result = $mysqli->query($auteurs) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                 $sql = "INSERT INTO `projets`(`titre`, `content`, `image`, `creation`, `slug`, `auteur`) VALUES ('".$titre."','".$content."','".$image."','".$creation."','".$slug."','".$auteurs."')";
    if ($mysqli->query($sql) === true) {
        echo 'Reussite';
    } else {
        echo 'Erreur';
    }
            }
        }
   
}
