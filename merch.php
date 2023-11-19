<?php

include_once 'includes/_config.php';
require_once 'includes/_functions.php';
include_once  'includes/_head.php';
?>
<!-- nav mobile -->





    <!--------------------------------------------------------------------------------------------------------
---------------------------------------------------MAIN---------------------------------------------------
---------------------------------------------------------------------------------------------------------->

    <main>
        <h1 class="merch-title">
            Merch - Categories
        </h1>
        <ul id="nav-bar-list" class="nav-bar">

        </ul>

        <ul id="products-container" class="products">
        </ul>
        <template id="product-template">
            <li class="product-itm">
                <h2 class="product-ttl"></h2>
                <h3 class="product-price"></h3>
                <img class="product-img" src="" alt="">
            </li>
        </template>
        <template id="catgory-template">
            <li>
                <button class="nav-btn" data-style-name=""></button>
            </li>
        </template>


    </main>



    <!--------------------------------------------------------------------------------------------------------
---------------------------------------------------FOOTER-------------------------------------------------
--------------------------------------------------------------------------------------------------------->

<script src="js/merch.js"></script>

<?php            
include_once 'includes/_footer.php';