<?php

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
    
</body>
</html>
<main>

    <form id="addMerch" class="form" action="" method="POST">
        <h2>Add Merch in BDD</h2>
        <label class="label-form" for="name">name</label>
        <input class="form-text" type="text" name="name_product" id="name" require placeholder="name of product">
        <label class="label-form" for="price">price</label>
        <input class="form-text" type="int" name="price_product" id="price" require placeholder="price of product">
        <!-- Le type d'encodage des données, enctype, DOIT être spécifié comme ce qui suit -->
        <!-- <form enctype="multipart/form-data" action="_URL_" method="post"> -->
            <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
            <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
            <!-- Envoyez ce fichier : <input name="userfile" type="file" /> -->

        <!-- <label class="label-form" for="picture">picture</label>
        <input class="form-text" type="" name="picture" id="picture" require placeholder="picture of product"> -->

        <!-- <label class="label-form" for="categorie">what's cat?</label>
        <select class="form-text" name="categorie" id="categorie">
            <option value="">Please choose a product category</option>
            <option value="0">Clothes</option>
            <option value="1">Accessories</option>
            <option value="2">Drinks</option>
            <option value="3">Music</option>
        </select>
        <label class="label-form" for="price">Add a price</label>
        <input class="form-text" name="price" id="price" require>
        <label class="label-form" for="picture">Add picture</label>
        <input type="file" class="form-text" name="picture" id="picture" require> -->
        <input class="form-validate js-validate-btn" type="submit" value="Add product" title="add to stock">
        <input type="hidden" name="action" value="addMerch">
        <input id="tokenField" type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
        <?= getNotifHtml() ?>
    </form>
</main>
<script type="module" src="./js/script admin.js"></script>

