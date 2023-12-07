<?php
session_start();
require_once "./vendor/autoload.php";
require_once './includes/_dbCo.php';
require_once './includes/_notif.php';

//-----------------------------//
//--------- connection --------//
//-----------------------------//

// Validation du formulaire
if (isset($_POST['confirm'])) {

  if (isset($_POST['login']) && isset($_POST['pwd'])) {
    $login = htmlspecialchars($_POST['login']);
    $pwd = htmlspecialchars($_POST['pwd']);

    $query = $dbCo->prepare("SELECT * FROM `users' WHERE login = :login AND pwd = :pwd ;");

    $isQueryOk = $query->execute(
      [
        'login' => $login,
        'pwd' => $pwd
      ]
    );
    if ($Query->rowCount() > 0) {
      echo 'ok';
    } else {
      echo "login ou mot de passe incorrect";
    }
  } else {
  }
}
?>



<!-- header('Location: index.php'); -->

<!-- //notif



//xss striptags + strlen pour s'assurer de la taille de la tache.
//csrf grace à la génération et vérification du token.
//notifications en cas de succès ou d'erreurs. -->