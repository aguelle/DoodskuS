<?php
session_start();

require_once "./vendor/autoload.php";
require_once './includes/_notif.php';
require_once "./includes/_dbCo.php";

header('content-type:application/json');
$data = json_decode(file_get_contents('php://input'), true);

//-------------------------------------------------//
//to add emiail in DB from admin page
//-------------------------------------------------//
if ($data['action'] === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    if (strlen($data['text']) <= 0) throwAsyncError('Merci de saisir une adresse email.');

    $query = $dbCo->prepare("INSERT INTO customer (email,newsletter) VALUES (:email, :newsletter);");
    $isQueryOk = $query->execute([
        'email' => $data['text'],
        'newsletter' => $data['int']

    ]);

    if (!$isQueryOk || $query->rowCount() !== 1) throwAsyncError('Erreur lors de la création de la tâche');

    echo json_encode([
        'result' => true,
        'notification' => 'email enregistré',
        'int' => $data['int'],
        'email' => $data['text']
    ]);
    exit;
}
//-------------------------------------------------//
//to add product in DB from admin page
//-------------------------------------------------//
else if ($data['action'] === 'addMerch' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    if (strlen($data['text']) <= 0 || strlen($data['int']) <= 0) throwAsyncError('Merci de saisir un nom de produit.');

    $query = $dbCo->prepare("INSERT INTO product (name_product, price_product) VALUES (:name_product, :price_product);");
    $isQueryOk = $query->execute([
        'name_product' => $data['text'],
        'price_product' => $data['int']

    ]);

    if (!$isQueryOk || $query->rowCount() !== 1) throwAsyncError('Erreur lors de la création du produit');

    echo json_encode([
        'result' => true,
        'notification' => 'produit enregistré',
        'name_product' => $data['text'],
        'price_product' => $data['int']
    ]);
    exit;
}
//-------------------------------------------------//
//to edit product in DB from admin page
//-------------------------------------------------//
else if ($data['action'] === 'editMerch' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    if (strlen($data['text']) <= 0 || strlen($data['int']) <= 0) throwAsyncError('Merci de saisir un nom/prix de produit.');

    $query = $dbCo->prepare("UPDATE product SET name_product = :name_product, price_product = :price_product WHERE id_product = :id_product;");
    $isQueryOk = $query->execute([
        'name_product' => $data['text'],
        'price_product' => $data['int'],
        'id_product' => $data['id']
    
    ]);

    if (!$isQueryOk || $query->rowCount() !== 1) throwAsyncError('Erreur lors de la création du produit');

    echo json_encode([
        'result' => true,
        'notification' => 'produit modifié',
        'name_product' => $data['text'],
        'price_product' => $data['int']
    ]);
    exit;
}
//-------------------------------------------------//
//to delete product in DB from admin page
//-------------------------------------------------//
else if ($data['action'] === 'deleteMerch' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $query = $dbCo->prepare("DELETE FROM product WHERE id_product =:id_product;");
    $isQueryOk = $query->execute([
        'id_product' => $data['id'],
    ]);

    if (!$isQueryOk || $query->rowCount() !== 1) throwAsyncError('Erreur lors de la suppression du produit');

    echo json_encode([
        'result' => true,
        'notification' => 'produit supprimé',
    ]);
    exit;
}
