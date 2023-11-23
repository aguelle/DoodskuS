<?php

include_once 'includes/_config.php';
require_once 'includes/_functions.php';
include_once 'includes/_head.php';
?>

<!-------------------------------------
-------------MAIN----------------------
-------------------------------------->

    <main>
        <section class="gallery" id="article">
            <div class="gallery-articles">
                <ul id="gallery-thumbs" class="thumbs-list">
                    <li><img class="thumbs-img" src="img/Live/photo1.jpeg" alt="Photo live 1" data-title="Photo live 1"
                            data-description="Live 1, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum."></li>

                    <li><img class="thumbs-img" src="img/Live/photo2.jpeg" alt="Photo live 2" data-title="Photo live 2"
                            data-description="Live 2, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum."></li>
                    <li><img class="thumbs-img" src="img/Live/photo3.jpeg" alt="Photo live 3" data-title="Photo live 3"
                            data-description="Live 3, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit anim id est laborum."></li>
                    <li><img class="thumbs-img" src="img/Live/photo4.jpeg" alt="Photo live 4" data-title="Photo live 4"
                            data-description="Live 4, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum."></li>
                </ul>
                <div class="grid-2">
                    <div class="news-select">
                        <!-- <button><img src="/img/Icones/flechehaut.png" alt="bouton" class="btn-up"></button>
                        <button><img src="/img/Icones/flechebas.png" alt="bouton" class="btn-down"></button> -->
                    </div>
                    <div>
                        <h3 id="article-title" class="article-title"></h3>
                        <img id="article-img" class="main-img" src="img/project-1.jpg" alt="Photo live 1">
                    </div>
                    <p id="article-description" class="description"></p>
                </div>
            </div>
    </main>

<!-------------------------------------
-------------FOOTER--------------------
-------------------------------------->
<?= include_once "./includes/_footer.php" ?>