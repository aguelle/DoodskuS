<?php
session_start();
require_once "./vendor/autoload.php";
require_once './includes/_dbCo.php';
require_once './includes/_notif.php';

// connection 

// Validation du formulaire
if (isset($_POST['email']) &&  isset($_POST['password'])) {
    foreach ($users as $user) {
        if (
            $user['email'] === $_POST['email'] &&
            $user['password'] === $_POST['password']
        ) {
            $loggedUser = [
                'email' => $user['email'],
            ];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $_POST['email'],
                $_POST['password']
            );
        }
    }
}
?>


// var_dump($_SESSION);
// exit;

// if (!isset($_SESSION['token']) || !isset($_POST['token']) || $_SESSION['token'] != $_POST['token']) {
//     header('Location: index.php');
//     var_dump($_SESSION);
//     exit;
// }


// if (!isset($_SERVER['HTTP_REFERER']) || !str_contains($_SERVER['HTTP_REFERER'], 'localhost/Site-Doodskus')) {
//     header('Location: index.php');
//     var_dump($_SESSION);
//     exit;
// }



// if (isset($_POST['action']) && $_POST['action'] === 'add' && isset($_POST['new_sub'])) {

//     $newsub = strip_tags($_POST['new_sub']);
//     if (strlen($newsub) > 3 && strlen($newsub) < 50) {
//         $query = $dbCo->prepare(" INSERT INTO customer (email) VALUES (:new_sub)");
//         $isQueryOk = $query->execute([
//             'new_sub' => $newsub
//         ]);
//         if ($isQueryOk && $query->rowcount() === 1) {
//             $_SESSION['notif'] = 'sub_ok';
//         } else {
//             $_SESSION['error'] = 'sub_error';
//         }
//     }
// }

//upload file

if (isset($_POST['submit']))
{
    $maxSize = 1000000;
    $validExt = array('.png');

    if($_FILES['uploaded_file']['error'] > 0 )
    {
      Echo "Erreur !";
      die;
    }

    $fileSize = $_FILES['uploaded_file']['size'];

    if ($fileSize > $maxSize)
    {
      Echo "Fichier trop volumineux";
      die;
    }


    $fileName = $_FILES['uploaded_file']['name'];
    $fileExt = "." . strtolower(substr(strrchr($fileName, '.'), 1));

    if(!in_array($fileExt, $validExt))
    {
      Echo "Mauvais format de fichier";
      die;
    }

    $tmpName = $_FILES['uploaded_file']['tmp_name'];

    $fileName = "./img/merch" . $fileName . $fileExt;

    $resultat = move_uploaded_file($tmpName, $fileName);

    if($resultat)
    {
      Echo "Transfert terminé";
      header("Location: index.php");
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