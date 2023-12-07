<?php
require_once "./vendor/autoload.php";
include './includes/_dbCo.php';
include_once 'includes/_config.php';
require_once 'includes/_functions.php';
include_once 'includes/_head.php';
?>

<!-------------------------------------
-------------MAIN----------------------
-------------------------------------->

<main>
    <h1 class="merch-title">
        Merch - Categories
    </h1>
    <ul id="products-container" class="products">
        <?php
        $query = $dbCo->prepare("SELECT `name_product`, `price_product` FROM `product`;");

        $isQueryOk = $query->execute();

        foreach ($query->fetchAll() as $product) {
        ?><li class="product-itm">
                <h2 class="product-ttl"><?= $product['name_product'] ?></h2>
                <h3 class="product-price"><?= $product['price_product'] ?></h3>
                <img class="product-img" src="./img/merch/<?= $product['name_product'] ?>" alt="img">
            </li>
        <?php
        }
        ?>
    </ul>


</main>

<script src="js/merch.js"></script>

<!-------------------------------------
-------------- FOOTER -----------------
-------------------------------------->
<?php include "./includes/_footer.php" ?>