<?php

require_once 'Faker/vendor/autoload.php';
require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'header.php';
$faker = Faker\Factory::create('fr_FR');
if (isset($_SESSION['projets'])) {
    $_GET['slug'];
    dump($_GET['slug']);
    $sql = "SELECT * FROM projets WHERE slug = '".$_GET['slug'].'"';
    if ($result = $mysqli->query($sql)) {
        dump($result);
        while ($projet = $result->fetch_assoc()) {
            echo "<p><?= '".$projet['content']."'?></p>"; ?>
<?php
        }
    }
}?>

