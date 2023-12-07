<?php

include_once 'includes/_config.php';
require_once 'includes/_functions.php';
// $currentPage = getCurrentPageData($pages);
generateToken();
session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
    <title><?= $currentPage['title'] ?></title>
</head>

<body>
    <header>
        <nav>
            <div id="nav-mobile" class="nav-mobile">

                <div id="btnCloseNavMobile">
                    <img src="./img/Icones/crosswhite.png" alt="icone de fermeture" class="close">
                </div>
                <?= generateHtmlNav($pages) ?>

                <div class="nav-mobile-rs">
                    <a href="http://www.facebook.com"><img src="./img/Logos/rs/icons8-facebook-nouveau-64.png" href="#" class="logo-rs" alt="icone de Fb">
                    </a>
                    <a href="#"><img src="./img/Logos/rs/icons8-instagram-64.png" href="# " class="logo-rs" alt="icone de Insta">
                    </a>
                    <a href="#"><img src="./img/Logos/rs/icons8-twitterx-64.png" href="#" class="logo-rs" alt="icone de twitter">
                    </a>
                    <a href="#"><img src="./img/Logos/rs/icons8-logo-youtube-64.png" href="#" class="logo-rs" alt="icone de youtube">
                    </a>
                </div>
                <ul class="nav-mobile-ns">
                    <li><a href="newsletter.php">Newsletter</a></li>
                    <li><a href="">Mentions légales</a></li>
                </ul>
            </div>

            <div id="btnOpenNavMobile">
                <img src="./img/Icones/burgerblack.png" alt="burger" class="burger hidden">
            </div>

            <div class="nav-desktop hidden">

                <img id="logo-nav" src="img/Logos/logo3Resize.png" class="logo-nav">
                <?= generateDeskHtmlNav($pages) ?>

            </div>
        </nav>

    </header>


<!-------------------------------------
-------------MAIN----------------------
-------------------------------------->

<main>

<form id="new_sub" class="form" action="action.php" method="POST">
        <h2>DoodskuS Newsletter</h2>
        <input class="form-text" type="text" name="new_sub" id="newsub" placeholder="email">
        <input class="form-validate js-validate-btn" type="submit" value="👉🏻subscribe" title="inscirption newsletter">
        <input type="hidden" name="action" value="add">
        <input id="newsletter" type="hidden" name="newsletter" value="1">
        <input id="tokenField" type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
        <?= getNotifHtml() ?>
    </form>

</main>

<!-------------------------------------
-------------FOOTER--------------------
-------------------------------------->
<?php include_once "./includes/_footer.php" ?>