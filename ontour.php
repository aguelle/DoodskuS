<?php

include_once 'includes/_config.php';
require_once 'includes/_functions.php';
include_once  'includes/_head.php';
generateToken();

?>

<main>
<?= getNotifHtml() ?>

    <form id="new_sub" class="form" action="action.php" method="POST">
        <h2>DoodskuS Newsletter</h2>
        <label class="label-form" for="newsub">Email</label>
        <input class="form-text" type="text" name="new_sub" id="newsub">
        <input class="form-validate js-validate-btn" type="submit" value="👉🏻subscribe" title="inscirption newsletter">
        <input type="hidden" name="action" value="add">
        <input id="tokenField" type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
    </form>
</main>

<?= include_once "./includes/_footer.php" ?>