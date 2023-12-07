<?php
session_start();
require_once "./vendor/autoload.php";
require_once './includes/_dbCo.php';
require_once './includes/_notif.php';

//-----------------------------//
//--------- connection --------//
//-----------------------------//

// Validation du formulaire
if (isset($_GET['confirm'])) {

  if (isset($_GET['login']) && isset($_GET['pwd'])) {
    //strip_tags pour éviter les failles XSS en retirant les balises html et php.
    $login = strip_tags($_GET['login']);
    $pwd = strip_tags($_GET['pwd']);

    $query = $dbCo->prepare("SELECT * FROM users WHERE login = :login AND pwd = :pwd ;");

    $isQueryOk = $query->execute([
        'login' => $login,
        'pwd' => $pwd,
      ]);
    if ($query->rowCount() > 0) {
      // echo 'ok';
      header('Location: admin.php');
    } else {
      header('Location: connexion.php');
    }
  } 
}

//-------------------------------//
//--------- deconnection --------//
//-------------------------------//

// if (isset($_GET['action']) && $_GET['action'] === 'deconnexion') {
//     unset($_SESSION['id_person']);
//     $_SESSION['notif'] = 'Vous êtes déconnecté(e).';
//     header('Location: index.php');
//     exit;
// }
?>



<!-- header('Location: index.php'); -->

<!-- //notif



//xss striptags + strlen pour s'assurer de la taille de la tache.
//csrf grace à la génération et vérification du token.
//notifications en cas de succès ou d'erreurs. -->