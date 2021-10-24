<?php

require_once 'Faker/vendor/autoload.php';
require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'header.php';
$faker = Faker\Factory::create('fr_FR');
$sql = "SELECT * FROM projets WHERE slug = '".$_GET['slug'].'"';
if ($result = $mysqli->query($sql)) {
    if ($result->num_rows > 0) {
        while ($projet = $result->fetch_assoc()) {
            echo "<p><?= '".$projet['content']."';?></p>";
        }
    }
}
    ?>

