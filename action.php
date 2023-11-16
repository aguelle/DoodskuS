<?php
session_start();
require_once "./vendor/autoload.php";
require_once './includes/_dbCo.php';
// require_once './includes/_notif.php';
// var_dump($_SESSION);
// exit;

if (!isset($_SESSION['token']) || !isset($_POST['token']) || $_SESSION['token'] != $_POST['token']) {
    header('Location: index.php');
    exit;
}

if (!isset($_SERVER['HTTP_REFERER']) || !str_contains($_SERVER['HTTP_REFERER'], 'localhost/todolistfromhell')) {
    header('Location: index.php');
    exit;
}

// var_dump($_SERVER['HTTP_REFERER']);
// exit;
//subscribe to a newsletter
if (isset($_POST['action']) && $_POST['action'] === 'add' && isset($_POST['name_task'])) {

    $nameTask = strip_tags($_POST['name_task']);
    if (strlen($nameTask) > 3 && strlen($nameTask) < 50) {
        $query = $dbCo->prepare(" INSERT INTO task (name_task) VALUES (:name_task)");
        $isQueryOk = $query->execute([
            'name_task' => $nameTask
        ]);
        if ($isQueryOk && $query->rowcount() === 1) {
            $_SESSION['notif'] = 'addTask';
        } else {
            $_SESSION['error'] = 'addTaskError';
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