<?php

include_once 'includes/_config.php';
require_once 'includes/_functions.php';
include_once  'includes/_head.php';
generateToken();
?>
</header>

<!-- nav mobile -->

<main>


    <form action="action.php" method="POST" >
        <label class="label" for="name">What's your new task?</label>
        <input class="new-task" type="text" name="name_task" id="newtask">
        <input class="btn-new-task" type="submit" value="👉🏻Add New Task from hell" title="Ajouter une nouvelle tâche">
        <input type="hidden" name="action" value="add">
        <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
    </form>
</main>

<?= include_once "./includes/_footer.php" ?>