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
    <title>Doodskus Connexion</title>
</head>

<body>

    <main>
        <h1 class="title">Admin Page</h1>
        <?= getNotifHtml() ?>
        
        <!-- --------- -->
        <!-- connexion -->
        <!-- --------- -->
        <form id="connexion" class="formadmin-connexion" action="action.php" method="get">
            <input class="form-text" id="login" type="text" name="login" placeholder="login" require >
            <input class="form-text" id="pwd" type="password" name="pwd" placeholder="Mot de passe" require>
            <input id="token" type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
            <input class="form-validate" id="validate" class="bg-pink conn__btn" type="submit" name="confirm" value="Se connecter">
        </form>

    </main>
    <script type="module" src="./js/admin.js"></script>
</body>

</html>