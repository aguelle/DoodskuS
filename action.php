<?php
session_start();
require_once "./vendor/autoload.php";
require_once './includes/_dbCo.php';
require_once './includes/_notif.php';
// var_dump($_SESSION);
// exit;

if (!isset($_SESSION['token']) || !isset($_POST['token']) || $_SESSION['token'] != $_POST['token']) {
    header('Location: index.php');
    var_dump($_SESSION);
    exit;
}


if (!isset($_SERVER['HTTP_REFERER']) || !str_contains($_SERVER['HTTP_REFERER'], 'localhost/Site-Doodskus')) {
    header('Location: index.php');
    var_dump($_SESSION);
    exit;
}



if (isset($_POST['action']) && $_POST['action'] === 'add' && isset($_POST['new_sub'])) {

    $newsub = strip_tags($_POST['new_sub']);
    if (strlen($newsub) > 3 && strlen($newsub) < 50) {
        $query = $dbCo->prepare(" INSERT INTO customer (email) VALUES (:new_sub)");
        $isQueryOk = $query->execute([
            'new_sub' => $newsub
        ]);
        if ($isQueryOk && $query->rowcount() === 1) {
            $_SESSION['notif'] = 'sub_ok';
        } else {
            $_SESSION['error'] = 'sub_error';
        }
    }
}



// //Update state task
// else if ($_GET['action'] === 'state' && isset($_GET['id'])) {

//     // $nameTask = strip_tags($_POST['name_task']);
//     // if (strlen($nameTask) > 3 && strlen($nameTask) < 50) {
//     // $id = intval($_GET['id']);
//     $query = $dbCo->prepare("UPDATE task SET state_task = 1 WHERE id_task = :id;");
//     $isQueryOk = $query->execute([
//         'id' => intval(strip_tags($_GET['id']))
//     ]);
//     if ($isQueryOk && $query->rowcount() === 1) {
//         $_SESSION['notif'] = 'updateStateTask';
//     } else {
//         $_SESSION['error'] = 'addTaskError';
//     }
// }

// //Update task
// else if ($_GET['action'] === 'update' && isset($_GET['id'])) {

//     // $nameTask = strip_tags($_POST['name_task']);
//     // if (strlen($nameTask) > 3 && strlen($nameTask) < 50) {
//     // $id = intval($_GET['id']);
//     $query = $dbCo->prepare("UPDATE task SET name_task = ':name_task' WHERE id_task = :id;");
//     $isQueryOk = $query->execute([
//         'id' => intval(strip_tags($_GET['id'])),
//         'name_task' => strip_tags($_POST['name_task'])
//     ]);
//     if ($isQueryOk && $query->rowcount() === 1) {
//         $_SESSION['notif'] = 'updateStateTask';
//     } else {
//         $_SESSION['error'] = 'addTaskError';
//     }
// }



header('Location: index.php');

//notif



//xss striptags + strlen pour s'assurer de la taille de la tache.
//csrf grace à la génération et vérification du token.
//notifications en cas de succès ou d'erreurs.