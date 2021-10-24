<?php
require_once 'config/framework.php';
require_once 'config/connect.php';
require_once 'header.php';
require_once 'Faker/vendor/autoload.php';
$faker = Faker\Factory::create('fr_FR');

$sql = "SELECT * FROM projets ORDER BY 'created_at' DESC";
$result = $mysqli->query($sql);
while ($result->fetch_assoc()) {
    ?>
<div class="container">
    <div class="row">
        <?php foreach ($result as $projet) { ?>
        <div class="col-sm-4 mt-5 text-warning">
            <div class="card-columns-fluid">
                <div class="card  bg-muted" style="width: 22rem; ">
                    <img class="card-img-top" src=" <?php echo $projet['image']; ?> " alt="Card image cap">

                    <div class="card-body">
                        <h5 class="card-title"><?php echo $projet['title']; ?></h5>
                        <p class="card-text"><?php if (strlen($projet['content']) > 20) {
        $long = 80;
        $projet['content'] = substr($projet['content'], 0, $long);
        echo $projet['content'];
    }?>...<a href="projet_full.php?slug=<?=$projet['slug']; ?>">Lire la suite</a></p>
                        <a href="#" class="btn btn-secondary">Full Details</a>
                    </div>
                </div>
            </div>
        </div>
        <?php }
}
for ($i = 1; $i <= $nbpages; ++$i) {
    echo "$i/";
}
?>
    </div>
    

    
</nav>
</div>