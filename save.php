<?php
session_start();
require_once "./vendor/autoload.php";
require_once './includes/_dbCo.php';
// require_once './includes/_notif.php';

//-----------------------------//
//--------- connection --------//
//-----------------------------//

// Validation du formulaire
if (isset($_POST['login']) && isset($_POST['pwd'])) {

  $login = strip_tags($_POST['login']);
  $pwd = strip_tags($_POST['pwd']);

  try {
    $query = $dbCo->prepare("SELECT * FROM users WHERE login = :login AND pwd = :pwd ;");

    $isQueryOk = $query->execute([
      'login' => $login,
      'pwd' => $pwd,
    ]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      // USER EXIST
      header('Location: /site-doodskus/admin.php');
      exit(); 
    } else {
      // USER KO
      echo "Identifiants ou mot de passe incorrects.";
    }
  } catch (\Throwable $th) {
    // Une exception s'est produite
    echo "Erreur : " . $th->getMessage();
  }
}
