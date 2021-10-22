<?php

require_once 'Faker/vendor/autoload.php';
require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'header.php';
$faker = Faker\Factory::create('fr_FR');

$sql = "SELECT * projets WHERE slug = '".$_GET['slug'].'"';
$result = $mysqli->query($sql);
$projets = $result->fetch_assoc();
if ($mysqli->query($sql) === true) {
    echo $projets['images'];
} else {
    echo 'Erreur';
}
?>
    
