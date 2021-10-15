<?php
require_once 'vendor/autoload.php';
require_once '../config/framework.php';
require_once '../config/connect.php';

$faker = Faker\Factory::create('fr_FR');

echo($faker->realText($maxNbChars = 20));
echo $faker->image($dir = '/tmp', $width = 640, $height = 480);


?>

