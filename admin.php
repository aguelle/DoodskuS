<?php
require_once "./vendor/autoload.php";
include './includes/_dbCo.php';
include_once 'includes/_config.php';
require_once 'includes/_functions.php';
// include_once  'includes/_head.php';
generateToken();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".\css\style.css">
    <title>Doodskus Admin</title>
</head>

<body>

    <main>
        <div class="title">
            <h1 class="">Admin Page</h1>
            <?= getNotifHtml() ?>
        </div>

        <!-- --------- -->
        <!-- connexion -->
        <!-- --------- -->
        <form id="connexion" class="formadmin-connexion" action="action.php" method="post">
            <input class="form-text" id="email" type="email" name="email" placeholder="email" required>
            <input class="form-text" id="pwd" type="password" name="password" placeholder="Mot de passe" required>
            <input id="token" type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
            <input class="form-validate" id="validate" class="bg-pink conn__btn" type="submit" value="Se connecter">
        </form>

        <!-- ----------------------- -->
        <!-- Add product to Merch DB -->
        <!-- ----------------------- -->
        <form id="addMerch" class="formadmin" action="action.php" method="POST" enctype="multipart/form-data">
            <h2>Add Merch in Database</h2>
            <input class="form-text" type="text" name="name_product" id="name" require placeholder="name of product">
            <input class="form-text" type="int" name="price_product" id="price" require placeholder="price of product">
            <input class="form-validate js-validate-btn" type="submit" name="submit" value="Add product" title="add to stock">
            <input type="hidden" name="action" value="addMerch">
            <input id="tokenField" type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
        </form>

        <!-- ----------------------- -->
        <!-- Edit product to Merch DB -->
        <!-- ----------------------- -->
        <form id="editMerch" class="formadmin" action="action.php" method="POST" enctype="multipart/form-data">
            <h2>Edit Merch in Database</h2>
            <!-- <label for="delete_product">Choose product</label> -->
            <select class="select" name="product" id="edit_product">

                <?php
                $query = $dbCo->prepare("SELECT `id_product`, `name_product`, `price_product`, `file_name` FROM `product`;");

                $isQueryOk = $query->execute();

                foreach ($query->fetchAll() as $product) {
                ?>
                    <option class="label-form-select" type="text" value="<?= $product['id_product'] ?>"><?= $product['name_product'] ?></option>
                <?php
                }
                ?>
            </select>
            <input class="form-text" type="text" name="name_product" id="name" require placeholder="name of product">
            <input class="form-text" type="int" name="price_product" id="price" require placeholder="price of product">
            <!-- <label class="label-form" for="picture">picture</label> -->
            <input class="form-validate js-validate-btn" type="submit" name="submit" value="Edit product" title="add to stock">
            <input type="hidden" name="action" value="editMerch">
            <input id="tokenField" type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
        </form>

        <!-- ----------------------- -->
        <!-- Delete product frome DB -->
        <!-- ----------------------- -->
        <form id="deleteMerch" class="formadmin" action="action.php" method="POST" enctype="multipart/form-data">
            <h2>Delete Merch in BDD</h2>
            <!-- <label for="delete_product">Choose product</label> -->
            <select class="select" name="product" id="delete_product">

                <?php
                $query = $dbCo->prepare("SELECT `id_product`, `name_product`, `price_product`, `file_name` FROM `product`;");

                $isQueryOk = $query->execute();

                foreach ($query->fetchAll() as $product) {
                ?>
                    <option class="label-form-select" type="text" name="name_product" value="<?= $product['id_product'] ?>"><?= $product['name_product'] ?></option>
                <?php
                }
                ?>
            </select>
            <input class="form-validate js-validate-btn" type="submit" name="submit" value="Delete product" title="add to stock">
            <input type="hidden" name="action" value="deleteMerch">
            <input id="tokenField" type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
        </form>
    </main>
    <script type="module" src="./js/admin.js"></script>
</body>

</html>