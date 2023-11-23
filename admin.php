<?php

include_once 'includes/_config.php';
require_once 'includes/_functions.php';
include_once  'includes/_headadmin.php';
generateToken();

?>

<main>

    <form id="merch" class="form" action="action.php" method="POST">
        <h2>Add Merch in BDD</h2>
        <label class="label-form" for="name">name</label>
        <input class="form-text" type="text" name="name_product" id="name" require placeholder="name of product">
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
        <input type="hidden" name="action" value="add">
        <input id="tokenField" type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
        <?= getNotifHtml() ?>
    </form>
</main>
<script type="module" src="./js/scriptadmin.js"></script>

<?= include_once "./includes/_footer.php" ?>