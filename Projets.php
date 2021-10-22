<?php
require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'header.php';
require_once 'Faker/vendor/autoload.php';
$faker = Faker\Factory::create('fr_FR');
$sql = 'SELECT * FROM projets ORDER BY rand()';
$result = $mysqli->query($sql);

        ?>

<div class='container'>
    <div class="row">
        <div class="row-4">
            <?php
            while ($result->fetch_assoc()) {
                foreach ($result as $projet) {
                    ?>

            <div class="card-columns-fluid" style="width: 18rem;">
                <img src="<?= $projet['image']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $projet['titre']; ?></h5>
                    <p class="card-text"><?php if (strlen($projet['content']) > 20) {
                        $long = 80;
                        $projet['content'] = substr($projet['content'], 0, $long);
                        echo$projet['content']; ?>...<a href='projet_full.php?slug=<?=$projet['slug']; ?>'
                            id="lirelasuite">Lire la suite</a></p>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
                    }
                }
            }

?>