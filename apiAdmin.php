<?php
// session_start();

// require_once "./vendor/autoload.php";
// require_once './includes/_notif.php';
// require_once "./includes/_dbCo.php";

// header('content-type:application/json');
// $data = json_decode(file_get_contents('php://input'), true);


// if ($data['action'] === 'addMerch' && $_SERVER['REQUEST_METHOD'] === 'POST') {

//     if (strlen($data['text']) <= 0 || strlen($data['int']) <= 0) throwAsyncError('Merci de saisir une donnée valide.');

//     $query = $dbCo->prepare("INSERT INTO product (name_product, price_product) VALUES (:name_product, :price_product);");
//     $isQueryOk = $query->execute([
//         'name_product' => $data['text'],
//         'price_product' => $data['int']
        
//     ]);

//     if (!$isQueryOk || $query->rowCount() !== 1) throwAsyncError('Erreur lors de la création du produit');

//     echo json_encode([
//         'result' => true,
//         'notification' => 'produit enregistré',
//         'name_product' => $data['text'],
//         'price_product' => $data['int']
//     ]);
//     exit;
// }